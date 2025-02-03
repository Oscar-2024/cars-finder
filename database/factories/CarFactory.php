<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'engine_type_id' => \App\Models\EngineType::inRandomOrder()->first()->id,
            'car_model_id' => \App\Models\CarModel::inRandomOrder()->first()->id,
            'dealership_id' => \App\Models\Dealership::inRandomOrder()->first()->id,
            'color_id' => \App\Models\Color::inRandomOrder()->first()->id,
            'year' => $this->faker->numberBetween(1990, 2024),
            'price' => $this->faker->numberBetween(1000, 100000),
            'kilometers' => $this->faker->numberBetween(0, 500000),
        ];
    }
}
