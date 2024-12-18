<?php

namespace Database\Seeders;

use App\Models\KategoriPanen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriPanen::factory(20)->create();
    }
}
