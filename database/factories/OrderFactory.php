<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => 'ORD' . fake()->unique()->numberBetween(123456800, 9999999999),
            'shipping' => fake()->numberBetween(10,60) * 1000,
            'payment_method' => 'Credit Card',
            'user_id' => User::factory()
        ];
    }
}
