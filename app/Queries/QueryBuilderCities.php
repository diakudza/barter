<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderCities extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(City $model)
    {
        $this->model = $model;
    }
}