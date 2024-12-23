<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DistribusiExport implements FromCollection, WithHeadings, WithMapping
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
            'Tujuan Distribusi',
            'Jumlah Distribusi',
            'Tanggal Distribusi',
            'Lokasi Kebun',
            'Tanggal Produksi',
            'Didaftakan Pada',
        ];
    }

    public function map($distribusi): array
    {
        static $no = 1;
        return [
            $no++,
            $distribusi->tujuan,
            $distribusi->jumlah,
            $distribusi->tanggal_distribusi->format('Y-m-d'),
            $distribusi->produksi->kebun->lokasi,
            $distribusi->produksi->tanggal_produksi->format('Y-m-d'),
            $distribusi->created_at->format('Y-m-d'),
        ];
    }
}
