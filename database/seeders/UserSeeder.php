<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->role('admin')->create();
        User::factory(10)->role('author')->create();
        User::factory(10)->role('supply_coordinator')->create();
        User::factory(10)->role('accountant')->create();
    }
}
