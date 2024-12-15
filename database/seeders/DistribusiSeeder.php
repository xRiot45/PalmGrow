<?php

namespace Database\Seeders;

use App\Models\Distribusi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistribusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Distribusi::factory(10)->create();
    }
}
