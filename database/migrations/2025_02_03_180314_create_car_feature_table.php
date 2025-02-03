<?php

use App\Models\Car;
use App\Models\Feature;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('car_feature', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(Car::class)->constrained();
            $table->foreignIdFor(Feature::class)->constrained();
        });

        $features = Feature::all();
        $cars = Car::all();

        foreach ($cars as $car) {
            $car->features()->attach($features->random(rand(1, 5)));
        }

    }


    public function down(): void
    {
        Schema::dropIfExists('car_feature');
    }
};
