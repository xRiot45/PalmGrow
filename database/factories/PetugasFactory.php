<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengguna_id' => Pengguna::inRandomOrder()->first()->id,
            'nama_petugas' => $this->faker->name,
            'jabatan' => $this->faker->jobTitle,
            'tanggal_bergabung' => $this->faker->date('Y-m-d', 'now')
        ];
    }
}
