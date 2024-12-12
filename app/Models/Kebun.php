<?php

namespace App\Models;

use App\Enums\StatusKebun;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    use HasFactory;

    protected $table = 'kebun';

    protected $fillable = [
        'lokasi',
        'luas',
        'status',
        'tanggal_tanam',
        'tanggal_panen',
    ];

    protected function casts(): array
    {
        return [
            'status' => StatusKebun::class,
            'tanggal_tanam' => 'date',
            'tanggal_panen' => 'date',
        ];
    }
}
