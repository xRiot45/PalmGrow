<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PenggunaExport;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanPenggunaController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['role']);
        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'role' => $query->where('role', 'like', '%' . $filterValue . '%'),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Pengguna::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);

        $pengguna = $query->paginate($perPage)->appends($request->except('page'));
        return view('pages.admin.laporan-pengguna.index', [
            'data' => $pengguna->items(),
            'pagination' => $pengguna,
            'perPage' => $perPage,
        ]);
    }

    public function export_excel(Request $request): BinaryFileResponse
    {
        $query = Pengguna::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        return Excel::download(new PenggunaExport($query), 'Laporan Pengguna.xlsx');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Pengguna::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);

        $pdfContent = view('pages.admin.laporan-pengguna.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        $nodeBinaryPath = env('NODE_BINARY_PATH');

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:' . $nodeBinaryPath)
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->save(storage_path('/app/public/laporan/laporan-pengguna.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-pengguna.pdf'));
    }
}
