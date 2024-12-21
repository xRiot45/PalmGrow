<?php

namespace App\Exports;

use App\Models\Petugas;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PetugasExport implements FromCollection, WithHeadings, WithMapping
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
            'Email Petugas',
            'Nama Petugas',
            'Jabatan',
            'Tanggal Bergabung',
            'Role',
            'Didaftakan Pada',
        ];
    }

    public function map($petugas): array
    {
        static $no = 1;

        return [
            $no++,
            $petugas->pengguna->email,
            $petugas->nama_petugas,
            $petugas->jabatan,
            $petugas->created_at->format('Y-m-d'),
            $petugas->pengguna->role->value,
            $petugas->created_at->format('Y-m-d'),
        ];
    }
}
