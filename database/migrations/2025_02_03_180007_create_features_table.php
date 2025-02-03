<?php

use App\Models\Feature;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();

            $table->string('name');
        });

        Feature::insert([
            ['name' => 'Aire acondicionado'],
            ['name' => 'Cierre centralizado'],
            ['name' => 'Elevalunas eléctrico'],
            ['name' => 'Dirección asistida'],
            ['name' => 'ABS'],
            ['name' => 'Airbag'],
            ['name' => 'ESP'],
            ['name' => 'Radio'],
            ['name' => 'Bluetooth'],
            ['name' => 'USB'],
            ['name' => 'Navegador'],
            ['name' => 'Cámara de visión trasera'],
            ['name' => 'Sensores de aparcamiento'],
            ['name' => 'Llantas de aleación'],
            ['name' => 'Faros antiniebla'],
            ['name' => 'Techo solar'],
        ]);

    }


    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
