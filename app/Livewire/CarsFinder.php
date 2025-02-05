<?php

namespace App\Livewire;

use App\Enums\CarFilters;
use App\Filters\FilterValue;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Dealership;
use App\Models\EngineType;
use App\Models\City;
use App\Models\Color;
use App\Models\Feature;

class CarsFinder extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public array $filters = [];

    public Collection $cities;

    public Collection $dealerships;

    public Collection $engineTypes;

    public Collection $brands;

    public Collection $models;

    public Collection $colors;

    public array $yearsFrom;

    public array $yearsTo;

    public array $minPrices;

    public array $maxPrices;

    public array $minKilometers;

    public array $maxKilometers;

    public Collection $features;

    public array $sorterFields = [
        'year' => 'Año',
        'kilometers' => 'Kilómetros',
        'price' => 'Precio',
        'model_name' => 'Modelo',
    ];

    public array $sorterDirections = [
        'asc' => 'Ascendente',
        'desc' => 'Descendente',
    ];

    private LengthAwarePaginator $cars;

    public function mount(): void
    {
        $this->initFilters();

        $this->cities = City::orderBy('name')->get();

        $this->engineTypes = EngineType::orderBy('name')->get();

        $this->brands = Brand::orderBy('name')->get();

        $this->colors = Color::orderBy('name')->get();

        $this->yearsFrom = range(1990, date('Y'));

        $this->minPrices = range(1000, 100000, 1000);

        $this->minKilometers = range(0, 500000, 10000);

        $this->features = Feature::orderBy('name')->get();
    }

    public function updated(): void
    {
        $this->resetPage();
    }

    protected function initFilters(): void
    {
        $this->filters = [
            'city' => null,
            'dealership' => null,
            'engine_type' => null,
            'brand' => null,
            'model' => null,
            'color' => null,
            'year' => [
                'from' => null,
                'to' => null,
            ],
            'price' => [
                'min' => null,
                'max' => null,
            ],
            'kilometers' => [
                'min' => null,
                'max' => null,
            ],
            'features' => [],
            'sorter' => [
                'column' => 'price',
                'direction' => 'desc',
            ],
        ];
    }

    public function resetFilters(): void
    {
        $this->initFilters();
        $this->resetPage();
    }

    protected function filterYearsTo(): void
    {
        $this->yearsTo = range($this->filters['year']['from'] ?? 1990, date('Y'));
    }

    protected function filterMaxPrices(): void
    {
        $this->maxPrices = range($this->filters['price']['min'] ?? 1000, 100000, 1000);
    }

    protected function filterMaxKilometers(): void
    {
        $this->maxKilometers = range($this->filters['kilometers']['min'] ?? 0, 500000, 10000);
    }

    protected function filterDealerships(): void
    {
        $this->dealerships = Dealership::query()
            ->when($this->filters['city'], function ($query) {
                return $query->where('city_id', $this->filters['city']);
            })
            ->orderBy('name')
            ->get();
    }

    protected function filterModels(): void
    {
        $this->models = CarModel::query()
            ->when($this->filters['brand'], function ($query) {
                return $query->where('brand_id', $this->filters['brand']);
            })
            ->orderBy('name')
            ->get();
    }

    protected function filterCars(): void
    {
        $this->cars = app(Pipeline::class)
            ->send(Car::with([
                'model.brand',
                'color',
                'dealership.city',
                'engineType',
                'features',
            ]))
            //->through(
            //    collect($this->filters)
            //        ->map(fn ($value, $filter) => CarFilters::from($filter)->create(new FilterValue($value)))
            //        ->values()
            //        ->all()
           // )
            ->thenReturn()
            ->paginate(6);
    }

    public function render(): View
    {
        $this->filterYearsTo();

        $this->filterMaxPrices();

        $this->filterMaxKilometers();

        $this->filterDealerships();

        $this->filterModels();

        $this->filterCars();

        return view('livewire.cars-finder', [
            'cars' => $this->cars,
        ]);
    }
}
