<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function kebun(): BelongsTo
    {
        return $this->belongsTo(Kebun::class);
    }

    public function distribusi(): HasMany
    {
        return $this->hasMany(Distribusi::class);
    }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}
