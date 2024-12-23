<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProduksiExport implements FromCollection, WithHeadings, WithMapping
{
    private Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function collection(): Collection
    {
        return $this->query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Lokasi Kebun',
            'Luas Kebun',
            'Jumlah Tandan',
            'Berat Total',
            'Tanggal Produksi',
            'Didaftarkan Pada'
        ];
    }

    public function map($produksi): array
    {
        static $no = 1;

        return [
            $no++,
            $produksi->kebun->lokasi,
            $produksi->kebun->luas . ' m²',
            $produksi->jumlah_tandan . ' Tandan',
            $produksi->berat_total . ' Kg',
            $produksi->tanggal_produksi->format('Y-m-d'),
            $produksi->created_at->format('Y-m-d'),
        ];
    }
}
