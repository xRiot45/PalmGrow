<?php

namespace Database\Seeders;

use App\Models\Kebun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KebunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kebun::factory(100)->create();
    }
}
