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
use Spatie\LaravelPdf\Facades\Pdf;

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
        $role = $request->input('role');
        $data = [];
        $pagination = null;

        if ($role) {
            $query = Pengguna::query()->orderByDesc('created_at');
            $this->applyFilters($query, $request);
            $pagination = $query->paginate($perPage)->appends($request->except('page'));
            $data = $pagination->items();
        } else {
            $query = Pengguna::query()->orderByDesc('created_at');
            $this->applyFilters($query, $request);
            $pagination = $query->paginate($perPage)->appends($request->except('page'));
            $data = $pagination->items();
        }

        return view('pages.admin.laporan-pengguna.index', [
            'data' => $data,
            'pagination' => $pagination,
            'perPage' => $perPage,
            'role' => $role,
        ]);
    }

    public function export_excel(Request $request): BinaryFileResponse
    {
        $role = $request->input('role');
        return Excel::download(new PenggunaExport($role), 'Laporan Pengguna.xlsx');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Pengguna::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);

        $pdfContent = view('pages.admin.laporan-pengguna.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:/home/xriot/.nvm/versions/node/v18.20.4/bin/')
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->save(storage_path('/app/public/laporan/laporan-pengguna.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-pengguna.pdf'));
    }
}
