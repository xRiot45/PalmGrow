<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Exports\PenggunaExport;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
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
        $role = $request->input('role');
        $data = [];
        $pagination = null;

        if ($role) {
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
}
