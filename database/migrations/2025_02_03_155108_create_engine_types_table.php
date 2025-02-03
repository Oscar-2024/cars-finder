<?php

use App\Models\EngineType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('engine_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');
        });

        EngineType::insert([
            ['name' => 'Gasolina'],
            ['name' => 'Diesel'],
            ['name' => 'Híbrido'],
            ['name' => 'Eléctrico'],
        ]);
    }


    public function down(): void
    {
        Schema::dropIfExists('engine_types');
    }
};
