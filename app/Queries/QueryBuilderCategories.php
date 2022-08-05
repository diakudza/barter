<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderCategories extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}