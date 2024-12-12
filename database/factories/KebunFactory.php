<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kebun>
 */
class KebunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lokasi' => $this->faker->city, // ganti 'lokasi' dengan format yang valid seperti 'city'
            'luas' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['Aktif', 'Non-Aktif']),
            'tanggal_tanam' => $this->faker->date('Y-m-d', 'now'),
            'tanggal_panen' => $this->faker->date('Y-m-d', 'now')
        ];
    }
}
