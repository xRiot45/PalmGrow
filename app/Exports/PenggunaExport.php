<?php

namespace App\Exports;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PenggunaExport implements FromCollection, WithHeadings, WithMapping
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
            'Nama Pengguna',
            'Email Pengguna',
            'Role',
            'Didaftakan Pada',
        ];
    }

    public function map($pengguna): array
    {
        static $no = 1;

        return [
            $no++,
            $pengguna->name,
            $pengguna->email,
            $pengguna->role->value,
            $pengguna->created_at->format('Y-m-d'),
        ];
    }
}
