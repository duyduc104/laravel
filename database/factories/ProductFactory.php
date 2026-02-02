<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(10, true),
            'price' => $this->faker->randomFloat(2,10,1000),
            'quatity' => $this->faker->numberBetween(1, 100), 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
