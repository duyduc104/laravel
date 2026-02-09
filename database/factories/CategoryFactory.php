<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2,true),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(640, 480, 'cats', true),
            'parent_id' => $this->faker->numberBetween(1, 5),
            'is_active' => $this->faker->boolean(),
            'is_delete' => $this->faker->boolean()
        ];
    }
}
