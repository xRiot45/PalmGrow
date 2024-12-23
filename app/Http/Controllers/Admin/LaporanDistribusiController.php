<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DistribusiExport;
use App\Http\Controllers\Controller;
use App\Models\Distribusi;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanDistribusiController extends Controller
{
    protected function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['tujuan_distribusi', 'jumlah_distribusi_mulai', 'jumlah_distribusi_selesai', 'tanggal_distribusi_mulai', 'tanggal_distribusi_selesai', 'lokasi_kebun']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'tujuan_distribusi' => $query->where('tujuan', 'like', '%' . $filterValue . '%'),
                    'jumlah_distribusi_mulai' => $query->where('jumlah', '>=', $filterValue),
                    'jumlah_distribusi_selesai' => $query->where('jumlah', '<=', $filterValue),
                    'tanggal_distribusi_mulai' => $query->where('tanggal_distribusi', '>=', $filterValue),
                    'tanggal_distribusi_selesai' => $query->where('tanggal_distribusi', '<=', $filterValue),
                    'lokasi_kebun' => $query->whereHas('produksi.kebun', function ($q) use ($filterValue) {
                        $q->where('lokasi', 'like', '%' . $filterValue . '%');
                    }),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Distribusi::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $distribusi = $query->paginate($perPage)->appends($request->except('page'));
        $lokasiKebun = Produksi::join('kebun', 'kebun.id', '=', 'produksi.kebun_id')->select('kebun.id', 'kebun.lokasi')->distinct()->get();

        return view('pages.admin.laporan-distribusi.index', [
            'data' => $distribusi->items(),
            'pagination' => $distribusi,
            'lokasi_kebun' => $lokasiKebun,
            'perPage' => $perPage,
        ]);
    }

    public function export_csv(Request $request): BinaryFileResponse
    {
        $query = Distribusi::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        return Excel::download(new DistribusiExport($query), 'Laporan Distribusi.csv');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Distribusi::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);

        $pdfContent = view('pages.admin.laporan-distribusi.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        $nodeBinaryPath = env('NODE_BINARY_PATH');

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:' . $nodeBinaryPath)
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->save(storage_path('/app/public/laporan/laporan-distribusi.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-distribusi.pdf'));
    }
}
