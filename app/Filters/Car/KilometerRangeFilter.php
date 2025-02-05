<?php

namespace App\Filters\Car;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class KilometerRangeFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        $items
            ->when(data_get($this->filter->getValue(), 'min'), function (Builder $query) {
                $query->where('kilometers', '>=', data_get($this->filter->getValue(), 'min'));
            })
            ->when(data_get($this->filter->getValue(), 'max'), function (Builder $query) {
                $query->where('kilometers', '<=', data_get($this->filter->getValue(), 'max'));
            });

        return $next($items);
    }
}
