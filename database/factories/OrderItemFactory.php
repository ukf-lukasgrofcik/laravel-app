<?php

namespace Database\Factories;

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
        $price = fake()->numberBetween(1000, 20000) / 100;
        $quantity = fake()->numberBetween(1, 20);

        return [
            'name' => fake()->name(),
            'price' => $price,
            'quantity' => $quantity,
            'full_price' => $price * $quantity,
        ];
    }

    public function ofOrder(int $order_id) : Factory
    {
        return $this->state(function (array $attributes) use ($order_id) {
            return [
                'order_id' => $order_id,
            ];
        });
    }

}
