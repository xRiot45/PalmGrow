<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistribusiRequest;
use App\Models\Distribusi;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistribusiController extends Controller
{
    protected function applyFilters(Builder $query, Request $request)
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

        return view('pages.admin.distribusi.index', [
            'data' => $distribusi->items(),
            'pagination' => $distribusi,
            'lokasi_kebun' => $lokasiKebun,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        $lokasi_kebun = Produksi::join('kebun', 'kebun.id', '=', 'produksi.kebun_id')->select('produksi.id as produksi_id', 'kebun.lokasi')->distinct()->get();
        return view('pages.admin.distribusi.create', [
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    public function store(DistribusiRequest $request): RedirectResponse
    {
        $produksi = Produksi::findOrFail($request->produksi_id);
        $totalTandan = $produksi->jumlah_tandan;

        if ($request->jumlah > $totalTandan) {
            return redirect()->route('admin.distribusi.create')->with('error', 'Jumlah distribusi tidak boleh melebihi jumlah tandan');
        }

        $produksi->decrement('jumlah_tandan', $request->jumlah);
        $produksi->save();

        $tambah_data = Distribusi::create($request->validated());
        if ($tambah_data) {
            return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil ditambahkan');
        }

        return redirect()->route('admin.distribusi.index')->with('error', 'Distribusi gagal ditambahkan');
    }

    public function edit(int $id): View
    {
        $distribusi = Distribusi::with('produksi.kebun')->findOrFail($id);
        $lokasi_kebun = Produksi::join('kebun', 'kebun.id', '=', 'produksi.kebun_id')->select('produksi.id as produksi_id', 'kebun.lokasi')->distinct()->get();
        return view('pages.admin.distribusi.edit', [
            'data' => $distribusi,
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    public function update(DistribusiRequest $request, int $id): RedirectResponse
    {
        $distribusi = Distribusi::findOrFail($id);
        $produksi = Produksi::findOrFail($request->produksi_id);
        $jumlahTandan = $produksi->jumlah_tandan;
        $jumlahSebelumnya = $distribusi->jumlah;

        if ($request->jumlah > $jumlahTandan) {
            return back()->with('error', 'Jumlah distribusi tidak boleh melebihi jumlah tandan');
        } elseif ($request->jumlah < $jumlahSebelumnya) {
            return back()->with('error', 'Jumlah distribusi tidak boleh kurang dari jumlah sebelumnya');
        }

        $produksi->decrement('jumlah_tandan', $request->jumlah - $jumlahSebelumnya);
        $produksi->save();

        $update_data = $distribusi->update($request->validated());
        if ($update_data) {
            return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil diupdate');
        }

        return redirect()->route('admin.distribusi.index')->with('error', 'Distribusi gagal diupdate');
    }

    public function destroy(int $id): RedirectResponse
    {
        $distribusi = Distribusi::find($id);
        $hapus_data = $distribusi->delete();
        if ($hapus_data) {
            return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil dihapus');
        }

        return redirect()->route('admin.distribusi.index')->with('error', 'Distribusi gagal dihapus');
    }
}
