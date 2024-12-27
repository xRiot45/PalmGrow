<?php

namespace Database\Factories;

use App\Models\Kebun;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProduksiFactory extends Factory
{
    public function definition(): array
    {
        static $usedKebunIds = [];

        $startDate = '2024-01-01';
        $endDate = '2024-12-31';

        $tanggal_produksi = $this->faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');
        $availableKebunIds = Kebun::pluck('id')->diff($usedKebunIds)->toArray();
        $kebun_id = $this->faker->randomElement($availableKebunIds);

        $usedKebunIds[] = $kebun_id;

        return [
            'kebun_id' => $kebun_id,
            'jumlah_tandan' => $this->faker->randomNumber(2),
            'berat_total' => $this->faker->randomFloat(2, 0, 100),
            'tanggal_produksi' => $tanggal_produksi
        ];
    }
}
