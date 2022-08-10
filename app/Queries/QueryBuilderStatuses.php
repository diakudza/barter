<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\AdStatus;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderStatuses extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(AdStatus $model)
    {
        $this->model = $model;
    }
}
