<?php

namespace Database\Factories;

use App\Models\Produksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distribusi>
 */
class DistribusiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'produksi_id' => Produksi::inRandomOrder()->first()->id,
            'tujuan' => $this->faker->city(),
            'jumlah' => $this->faker->randomNumber(2),
            'tanggal_distribusi' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
