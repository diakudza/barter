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

    public function getAdminUsersByFilter(User $user, $status, $role, $searchUser): LengthAwarePaginator
    {
        $users = $user
            ->when($searchUser, function ($query, $searchUser) {
// In order to place OR statement in brackets use this subclosure
                $query->where(function($query) use ($searchUser){
                    $query
                        ->where('email', 'like', '%' . $searchUser . '%')
                        ->orWhere('name', 'like', '%' . $searchUser . '%');
                });
            })
            ->when($status, function ($query, $status) {
                $query->whereIn('status_id', $status);
            })
            ->when($role, function ($query, $role) {
                $query->whereIn('role_id', $role);
            })
            ->paginate(20)
            ->withQueryString();

        return $users;
    }
}