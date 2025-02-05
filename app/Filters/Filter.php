<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use \Closure;

abstract class Filter
{
    public function __construct(protected FilterValue $filter)
    {}

    abstract public function handle(Builder $items, Closure $next): Builder;
}
