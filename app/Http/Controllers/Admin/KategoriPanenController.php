<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriPanenRequest;
use App\Models\KategoriPanen;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriPanenController extends Controller
{

    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['nama_kategori']);
        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'nama_kategori' => $query->where('nama_kategori', 'like', '%' . $filterValue . '%'),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = KategoriPanen::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $kategori_panen = $query->paginate($perPage)->appends($request->except('page'));
        return view('pages.admin.kategori-panen.index', [
            'data' => $kategori_panen->items(),
            'pagination' => $kategori_panen,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        return view('pages.admin.kategori-panen.create');
    }

    public function store(KategoriPanenRequest $request): RedirectResponse
    {
        $tambah_data = KategoriPanen::create($request->validated());
        if ($tambah_data) {
            return redirect()->route(route: 'admin.kategori-panen.index')->with('success', 'Kategori panen berhasil ditambahkan');
        }

        return redirect()->route(route: 'admin.kategori-panen.index')->with('error', 'Kategori panen gagal ditambahkan');
    }

    public function edit(int $id): View
    {
        $kategori_panen = KategoriPanen::findOrFail($id);
        return view('pages.admin.kategori-panen.edit', [
            'data' => $kategori_panen,
        ]);
    }

    public function update(KategoriPanenRequest $request, int $id): RedirectResponse
    {
        $kategori_panen = KategoriPanen::findOrFail($id);
        $update_data = $kategori_panen->update($request->validated());
        if ($update_data) {
            return redirect()->route('admin.kategori-panen.index')->with('success', 'Kategori panen berhasil diperbarui');
        }

        return redirect()->route('admin.kategori-panen.index')->with('error', 'Kategori panen gagal diperbarui');
    }

    public function destroy(int $id): RedirectResponse
    {
        $kategori_panen = KategoriPanen::findOrFail($id);
        $hapus_data = $kategori_panen->delete();
        if ($hapus_data) {
            return redirect()->route('admin.kategori-panen.index')->with('success', 'Kategori panen berhasil dihapus');
        }

        return redirect()->route('admin.kategori-panen.index')->with('error', 'Kategori panen gagal dihapus');
    }
}
