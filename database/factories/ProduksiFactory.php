<?php

namespace Database\Factories;

use App\Models\Kebun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produksi>
 */
class ProduksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kebun_id' => Kebun::inRandomOrder()->first()->id,
            'jumlah_tandan' => $this->faker->randomNumber(2),
            'berat_total' => $this->faker->randomFloat(2, 0, 100),
            'tanggal_panen' => $this->faker->date('Y-m-d', 'now')
        ];
    }
}
