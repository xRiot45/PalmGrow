<?php

namespace App\Exports;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PenggunaExport implements FromCollection, WithHeadings, WithMapping
{
    protected $role;

    public function __construct($role = null)
    {
        $this->role = $role;
    }

    public function collection(): Collection
    {
        $query = Pengguna::query();

        if ($this->role) {
            $query->where('role', 'like', '%' . $this->role  . '%');
        }

        return $query->get();
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
