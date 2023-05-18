<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Supplier;
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
            'number' => str_pad(fake()->numberBetween(1, 9999999999), 10, '0', STR_PAD_LEFT),
            'price' => 0,
        ];
    }

    public function randomSupplier() : Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'supplier_id' => Supplier::inRandomOrder()->first()->id,
            ];
        });
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Order $order) {
            $items = OrderItem::factory(fake()->numberBetween(1, 6))->ofOrder($order->id)->create();

            $price = $items->sum('full_price');
            $vat = round($price * 0.2, 2);
            $price_vat = $price + $vat;

            $order->price = $price;
            $order->vat = $vat;
            $order->price_vat = $price_vat;
            $order->save();
        });
    }
}
