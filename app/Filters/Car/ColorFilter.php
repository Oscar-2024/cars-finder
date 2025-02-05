<?php

namespace App\Filters\Car;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class ColorFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        if (! $this->filter->getValue()) {
            return $next($items);
        }

        $items->where('color_id', $this->filter->getValue());

        return $next($items);
    }
}
