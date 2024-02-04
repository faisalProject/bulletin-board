<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create admin
        User::create([
            'username' => 'Muhamad Faisal',
            'email' => 'faisal@admin.com',
            'password' => '$2y$10$OX3b9NC/Fp3abHjPwAwny..qmw7Xg7P.Gl6TOwR/IyPCKCaqwklzC',
            'role' => 'admin'
        ]);
    }
}
