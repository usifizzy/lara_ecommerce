<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'system admin',
            'email'    => 'usifizzy@yahoo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Password12#'),
            'remember_token' => Str::random(10),
            'role' => 'Admin',
            'address' => fake()->streetAddress(),
            'phone' => fake()->phone(),
        ]);
        User::factory(2)->create();
        Product::factory(20)->create();

    }
}
