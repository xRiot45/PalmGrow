<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProduksiExport;
use App\Http\Controllers\Controller;
use App\Models\Kebun;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanProduksiController extends Controller
{
    protected function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['lokasi_kebun', 'luas_kebun_mulai', 'luas_kebun_selesai', 'jumlah_tandan_mulai', 'jumlah_tandan_selesai', 'berat_total_mulai', 'berat_total_selesai', 'tanggal_produksi_mulai', 'tanggal_produksi_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'lokasi_kebun' => $query->whereHas('kebun', function ($q) use ($filterValue) {
                        $q->where('lokasi', 'like', '%' . $filterValue . '%');
                    }),
                    'luas_kebun_mulai' => $query->whereHas('kebun', function ($q) use ($filterValue) {
                        $q->where('luas', '>=', $filterValue);
                    }),
                    'luas_kebun_selesai' => $query->whereHas('kebun', function ($q) use ($filterValue) {
                        $q->where('luas', '<=', $filterValue);
                    }),
                    'jumlah_tandan_mulai' => $query->where('jumlah_tandan', '>=', $filterValue),
                    'jumlah_tandan_selesai' => $query->where('jumlah_tandan', '<=', $filterValue),
                    'berat_total_mulai' => $query->where('berat_total', '>=', $filterValue),
                    'berat_total_selesai' => $query->where('berat_total', '<=', $filterValue),
                    'tanggal_produksi_mulai' => $query->where('tanggal_produksi', '>=', $filterValue),
                    'tanggal_produksi_selesai' => $query->where('tanggal_produksi', '<=', $filterValue),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Produksi::query()->orderByDesc('created_at');

        $this->applyFilters($query, request());

        $produksi = $query->paginate($perPage)->appends($request->except('page'));
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();

        return view('pages.admin.laporan-produksi.index', [
            'data' => $produksi->items(),
            'pagination' => $produksi,
            'lokasi_kebun' => $lokasi_kebun,
            'perPage' => $perPage,
        ]);
    }

    public function export_csv(Request $request): BinaryFileResponse
    {
        $query = Produksi::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        return Excel::download(new ProduksiExport($query), 'Laporan Produksi.csv');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Produksi::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);

        $pdfContent = view('pages.admin.laporan-produksi.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        $nodeBinaryPath = env('NODE_BINARY_PATH');

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:' . $nodeBinaryPath)
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->save(storage_path('/app/public/laporan/laporan-produksi.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-produksi.pdf'));
    }
}
