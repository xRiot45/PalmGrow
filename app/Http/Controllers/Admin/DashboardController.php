<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribusi;
use App\Models\Kebun;
use App\Models\Laporan;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Produksi;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totals = [
            'total_pengguna' => Pengguna::count(),
            'total_laporan_masuk' => Laporan::count(),
            'total_produksi' => Produksi::count(),
            'total_distribusi' => Distribusi::count(),
            'total_kebun' => [
                'aktif' => Kebun::where('status', 'Aktif')->count(),
                'non_aktif' => Kebun::where('status', 'Non-Aktif')->count(),
            ],
            'total_pembayaran' => [
                'cash' => Pembayaran::where('metode_pembayaran', 'Cash')->count(),
                'transfer' => Pembayaran::where('metode_pembayaran', 'Transfer')->count(),
            ]
        ];

        return view('pages.admin.dashboard.index', compact('totals'));
    }
}
