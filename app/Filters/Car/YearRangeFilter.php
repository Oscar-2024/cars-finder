<?php

namespace App\Filters\Car;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class YearRangeFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        $items
            ->when(data_get($this->filter->getValue(), 'from'), function (Builder $query) {
                $query->where('year', '>=', data_get($this->filter->getValue(), 'from'));
            })
            ->when(data_get($this->filter->getValue(), 'to'), function (Builder $query) {
                $query->where('year', '<=', data_get($this->filter->getValue(), 'to'));
            });

        return $next($items);
    }
}
