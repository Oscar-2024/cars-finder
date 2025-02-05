<?php

namespace App\Filters\Car;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\SorterFilter as BaseSorterFilter;
use App\Models\CarModel;

final class SorterFilter extends BaseSorterFilter
{
    public string $primaryKey = 'id';

    public ?string $defaultSorterColumn = 'price';

    public array $allowedColumnSorters = [
        'year', 'price', 'kilometers', 'model_name',
    ];

    public function sortByModelName(Builder $items, string $direction): Builder
    {
        return $items->orderBy(
            CarModel::select('name')
                ->whereColumn('car_model_id', 'car_models.id')
                ->take(1),
            $direction,
        );
    }
}
