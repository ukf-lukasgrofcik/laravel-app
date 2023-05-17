<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'address' => fake()->address(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'business_id' => "" . fake()->numberBetween(10000000, 99999999),
            'tax_id' => "" . fake()->numberBetween(1000000000, 9999999999),
            'vat_registration_number' => "" . fake()->numberBetween(1000000000, 9999999999),
            'iban' => fake()->iban(),
        ];
    }

}
