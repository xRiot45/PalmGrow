<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PetugasExport;
use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanPetugasController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['nama_petugas', 'jabatan', 'tanggal_bergabung_mulai', 'tanggal_bergabung_selesai']);
        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'nama_petugas' => $query->where('petugas.nama_petugas', 'like', '%' . $filterValue . '%'),
                    'jabatan' => $query->where('petugas.jabatan', 'like', '%' . $filterValue . '%'),
                    'tanggal_bergabung_mulai' => $query->where('petugas.tanggal_bergabung', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_bergabung_selesai' => $query->where('petugas.tanggal_bergabung', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Petugas::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $petugas = $query->paginate($perPage)->appends($request->except('page'));
        return view('pages.admin.laporan-petugas.index', [
            'data' => $petugas->items(),
            'pagination' => $petugas,
            'perPage' => $perPage,
        ]);
    }

    public function export_csv(Request $request): BinaryFileResponse
    {
        $query = Petugas::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        return Excel::download(new PetugasExport($query), 'Laporan Petugas.csv');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Petugas::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);

        $pdfContent = view('pages.admin.laporan-petugas.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        $nodeBinaryPath = env('NODE_BINARY_PATH');

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:' . $nodeBinaryPath)
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->save(storage_path('/app/public/laporan/laporan-petugas.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-petugas.pdf'));
    }
}
