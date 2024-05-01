<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        # For admin
        \App\Models\User::factory(1)->create();

        # For normal user
        \App\Models\User::factory()->create([
            'name' => 'Carl Madrigal',
            'email' => 'carlmadrigal@gmail.com',
            'username' => 'carlmadrigal',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => bcrypt('password123'),
            'remember_token' => Str::random(10),
        ]); 
    }
}
