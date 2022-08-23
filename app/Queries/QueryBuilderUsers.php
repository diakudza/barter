<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderUsers extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUserDetailById(int $userId): User
    {
        return $this->model::with(['avatar'])->findOrFail($userId);
    }
}