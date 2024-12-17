<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'produksi_id',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'bukti_pembayaran',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pembayaran' => 'date'
        ];
    }

    public function produksi(): BelongsTo
    {
        return $this->belongsTo(Produksi::class);
    }
}
