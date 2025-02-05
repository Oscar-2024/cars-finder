<div class="row">
    <div class="col-auto cars-finder-filters">
        <h5 class="cars-count">Coches encontrados: {{ formatNumber($cars->total()) }}</h5>

        <hr />

        <h3>Filtros</h3>
        <!-- cities dropdown -->
        <x-select-field
            id="city"
            label="Ciudad"
            model="filters.city"
            placeholder="Selecciona una ciudad"
            :options="$cities"
        />

        <!-- dealerships dropdown -->
        <x-select-field
            id="dealership"
            label="Concesionario"
            model="filters.dealership"
            placeholder="Selecciona un concesionario"
            :options="$dealerships"
        />

        <!-- engine types dropdown -->
        <x-select-field
            id="engine_type"
            label="Tipo de motor"
            model="filters.engine_type"
            placeholder="Selecciona un tipo de motor"
            :options="$engineTypes"
        />

        <!-- brands dropdown -->
        <x-select-field
            id="brand"
            label="Marca"
            model="filters.brand"
            placeholder="Selecciona una marca"
            :options="$brands"
        />

        <!-- models dropdown -->
        <x-select-field
            id="model"
            label="Modelo"
            model="filters.model"
            placeholder="Selecciona un modelo"
            :options="$models"
        />

        <!-- colors dropdown -->
        <x-select-field
            id="color"
            label="Color"
            model="filters.color"
            placeholder="Selecciona un color"
            :options="$colors"
        />

        <!-- year from dropdown -->
        <x-select-field
            id="year_from"
            label="Año desde"
            model="filters.year.from"
            placeholder="Selecciona un año"
            :options="$yearsFrom"
        />

        <!-- year to dropdown -->
        <x-select-field
            id="year_to"
            label="Año hasta"
            model="filters.year.to"
            placeholder="Selecciona un año"
            :options="$yearsTo"
        />

        <!-- min price dropdown -->
        <x-select-field
            id="min_price"
            label="Precio Mínimo (€)"
            model="filters.price.min"
            placeholder="Selecciona un precio"
            :options="$minPrices"
            :formatter="fn($value) => formatCurrency($value)"
        />

        <!-- max price dropdown -->
        <x-select-field
            id="max_price"
            label="Precio Máximo (€)"
            model="filters.price.max"
            placeholder="Selecciona un precio"
            :options="$maxPrices"
            :formatter="fn($value) => formatCurrency($value)"
        />

        <!-- min kilometers dropdown -->
        <x-select-field
            id="min_kilometers"
            label="Kilómetros mínimos"
            model="filters.kilometers.min"
            placeholder="Selecciona un número de kilómetros"
            :options="$minKilometers"
            :formatter="fn($value) => formatNumber($value)"
        />

        <!-- max kilometers dropdown -->
        <x-select-field
            id="max_kilometers"
            label="Kilómetros máximos"
            model="filters.kilometers.max"
            placeholder="Selecciona un número de kilómetros"
            :options="$maxKilometers"
            :formatter="fn($value) => formatNumber($value)"
        />

        <hr />

        <!-- features checkboxes -->
        <h3>Características</h3>
        @foreach($features as $feature)
            <div class="form-check cars-finder-feature">
                <input
                    wire:model.live="filters.features"
                    class="form-check-input"
                    type="checkbox"
                    id="feature-{{ $feature->id }}"
                    value="{{ $feature->id }}"
                />
                <label
                    class="form-check label"
                    for="feature-{{ $feature->id }}"
                >
                    {{ $feature->name }}
                </label>
            </div>
        @endforeach

        <hr />

        <!-- sort by and sort direction dropdowns -->
        <h3>Ordenación</h3>
        <div class="form-group cars-finder-sort-by">
            <label for="sort_by">Ordenar por</label>
            <select
                wire:model.live="filters.sorter.column"
                class="form-control"
                id="sort_by"
            >
                @foreach($sorterFields as $key => $field)
                    <option value="{{ $key }}">{{ $field }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group cars-finder-sort-direction">
            <label for="sort_direction">Dirección</label>
            <select
                wire:model.live="filters.sorter.direction"
                class="form-control"
                id="sort_direction"
            >
                @foreach($sorterDirections as $key => $direction)
                    <option value="{{ $key }}">{{ $direction }}</option>
                @endforeach
            </select>
        </div>

        <hr />

        <!-- reset filters button -->
        <div class="cars-finder-reset-filters">
            <button
                wire:click="resetFilters"
                class="btn btn-secondary w-100 mb-3"
            >
                Restablecer filtros
            </button>
        </div>
    </div>

    <!-- cars list -->
    <div class="col cars-finder-cars-list position-relative">
        <div class="sticky-top">
            <div class="row">
                @forelse($cars as $car)
                    <div class="col-4">
                        <div class="card">
                            <h5 class="card-title text-center price">{{ formatCurrency($car->price) }}</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group list-group-item">
                                    <strong>Marca:</strong> {{ $car->model->brand->name }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Modelo:</strong> {{ $car->model->name }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Color:</strong> {{ $car->color->name }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Kilómetros:</strong> {{ formatNumber($car->kilometers) }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Año:</strong> {{ $car->year }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Ciudad:</strong> {{ $car->dealership->city->name }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Concesionario:</strong> {{ $car->dealership->name }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Tipo de motor:</strong> {{ $car->engineType->name }}
                                </li>
                                <li class="list-group list-group-item">
                                    <strong>Características:</strong>
                                    @foreach($car->features as $feature)
                                        <span class="badge bg-secondary">{{ $feature->name }}</span>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="cars-not-found">
                            No se han encontrado coches con los filtros seleccionados.
                        </div>
                    </div>
                @endforelse
            </div>

            {{ $cars->links() }}
        </div>
    </div>
</div>

