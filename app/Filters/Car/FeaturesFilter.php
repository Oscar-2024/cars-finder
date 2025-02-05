<?php

namespace App\Filters\Car;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class FeaturesFilter extends Filter
{
    public function handle(Builder $items, \Closure $next): Builder
    {
        if (! count($this->filter->getValue())) {
            return $next($items);
        }

        /*
        // has any of the features
        $items->whereHas('features', function ($query) {
            $query->whereIn('features.id', $this->filter->getValue());
        });
        */

        // has all the features
        $items->whereHas(
            relation: 'features',
            callback: fn ($query) => $query->whereIn('features.id', $this->filter->getValue()),
            operator: '=',
            count: count($this->filter->getValue())
        );

        return $next($items);
    }
}
