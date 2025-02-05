<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class SorterFilter extends Filter
{
    const ALLOWED_DIRECTION_SORTERS = ['asc', 'desc'];

    public array $allowedColumnSorters = [];

    public string $primaryKey;

    public ?string $defaultSorterColumn = null;

    public function handle(Builder $items, \Closure $next): Builder
    {
        $filter = $this->filter->getValue();
        $column = data_get($filter, 'column');
        $direction = data_get($filter, 'direction');

        if (! $column || ! $direction) {
            $this->applyDefaultSort($items);
            return $next($items);
        }

        if (
            ! in_array($column, $this->allowedColumnSorters) ||
            ! in_array($direction, self::ALLOWED_DIRECTION_SORTERS)
        ) {
            $this->applyDefaultSort($items);
            return $next($items);
        }

        $columnMethod = 'sortBy' . Str::studly($column);
        match (method_exists($this, $columnMethod)) {
            true => $this->{$columnMethod}($items, $direction),
            default => $items->orderBy($column, $direction),
        };

        return $next($items);
    }

    private function applyDefaultSort(Builder $items): void
    {
        match ($this->defaultSorterColumn) {
            null => $items->latest($this->primaryKey),
            default => $items->orderByDesc($this->defaultSorterColumn),
        };
    }
}
