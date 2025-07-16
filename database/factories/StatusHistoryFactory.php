<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StatusHistory>
 */
class StatusHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'status' => fake()->randomElement([
                'ORDER PLACED',
                'ORDER SHIPPED',
                'ORDER ARRIVED',
                'ORDER RECIEVED',
                'ORDER COMPLETED',
                'ORDER CANCEL',
            ]),
            'changed_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
