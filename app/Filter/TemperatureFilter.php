<?php

namespace App\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class TemperatureFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $value = (int) $value;

        return $query->whereBetween('temperature', [$value - 3, $value + 3]);
    }
}
