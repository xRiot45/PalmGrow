<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Kebun;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistribusiController extends Controller
{

    protected function applyFilters(Builder $query, Request $request)
    {
        $filters = $request->only([
            'tujuan_distribusi',
            'jumlah_distribusi_mulai',
            'jumlah_distribusi_selesai',
            'tanggal_distribusi_mulai',
            'tanggal_distribusi_selesai',
            'lokasi_kebun',
        ]);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'tujuan_distribusi' => $query->where('tujuan_distribusi', 'like', '%' . $filterValue . '%'),
                    'jumlah_distribusi_mulai' => $query->where('jumlah_distribusi', '>=', $filterValue),
                    'jumlah_distribusi_selesai' => $query->where('jumlah_distribusi', '<=', $filterValue),
                    'tanggal_distribusi_mulai' => $query->where('tanggal_distribusi', '>=', $filterValue),
                    'tanggal_distribusi_selesai' => $query->where('tanggal_distribusi', '<=', $filterValue),
                    'lokasi_kebun' => $query->whereHas('produksi.kebun', function ($q) use ($filterValue) {
                        $q->where('lokasi', 'like', '%' . $filterValue . '%');
                    }),
                };
            }
        }
    }


    /**
     * Fungsi untuk menampilkan halaman distribusi, menerapkan fitur filter, menerapkan fitur pagination dan mengirimkan data lokasi kebun berdasarkan id kebun
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $per_page = request()->input('per_page', 10);
        $query = Distribusi::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, request());

        $distribusi = $query->paginate($per_page)->withQueryString();
        $lokasi_kebun = Produksi::join('kebun', 'kebun.id', '=', 'produksi.kebun_id')->select('kebun.id', 'kebun.lokasi')->distinct()->get();
        return view('pages.admin.distribusi.index', [
            'data' => $distribusi->items(),
            'pagination' => $distribusi,
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
    public function show(Distribusi $distribusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribusi $distribusi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribusi $distribusi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $distribusi = Distribusi::find($id);
        $distribusi->delete();
        return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil dihapus');
    }
}
