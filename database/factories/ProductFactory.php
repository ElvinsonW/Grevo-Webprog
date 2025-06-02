<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'slug' => Str::slug(fake()->unique()->word()),
            'product_category_id' => ProductCategory::factory(),
            'weight' => fake()->numberBetween(1,5),
            'material' => fake()->word(),
            'process' => fake()->paragraph(),
            'certification' => fake()->word(),
            'description' => fake()->paragraph(),
            'sold' => fake()->numberBetween(1,100)
        ];
    }
}
