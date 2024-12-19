<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function index(): View
    {
        return view('pages.petugas.laporan.index');
    }
}
