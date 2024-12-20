<?php

namespace App\Exports;

use App\Models\Kebun;
use Maatwebsite\Excel\Concerns\FromCollection;

class KebunExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kebun::all();
    }
}
