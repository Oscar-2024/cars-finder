<?php

use App\Models\Base\Brand;
use App\Models\CarModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Brand::class, 'brand_id');

            $table->string('name');
        });

        $modelsForBrands = [
            Brand::TOYOTA => ['Corolla', 'Yaris', 'RAV4', 'Camry', 'Land Cruiser', 'Prius', 'C-HR', 'Highlander', 'Sienna', 'Sequoia'],
            Brand::FORD => ['Fiesta', 'Focus', 'Mondeo', 'Mustang', 'EcoSport', 'Kuga', 'Edge', 'Explorer', 'Ranger', 'F-150'],
            Brand::CHEVROLET => ['Spark', 'Sonic', 'Cruze', 'Malibu', 'Impala', 'Trax', 'Equinox', 'Blazer', 'Tahoe', 'Suburban'],
            Brand::NISSAN => ['Micra', 'Leaf', 'Pulsar', 'Qashqai', 'X-Trail', 'Juke', 'Navara', 'Pathfinder', 'Patrol', '370Z'],
            Brand::HONDA => ['Jazz', 'Civic', 'Accord', 'HR-V', 'CR-V', 'Pilot', 'Odyssey', 'Ridgeline'],
            Brand::VOLKSWAGEN => ['Polo', 'Golf', 'Passat', 'Arteon', 'T-Roc', 'Tiguan', 'Touran', 'Sharan', 'Atlas', 'Amarok'],
            Brand::HYUNDAI => ['i10', 'i20', 'i30', 'i40', 'Ioniq', 'Kona', 'Tucson', 'Santa Fe', 'Palisade'],
            Brand::MERCEDES_BENZ => ['Clase A', 'Clase B', 'Clase C', 'Clase E', 'Clase S', 'Clase G', 'Clase GLA', 'Clase GLC', 'Clase GLE', 'Clase GLS'],
            Brand::BMW => ['Serie 1', 'Serie 2', 'Serie 3', 'Serie 4', 'Serie 5', 'Serie 6', 'Serie 7', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7'],
            Brand::AUDI => ['A1', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q2'],
        ];

        foreach ($modelsForBrands as $brandId => $models) {
            foreach ($models as $modelName) {
                CarModel::create([
                    'brand_id' => $brandId,
                    'name' => $modelName,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
