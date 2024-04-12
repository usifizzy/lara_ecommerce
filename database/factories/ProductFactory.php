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
            'name' => fake()->name(),
            'price' => fake()->numberBetween($min = 1500, $max = 6000),
            'category' => fake()->name(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl($width = 200, $height = 200),
        ];
    }
}
