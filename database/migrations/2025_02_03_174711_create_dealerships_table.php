<?php

use App\Models\City;
use App\Models\Dealership;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('dealerships', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(City::class, 'city_id');

            $table->string('name');
            $table->string('address');
        });

        $madrid = City::where('name', 'Madrid')->first();

        Dealership::insert([
            ['city_id' => $madrid->id, 'name' => 'AutoMadrid', 'address' => 'Paseo de la Castellana, 1'],
            ['city_id' => $madrid->id, 'name' => 'Madrid Motors', 'address' => 'Calle de Alcalá, 2'],
            ['city_id' => $madrid->id, 'name' => 'Castellana Cars', 'address' => 'Calle de Serrano, 3'],
            ['city_id' => $madrid->id, 'name' => 'Goya Autos', 'address' => 'Calle de Goya, 4'],
            ['city_id' => $madrid->id, 'name' => 'Velázquez Vehículos', 'address' => 'Calle de Velázquez, 5'],
        ]);

        $barcelona = City::where('name', 'Barcelona')->first();

        Dealership::insert([
            ['city_id' => $barcelona->id, 'name' => 'AutoBarcelona', 'address' => 'Rambla de Catalunya, 1'],
            ['city_id' => $barcelona->id, 'name' => 'Barcelona Motors', 'address' => 'Paseo de Gracia, 2'],
            ['city_id' => $barcelona->id, 'name' => 'Diagonal Cars', 'address' => 'Avenida Diagonal, 3'],
            ['city_id' => $barcelona->id, 'name' => 'Balmes Autos', 'address' => 'Calle de Balmes, 4'],
            ['city_id' => $barcelona->id, 'name' => 'Marina Vehículos', 'address' => 'Calle de la Marina, 5'],
        ]);

        $valencia = City::where('name', 'Valencia')->first();

        Dealership::insert([
            ['city_id' => $valencia->id, 'name' => 'AutoValencia', 'address' => 'Calle de Colón, 1'],
            ['city_id' => $valencia->id, 'name' => 'Valencia Motors', 'address' => 'Calle de la Paz, 2'],
            ['city_id' => $valencia->id, 'name' => 'San Vicente Cars', 'address' => 'Calle de San Vicente, 3'],
            ['city_id' => $valencia->id, 'name' => 'Reina Autos', 'address' => 'Calle de la Reina, 4'],
            ['city_id' => $valencia->id, 'name' => 'Mar Vehículos', 'address' => 'Calle de la Mar, 5'],
        ]);

    }


    public function down(): void
    {
        Schema::dropIfExists('dealerships');
    }
};
