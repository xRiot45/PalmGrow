<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\Produksi;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksi $produksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produksi $produksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produksi $produksi)
    {
        //
    }
}
