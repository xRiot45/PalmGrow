<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'Admin';
    case PetugasKebun = 'Petugas Kebun';
    case Manajer = 'Manajer';
}
