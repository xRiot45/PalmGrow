<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'pengguna_id',
        'nama_petugas',
        'jabatan',
        'tanggal_bergabung'
    ];

    protected function casts(): array
    {
        return [
            'tanggal_bergabung' => 'date'
        ];
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}
