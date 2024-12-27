<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kebun>
 */
class KebunFactory extends Factory
{
    public function definition(): array
    {
        $startDate = '2024-12-01';
        $endDateForTanam = '2024-12-31';
        $startDateForPanen = '2025-01-01';
        $endDateForPanen = '2025-12-31';

        $tanggalTanam = $this->faker->dateTimeBetween($startDate, $endDateForTanam)->format('Y-m-d');

        return [
            'lokasi' => $this->faker->city,
            'luas' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['Aktif', 'Non-Aktif']),
            'tanggal_tanam' => $tanggalTanam,
            'tanggal_panen' => $this->faker->dateTimeBetween($startDateForPanen, $endDateForPanen)->format('Y-m-d'),
        ];
    }
}
