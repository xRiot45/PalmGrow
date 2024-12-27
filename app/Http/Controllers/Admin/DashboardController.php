<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribusi;
use App\Models\Kebun;
use App\Models\Laporan;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Produksi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $bulan = [
            12 => 'Desember',
            11 => 'November',
            10 => 'Oktober',
            9 => 'September',
            8 => 'Agustus',
            7 => 'Juli',
            6 => 'Juni',
            5 => 'Mei',
            4 => 'April',
            3 => 'Maret',
            2 => 'Februari',
            1 => 'Januari',
        ];

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
            ],
            'total_produksi_bulanan' => $this->getProduksiBulanan($bulan),
            'total_distribusi_bulanan' => $this->getDistribusiBulanan($bulan),
        ];

        $bulanDenganData = $this->getBulanDenganData($bulan, $totals);

        return view('pages.admin.dashboard.index', compact('totals', 'bulanDenganData'));
    }

    private function getProduksiBulanan(array $bulan): Collection
    {
        return Produksi::selectRaw(
            'YEAR(tanggal_produksi) as year, MONTH(tanggal_produksi) as month, SUM(jumlah_tandan) as total_tandan, SUM(berat_total) as total_berat'
        )
            ->groupBy(DB::raw('YEAR(tanggal_produksi)'), DB::raw('MONTH(tanggal_produksi)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($item) use ($bulan) {
                $item->month_name = $bulan[$item->month] ?? 'Unknown';
                return $item;
            });
    }

    private function getDistribusiBulanan(array $bulan): Collection
    {
        return Distribusi::selectRaw(
            'YEAR(tanggal_distribusi) as year, MONTH(tanggal_distribusi) as month, SUM(jumlah) as jumlah_distribusi'
        )
            ->groupBy(DB::raw('YEAR(tanggal_distribusi)'), DB::raw('MONTH(tanggal_distribusi)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($item) use ($bulan) {
                $item->month_name = $bulan[$item->month] ?? 'Unknown';
                return $item;
            });
    }

    private function getBulanDenganData(array $bulan, array $totals): Collection
    {
        $bulanDenganData = collect([]);

        foreach ($bulan as $monthNumber => $monthName) {
            $total_produksi = $totals['total_produksi_bulanan']->firstWhere('month', $monthNumber);
            $total_distribusi = $totals['total_distribusi_bulanan']->firstWhere('month', $monthNumber);

            if ($total_produksi) {
                $bulanDenganData->push($total_produksi);
            } elseif ($total_distribusi) {
                $bulanDenganData->push($total_distribusi);
            } else {
                $bulanDenganData->push((object) [
                    'year' => date('Y'),
                    'month' => $monthNumber,
                    'total_tandan' => 0,
                    'total_berat' => 0,
                    'month_name' => $monthName,
                ]);
            }
        }

        return $bulanDenganData->sortBy('month');
    }
}
