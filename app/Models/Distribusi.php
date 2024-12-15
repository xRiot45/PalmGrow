<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $table = 'distribusi';

    protected $fillable = [
        'produksi_id',
        'tujuan',
        'jumlah',
        'tanggal_distribusi'
    ];

    protected function casts(): array
    {
        return [
            'tanggal_distribusi' => 'date',
        ];
    }


    public function produksi()
    {
        return $this->belongsTo(Produksi::class);
    }
}
