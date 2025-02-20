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
            'sku' => strtoupper($this->faker->unique()->lexify('SKU-?????')), 
            'title' => $this->faker->words(3, true), 
            'description' => $this->faker->sentence(10), 
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
