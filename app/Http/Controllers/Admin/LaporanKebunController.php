<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KebunExport;
use App\Http\Controllers\Controller;
use App\Models\Kebun;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LaporanKebunController extends Controller
{
    private function applyFilters(Builder $query, Request $request)
    {
        $filters = $request->only(['status', 'tanggal_tanam_mulai', 'tanggal_tanam_selesai', 'tanggal_panen_mulai', 'tanggal_panen_selesai']);
        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'status' => $query->where($filterName, '=', $filterValue),
                    'tanggal_tanam_mulai' => $query->where('tanggal_tanam', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_tanam_selesai' => $query->where('tanggal_tanam', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_panen_mulai' => $query->where('tanggal_panen', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_panen_selesai' => $query->where('tanggal_panen', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Kebun::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $kebun = $query->paginate($perPage)->appends($request->except('page'));
        return view('pages.admin.laporan-kebun.index', [
            'data' => $kebun->items(),
            'pagination' => $kebun,
            'perPage' => $perPage,
        ]);
    }

    public function export_csv(Request $request): BinaryFileResponse
    {
        $query = Kebun::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        return Excel::download(new KebunExport($query), 'Laporan Kebun.csv');
    }

    public function export_pdf(Request $request): BinaryFileResponse
    {
        $query = Kebun::query()->orderByDesc('created_at');
        $this->applyFilters($query, $request);
        $pdfContent = view('pages.admin.laporan-kebun.laporan-pdf', [
            'data' => $query->get(),
        ])->render();

        $nodeBinaryPath = env('NODE_BINARY_PATH');

        Browsershot::html($pdfContent)
            ->setIncludePath('$PATH:' . $nodeBinaryPath)
            ->showBackground()
            ->margins(0, 4, 0, 4)
            ->format('A4')
            ->save(storage_path('/app/public/laporan/laporan-kebun.pdf'));

        return response()->file(storage_path('/app/public/laporan/laporan-kebun.pdf'));
    }
}
