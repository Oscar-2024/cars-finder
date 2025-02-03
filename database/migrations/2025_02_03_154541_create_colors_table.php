<?php

use App\Models\Color;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            Color::insert([
                ['name' => 'Rojo'],
                ['name' => 'Azul'],
                ['name' => 'Verde'],
                ['name' => 'Amarillo'],
                ['name' => 'Blanco'],
            ]);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
