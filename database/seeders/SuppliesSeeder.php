<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory(30)->create();
        Order::factory(50)->randomSupplier()->create();
    }
}
