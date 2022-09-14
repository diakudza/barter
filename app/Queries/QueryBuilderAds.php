<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderAds extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(Ad $model)
    {
        $this->model = $model;
    }

    public function listAdsByUser(int $userId): LengthAwarePaginator
    {
        return $this->model::where('user_id', $userId)->whereRelation('status', 'title', '!=', 'deleted')->with(['city', 'category', 'status', 'imageMain'])->paginate(15);
    }

    public function getAdDetailById(int $adId): Ad
    {
        return $this->model::with(['city', 'category', 'status', 'favoriteUsers', 'usersWished', 'images'])->findOrFail($adId);
    }

    public function getAdminAdsByFilter(Ad $ad, $status, $author, $sortByDate): LengthAwarePaginator
    {
        $ads = $ad
            ->when($author, function ($query, $author) {
// In order to place OR statement in brackets use this subclosure
                $query->where(function ($query) use ($author) {
                    $query
                        ->whereRelation('user', 'email', 'like', '%' . $author . '%')
                        ->orWhereRelation('user', 'name', 'like', '%' . $author . '%');
                });
            })
            ->when($status, function ($query, $status) {
                $query->whereIn('status_id', $status);
            })
            ->when($sortByDate, function ($query, $sortByDate) {
                $query->orderBy('created_at', $sortByDate);
            })
            ->paginate(20)
            ->withQueryString();
        return $ads;
    }

    public function getAdsBySearchParametrs(Ad $ad, $validated, $resultCount = 10): LengthAwarePaginator
    {
        $title = $validated['name'] ?? NULL;
        $category = $validated['category'] ?? NULL;
        $city = $validated['city'] ?? NULL;
        $barter_type = $validated['barter_type'] ?? NULL;
        $barter_for = $validated['barter_for'] ?? NULL;
        $ads = $ad
            ->when($title, function ($query, $title) use ($barter_for) {
                $query->when($barter_for, function ($query, $barter_for) use ($title) {
                    $query
                        ->where('barter_type', '=', 'barter')
                        ->where('barter_title', 'LIKE', '%' . $title . '%');
                });
            })
            ->when($title, function ($query, $title) use ($barter_for){
                if ($barter_for) return;
                $query->when($title, function ($query, $title) {
                    $query->where('title', 'LIKE', '%' . mb_strtolower($title) . '%');
                });
            })
            ->where('status_id', 1)
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->when($city, function ($query, $city) {
                $query->where('city_id', $city);
            })
            ->when($barter_type, function ($query, $barter_type) {
                $query->where('barter_type', $barter_type);
            })
            ->paginate($resultCount)
            ->withQueryString();;

        return $ads;
    }
}
