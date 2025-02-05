<?php

namespace App\Filters\Car;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class BrandFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        if (! $this->filter->getValue()) {
            return $next($items);
        }

        $items->whereHas('model', function ($query) {
            $query->where('brand_id', $this->filter->getValue());
        });

        return $next($items);
    }
}
