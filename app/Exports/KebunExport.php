<?php

namespace App\Exports;

use App\Models\Kebun;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KebunExport implements FromCollection, WithHeadings, WithMapping
{
    private Builder $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        // Use the filtered query to fetch the data
        return $this->query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Lokasi Kebun',
            'Luas Kebun',
            'Status Kebun',
            'Tanggal Tanam',
            'Tanggal Panen',
            'Didatakan Pada',
        ];
    }

    public function map($kebun): array
    {
        static $no = 1;

        return [
            $no++,
            $kebun->lokasi,
            $kebun->luas . 'm',
            $kebun->status->value,
            $kebun->tanggal_tanam->format('Y-m-d'),
            $kebun->tanggal_panen->format('Y-m-d'),
            $kebun->created_at->format('Y-m-d'),
        ];
    }
}
