<?php

namespace App\Enums;

use App\Filters\Filter;
use App\Filters\FilterValue;

enum CarFilters: string
{
    case City = 'city';
    case Dealership = 'dealership';
    case EngineType = 'engine_type';
    case Brand = 'brand';
    case Model = 'model';
    case Color = 'color';
    case Year = 'year';
    case Price = 'price';
    case Kilometers = 'kilometers';
    case Features = 'features';
    case Sorter = 'sorter';

    public function create(FilterValue $filter): Filter
    {
        return match ($this) {
            self::City => new \App\Filters\Car\CityFilter($filter),
            self::Dealership => new \App\Filters\Car\DealershipFilter($filter),
            self::EngineType => new \App\Filters\Car\EngineTypeFilter($filter),
            self::Brand => new \App\Filters\Car\BrandFilter($filter),
            self::Model => new \App\Filters\Car\ModelFilter($filter),
            self::Color => new \App\Filters\Car\ColorFilter($filter),
            self::Year => new \App\Filters\Car\YearRangeFilter($filter),
            self::Price => new \App\Filters\Car\PriceRangeFilter($filter),
            self::Kilometers => new \App\Filters\Car\KilometerRangeFilter($filter),
            self::Features => new \App\Filters\Car\FeaturesFilter($filter),
            self::Sorter => new \App\Filters\Car\SorterFilter($filter),
        };
    }
}
