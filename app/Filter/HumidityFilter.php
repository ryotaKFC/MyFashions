<?php

namespace App\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class HumidityFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $value = (int) $value;

        return $query->whereBetween('humidity', [$value - 10, $value + 10]);
    }
}
