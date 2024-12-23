<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PembayaranExport;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanPembayaranController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['lokasi_produksi_kebun', 'jumlah_pembayaran_mulai', 'jumlah_pembayaran_selesai', 'metode_pembayaran', 'tanggal_pembayaran_mulai', 'tanggal_pembayaran_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'lokasi_produksi_kebun' => $query->whereHas('produksi', function ($q) use ($filterValue) {
                        $q->whereHas('kebun', function ($q) use ($filterValue) {
                            $q->where('lokasi', 'like', '%' . $filterValue . '%');
                        });
                    }),
                    'jumlah_pembayaran_mulai' => $query->where('jumlah_pembayaran', '>=', $filterValue),
                    'jumlah_pembayaran_selesai' => $query->where('jumlah_pembayaran', '<=', $filterValue),
                    'metode_pembayaran' => $query->where('metode_pembayaran', 'like', '%' . $filterValue . '%'),
                    'tanggal_pembayaran_mulai' => $query->where('tanggal_pembayaran', '>=', $filterValue),
                    'tanggal_pembayaran_selesai' => $query->where('tanggal_pembayaran', '<=', $filterValue),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = request()->input('perPage', 10);
        $query = Pembayaran::query()->orderByDesc('created_at');

        $this->applyFilters($query, request());

        $pembayaran = $query->paginate($perPage)->appends($request->except('page'));
        $lokasi_produksi_kebun = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.laporan-pembayaran.index', [
            'data' => $pembayaran->items(),
            'pagination' => $pembayaran,
            'lokasi_produksi_kebun' => $lokasi_produksi_kebun,
            'perPage' => $perPage,
        ]);
    }

    public function export_csv(Request $request): BinaryFileResponse
    {
        $query = Pembayaran::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        return Excel::download(new PembayaranExport($query), 'Laporan Pembayaran.xlsx');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Pembayaran::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        $pdfContent = view('pages.admin.laporan-pembayaran.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        $nodeBinaryPath = env('NODE_BINARY_PATH');

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:' . $nodeBinaryPath)
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->landscape()
            ->save(storage_path('/app/public/laporan/laporan-pembayaran.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-pembayaran.pdf'));
    }
}
