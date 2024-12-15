<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';

    protected $fillable = [
        'kebun_id',
        'jumlah_tandan',
        'berat_total',
        'tanggal_produksi',
    ];

    protected function casts(): array
    {
        return  [
            'tanggal_produksi' => 'date',
        ];
    }

    public function kebun()
    {
        return $this->belongsTo(Kebun::class);
    }

    public function distribusi()
    {
        return $this->hasMany(Distribusi::class);
    }
}
