<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProduksiRequest;
use App\Models\Kebun;
use App\Models\Produksi;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    protected function applyFilters(Builder $query, Request $request)
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
        $lokasi_kebun = Kebun::pluck('lokasi')->all();

        return view('pages.admin.produksi.index', [
            'data' => $produksi->items(),
            'pagination' => $produksi,
            'lokasi_kebun' => $lokasi_kebun,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        $lokasi_kebun = Kebun::select('id', 'lokasi')->where('status', 'Aktif')->get();
        return view('pages.admin.produksi.create', [
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    public function store(ProduksiRequest $request): RedirectResponse
    {
        $tambah_data = Produksi::create($request->validated());
        if ($tambah_data) {
            return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil ditambahkan');
        }

        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil ditambahkan');
    }

    public function edit(int $id): View
    {
        $produksi = Produksi::with('kebun')->findOrFail($id);
        $lokasi_kebun = Kebun::select('id', 'lokasi')->where('status', 'Aktif')->get();
        return view('pages.admin.produksi.edit', [
            'data' => $produksi,
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    public function update(ProduksiRequest $request, int $id): RedirectResponse
    {
        $update_data = Produksi::findOrFail($id);
        if ($update_data->update($request->validated())) {
            return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil diperbarui');
        }

        return redirect()->route('admin.produksi.index')->with('error', 'Produksi gagal diperbarui');
    }

    public function destroy(int $id): RedirectResponse
    {
        $produksi = Produksi::findOrFail($id);
        $hapus_data = $produksi->delete();
        if ($hapus_data) {
            return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil dihapus');
        }

        return redirect()->route('admin.produksi.index')->with('error', 'Produksi gagal dihapus');
    }
}
