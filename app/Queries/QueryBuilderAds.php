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

    public function listAds(array $columns = []): LengthAwarePaginator
    {
        if (count($columns)) {
            return Ad::with(['city', 'category'])->select($columns)->where('user_id', '=', Auth::user()->id)->paginate(15);
        } else {
            return Ad::with(['city', 'category'])->where('user_id', '=', Auth::user()->id)->paginate(15);
        }
    }
}
