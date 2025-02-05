<?php

namespace App\Filters\Car;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class EngineTypeFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        if (! $this->filter->getValue()) {
            return $next($items);
        }

        $items->where('engine_type_id', $this->filter->getValue());

        return $next($items);
    }
}
