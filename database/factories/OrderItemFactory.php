<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
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
            'variant_id' => $variant = ProductVariant::factory(),
            'quantity' => $quantity = fake()->numberBetween(1, 5),
            'price' => 0
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function ($orderItem) {
            $orderItem->price = $orderItem->variant->price * $orderItem->quantity;
        });
    }
}
