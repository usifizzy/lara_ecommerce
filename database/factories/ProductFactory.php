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
            'name' => fake()->word(),
            'price' => fake()->randomFloat(2),
            // 'price' => fake()->numberBetween($min = 1500, $max = 6000),
            'category' => fake()->word(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl($width = 200, $height = 200),
        ];
    }
} 

// [
// [
//     'name' => fake()->word(),
//     'price' => fake()->randomFloat(2),
//     // 'price' => fake()->numberBetween($min = 1500, $max = 6000),
//     'category' => fake()->word(),
//     'description' => fake()->paragraph(),
//     'image' => fake()->imageUrl($width = 200, $height = 200),
// ],
// [
//     'name' => 'Samsung'
//     'price' => fake()->randomFloat(2),
//     // 'price' => fake()->numberBetween($min = 1500, $max = 6000),
//     'category' => fake()->word(),
//     'description' => fake()->paragraph(),
//     'image' => fake()->imageUrl($width = 200, $height = 200),
// ],
// [
//     'name' => 'iphone 15',
//     'price' => 1000,
//     // 'price' => fake()->numberBetween($min = 1500, $max = 6000),
//     'category' => 'phone',
//     'description' => 'Apple Iphone 15',
//     'image' => fake()->imageUrl($width = 200, $height = 200),
// ],
// ];
