<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Seeder untuk user biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
