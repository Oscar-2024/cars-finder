<?php

use App\Models\Car;
use App\Models\Color;
use App\Models\CarModel;
use App\Models\Dealership;
use App\Models\EngineType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(EngineType::class, 'engine_type_id');
            $table->foreignIdFor(CarModel::class, 'car_model_id');
            $table->foreignIdFor(Dealership::class, 'dealership_id');
            $table->foreignIdFor(Color::class, 'color_id');

            $table->integer('year'); // Año de fabricación
            $table->integer('price'); // Precio en euros
            $table->integer('kilometers'); // Kilómetros recorridos

            $table->timestamps();
        });

        Car::factory(1000)->create();
    }


    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
