<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->string('name');
        });

        City::insert([
            ['name' => 'Madrid'],
            ['name' => 'Barcelona'],
            ['name' => 'Valencia'],
        ]);
    }


    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
