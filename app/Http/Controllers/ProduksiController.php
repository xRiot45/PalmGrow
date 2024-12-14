<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\Produksi;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    /**
     * Fungsi untuk menerapkan fitur filter
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function applyFilters(Builder $query, Request $request)
    {
        $filters = $request->only([
            'lokasi_kebun',
            'luas_kebun_mulai',
            'luas_kebun_selesai',
            'jumlah_tandan_mulai',
            'jumlah_tandan_selesai',
            'berat_total_mulai',
            'berat_total_selesai',
            'tanggal_panen_mulai',
            'tanggal_panen_selesai'
        ]);

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
                    'tanggal_panen_mulai' => $query->where('tanggal_panen', '>=', $filterValue),
                    'tanggal_panen_selesai' => $query->where('tanggal_panen', '<=', $filterValue),
                };
            }
        }
    }

    /**
     * Fungsi untuk menampilkan halaman produksi, menerapkan fitur filter, menerapkan fitur pagination dan mengirimkan data lokasi kebun berdasarkan id kebun
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $per_page = request()->input('per_page', 10);
        $query = Produksi::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, request());

        $produksi = $query->paginate($per_page)->withQueryString();
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();

        return view('pages.admin.produksi.index', [
            'data' => $produksi->items(),
            'pagination' => $produksi,
            'lokasi_kebun' => $lokasi_kebun
        ]);
    }

    /**
     * Fungsi untuk menampilkan halaman tambah produksi & mengirimkan data lokasi kebun
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        $lokasi_kebun = Kebun::select('id', 'lokasi')->where('status', 'Aktif')->get();
        return view('pages.admin.produksi.create', [
            'lokasi_kebun' => $lokasi_kebun
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'kebun_id' => 'required',
            'jumlah_tandan' => 'required|integer',
            'berat_total' => 'required|integer',
            'tanggal_panen' => 'required'
        ], [
            'kebun_id.required' => 'Kebun Harus Dipilih',
            'jumlah_tandan.required' => 'Jumlah tandan harus diisi',
            'jumlah_tandan.integer' => 'Jumlah tandan harus berupa angka',
            'berat_total.required' => 'Berat total harus diisi',
            'berat_total.integer' => 'Berat total harus berupa angka',
            'tanggal_panen.required' => 'Tanggal panen harus diisi'
        ]);

        Produksi::create($validate);
        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil ditambahkan');
    }


    /**
     * Fungsi untuk menampilkan halaman edit produksi & mengirimkan data lokasi kebun dan data produksi berdasarkan id
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id): View
    {
        $produksi = Produksi::with('kebun')->findOrFail($id);
        $lokasi_kebun = Kebun::select('id', 'lokasi')->where('status', 'Aktif')->get();
        return view('pages.admin.produksi.edit', [
            'data' => $produksi,
            'lokasi_kebun' => $lokasi_kebun
        ]);
    }

    /**
     * Fungsi untuk mengupdate data produksi
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kebun_id' => 'required',
            'jumlah_tandan' => 'required|integer',
            'berat_total' => 'required|integer',
            'tanggal_panen' => 'required'
        ], [
            'kebun_id.required' => 'Kebun Harus Dipilih',
            'jumlah_tandan.required' => 'Jumlah tandan harus diisi',
            'jumlah_tandan.integer' => 'Jumlah tandan harus berupa angka',
            'berat_total.required' => 'Berat total harus diisi',
            'berat_total.integer' => 'Berat total harus berupa angka',
            'tanggal_panen.required' => 'Tanggal panen harus diisi'
        ]);

        $produksi = Produksi::findOrFail($id);
        $produksi->update($request->only([
            'kebun_id',
            'jumlah_tandan',
            'berat_total',
            'tanggal_panen'
        ]));
        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil diperbarui');
    }

    /**
     * Fungsi untuk menghapus data produksi
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();
        return redirect()->route('admin.produksi.index')->with('success', 'Produksi berhasil dihapus');
    }
}
