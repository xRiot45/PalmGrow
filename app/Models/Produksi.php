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
        'tanggal_panen',
    ];

    protected function casts(): array
    {
        return  [
            'tanggal_panen' => 'date',
        ];
    }

    public function kebun()
    {
        return $this->belongsTo(Kebun::class);
    }
}
