<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KebunRequest;
use App\Models\Kebun;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KebunController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
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
        return view('pages.admin.kebun.index', [
            'data' => $kebun->items(),
            'pagination' => $kebun,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        return view('pages.admin.kebun.create');
    }

    public function store(KebunRequest $request): RedirectResponse
    {
        $tambah_data = Kebun::create($request->validated());
        if ($tambah_data) {
            return redirect()->route('admin.kebun.index')->with('success', 'Kebun berhasil ditambahkan');
        }

        return redirect()->route('admin.kebun.index')->with('error', 'Kebun gagal ditambahkan');
    }

    public function edit(int $id): View
    {
        $kebun = Kebun::findOrFail($id);
        return view('pages.admin.kebun.edit', [
            'data' => $kebun,
        ]);
    }

    public function update(KebunRequest $request, $id): RedirectResponse
    {
        $kebun = Kebun::findOrFail($id);
        $update_data = $kebun->update($request->validated());
        if ($update_data) {
            return redirect()->route('admin.kebun.index')->with('success', 'Kebun berhasil diperbarui');
        }

        return redirect()->route('admin.kebun.index')->with('error', 'Kebun gagal diperbarui');
    }

    public function destroy(int $id): RedirectResponse
    {
        $kebun = Kebun::findOrFail($id);
        $hapus_data = $kebun->delete();
        if ($hapus_data) {
            return redirect()->route('admin.kebun.index')->with('error', 'Kebun gagal dihapus');
        }

        return redirect()->route('admin.kebun.index')->with('success', 'Kebun berhasil dihapus');
    }
}
