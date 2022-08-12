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
        return $this->model::where('user_id', $userId)->with(['city', 'category', 'status'])->paginate(15);
    }

    public function getAdDetailById(int $adId): Ad
    {
        return $this->model::with(['city', 'category', 'status', 'favoriteUsers', 'usersWished'])->findOrFail($adId);
    }
}
