<?php


use App\Models\Base\Brand;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();

            $table->string('name');
        });

        App\Models\Brand::insert([
            ['id' => Brand::TOYOTA, 'name' => 'Toyota'],
            ['id' => Brand::FORD, 'name' => 'Ford'],
            ['id' => Brand::CHEVROLET, 'name' => 'Chevrolet'],
            ['id' => Brand::NISSAN, 'name' => 'Nissan'],
            ['id' => Brand::HONDA, 'name' => 'Honda'],
            ['id' => Brand::VOLKSWAGEN, 'name' => 'Volkswagen'],
            ['id' => Brand::HYUNDAI, 'name' => 'Hyundai'],
            ['id' => Brand::MERCEDES_BENZ, 'name' => 'Mercedes-Benz'],
            ['id' => Brand::BMW, 'name' => 'BMW'],
            ['id' => Brand::AUDI, 'name' => 'Audi'],
        ]);
    }
    


    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
