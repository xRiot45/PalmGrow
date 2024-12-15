<?php

namespace App\Http\Controllers;

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
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Fungsi untuk menampilkan halaman tambah distribusi dan mengirimkan data lokasi kebun dari produksi
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $lokasi_kebun = Produksi::join('kebun', 'kebun.id', '=', 'produksi.kebun_id')->select('produksi.id as produksi_id', 'kebun.lokasi')->distinct()->get();
        return view('pages.admin.distribusi.create', [
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Fungsi untuk menambahkan data distribusi
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(
            [
                'produksi_id' => 'required|exists:produksi,id',
                'tujuan' => 'required|string',
                'jumlah' => 'required|integer',
                'tanggal_distribusi' => 'required',
            ],
            [
                'produksi_id.required' => 'Produksi Harus Dipilih',
                'produksi_id.exists' => 'Produksi yang dipilih tidak valid',
                'tujuan.required' => 'Tujuan harus diisi',
                'tujuan.string' => 'Tujuan harus berupa teks',
                'jumlah.required' => 'Jumlah harus diisi',
                'jumlah.integer' => 'Jumlah harus berupa angka',
                'tanggal_distribusi.required' => 'Tanggal distribusi harus diisi',
            ],
        );

        $produksi = Produksi::find($validate['produksi_id']);
        $jumlah_tandan = Produksi::find($validate['produksi_id'])->jumlah_tandan;

        if ($validate['jumlah'] > $jumlah_tandan) {
            return redirect()->route('admin.distribusi.create')->with('error', 'Jumlah distribusi tidak boleh melebihi jumlah tandan');
        }

        $produksi->jumlah_tandan -= $validate['jumlah'];
        $produksi->save();

        Distribusi::create($validate);

        return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil ditambahkan');
    }

    /**
     * Fungsi untuk menampilkan halaman edit distribusi dan mengirimkan data distribusi berdasarkan id serta data lokasi kebun
     * @param mixed $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $distribusi = Distribusi::with('produksi.kebun')->findOrFail($id);
        $lokasi_kebun = Produksi::join('kebun', 'kebun.id', '=', 'produksi.kebun_id')->select('produksi.id as produksi_id', 'kebun.lokasi')->distinct()->get();
        return view('pages.admin.distribusi.edit', [
            'data' => $distribusi,
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Fungsi untuk update data distribusi
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate(
            [
                'produksi_id' => 'required|exists:produksi,id',
                'tujuan' => 'required|string',
                'jumlah' => 'required|integer',
                'tanggal_distribusi' => 'required',
            ],
            [
                'produksi_id.required' => 'Produksi Harus Dipilih',
                'produksi_id.exists' => 'Produksi yang dipilih tidak valid',
                'tujuan.required' => 'Tujuan harus diisi',
                'tujuan.string' => 'Tujuan harus berupa teks',
                'jumlah.required' => 'Jumlah harus diisi',
                'jumlah.integer' => 'Jumlah harus berupa angka',
                'tanggal_distribusi.required' => 'Tanggal distribusi harus diisi',
            ],
        );

        $produksi = Produksi::find($request->produksi_id);
        $jumlah_tandan = Produksi::find($request->produksi_id)->jumlah_tandan;
        $distribusi = Distribusi::findOrFail($id);
        $jumlah_sebelumnya = $distribusi->jumlah;

        if ($request->jumlah > $jumlah_tandan) {
            return redirect()->route('admin.distribusi.edit', $id)->with('error', 'Jumlah distribusi tidak boleh melebihi jumlah tandan');
        } else if ($request->jumlah < $jumlah_sebelumnya) {
            return redirect()->route('admin.distribusi.edit', $id)->with('error', 'Jumlah distribusi tidak boleh kurang dari jumlah sebelumnya');
        }

        $distribusi->update($request->only(['produksi_id', 'tujuan', 'jumlah', 'tanggal_distribusi']));

        $produksi->jumlah_tandan -= ($request->jumlah - $jumlah_sebelumnya);
        $produksi->save();

        return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil diubah');
    }

    /**
     * Fungsi untuk menghapus data distribusi
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $distribusi = Distribusi::find($id);
        $distribusi->delete();
        return redirect()->route('admin.distribusi.index')->with('success', 'Distribusi berhasil dihapus');
    }
}
