<?php

namespace Database\Factories;

use App\Models\Kebun;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Factories\Factory;


class DistribusiFactory extends Factory
{
    public function definition(): array
    {
        static $usedProduksiIds = [];

        $startDate = '2024-01-01';
        $endDate = '2024-12-31';

        $tanggal_distribusi = $this->faker->dateTimeBetween($startDate, $endDate);
        $availableProduksiIds = Produksi::pluck('id')->diff($usedProduksiIds)->toArray();
        $produksi_id = $this->faker->randomElement($availableProduksiIds);

        $usedProduksiIds[] = $produksi_id;

        return [
            'produksi_id' => $produksi_id,
            'tujuan' => $this->faker->city(),
            'jumlah' => $this->faker->randomNumber(2),
            'tanggal_distribusi' => $tanggal_distribusi
        ];
    }
}
