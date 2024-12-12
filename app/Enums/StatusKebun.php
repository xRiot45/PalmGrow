<?php

namespace App\Enums;

enum StatusKebun: string
{
    case Aktif = 'Aktif';

    case nonAktif = 'Non-Aktif';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
