<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\User;

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
        Pengguna::factory(10)->create();

        // Pengguna::factory()->create([
        //     'name' => 'Reback',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'Admin',
        //     'remember_token' => Str::random(10),
        // ]);
    }
}
