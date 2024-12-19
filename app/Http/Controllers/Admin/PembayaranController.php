<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Produksi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    /**
     * Fungsi untuk mengaplikasikan filter pada daftar data pembayaran
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function applyFilters(Builder $query, Request $request)
    {
        $filters = $request->only(['lokasi_produksi_kebun', 'jumlah_pembayaran_mulai', 'jumlah_pembayaran_selesai', 'metode_pembayaran', 'tanggal_pembayaran_mulai', 'tanggal_pembayaran_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'lokasi_produksi_kebun' => $query->whereHas('produksi', function ($q) use ($filterValue) {
                        $q->whereHas('kebun', function ($q) use ($filterValue) {
                            $q->where('lokasi', 'like', '%' . $filterValue . '%');
                        });
                    }),
                    'jumlah_pembayaran_mulai' => $query->where('jumlah_pembayaran', '>=', $filterValue),
                    'jumlah_pembayaran_selesai' => $query->where('jumlah_pembayaran', '<=', $filterValue),
                    'metode_pembayaran' => $query->where('metode_pembayaran', 'like', '%' . $filterValue . '%'),
                    'tanggal_pembayaran_mulai' => $query->where('tanggal_pembayaran', '>=', $filterValue),
                    'tanggal_pembayaran_selesai' => $query->where('tanggal_pembayaran', '<=', $filterValue),
                };
            }
        }
    }

    /**
     * Fungsi untuk menampilkan daftar data pembayaran
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $per_page = request()->input('per_page', 10);
        $query = Pembayaran::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, request());

        $pembayaran = $query->paginate($per_page)->withQueryString();
        $lokasi_produksi_kebun = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.pembayaran.index', [
            'data' => $pembayaran->items(),
            'pagination' => $pembayaran,
            'lokasi_produksi_kebun' => $lokasi_produksi_kebun,
        ]);
    }

    /**
     * Fungsi untuk menampilkan form tambah data pembayaran
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $produksi = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.pembayaran.create', [
            'produksi' => $produksi,
        ]);
    }

    /**
     * Fungsi untuk menambahkan data pembayaran
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'produksi_id' => 'required',
                'jumlah_pembayaran' => 'required|integer',
                'tanggal_pembayaran' => 'required',
                'metode_pembayaran' => 'required|string',
                'bukti_pembayaran' => 'required|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'produksi_id.required' => 'Produksi Harus Dipilih',
                'jumlah_pembayaran.required' => 'Jumlah pembayaran harus diisi',
                'jumlah_pembayaran.integer' => 'Jumlah pembayaran harus berupa angka',
                'tanggal_pembayaran.required' => 'Tanggal pembayaran harus diisi',
                'metode_pembayaran.required' => 'Metode pembayaran harus diisi',
                'metode_pembayaran.string' => 'Metode pembayaran harus berupa string',
                'bukti_pembayaran.required' => 'Bukti pembayaran harus diisi',
                'bukti_pembayaran.mimes' => 'Bukti pembayaran harus berupa png, jpg, atau jpeg',
                'bukti_pembayaran.max' => 'Bukti pembayaran tidak boleh lebih dari 2MB',
            ],
        );

        if ($request->hasFile('bukti_pembayaran') && $request->file('bukti_pembayaran')->isValid()) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pembayaran', $filename);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid');
        }

        Pembayaran::create([
            'produksi_id' => $request->produksi_id,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => 'public/pembayaran/' . $filename,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan');
    }

    /**
     * Fungsi untuk menampilkan form edit data pembayaran
     * @param mixed $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $pembayaran = Pembayaran::find($id);
        $produksi = Produksi::select('id', 'kebun_id')->get();
        return view('pages.admin.pembayaran.edit', [
            'data' => $pembayaran,
            'produksi' => $produksi,
        ]);
    }

    /**
     * Fungsi untuk mengupdate data pembayaran
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = Pembayaran::findOrFail($id);
        $request->validate(
            [
                'produksi_id' => 'required',
                'jumlah_pembayaran' => 'required|integer',
                'tanggal_pembayaran' => 'required',
                'metode_pembayaran' => 'required|string',
                'bukti_pembayaran' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'produksi_id.required' => 'Produksi Harus Dipilih',
                'jumlah_pembayaran.required' => 'Jumlah pembayaran harus diisi',
                'jumlah_pembayaran.integer' => 'Jumlah pembayaran harus berupa angka',
                'tanggal_pembayaran.required' => 'Tanggal pembayaran harus diisi',
                'metode_pembayaran.required' => 'Metode pembayaran harus diisi',
                'metode_pembayaran.string' => 'Metode pembayaran harus berupa string',
                'bukti_pembayaran.mimes' => 'Bukti pembayaran harus berupa png, jpg, atau jpeg',
                'bukti_pembayaran.max' => 'Bukti pembayaran tidak boleh lebih dari 2MB',
            ],
        );

        if ($request->hasFile('bukti_pembayaran')) {
            if ($data->bukti_pembayaran && Storage::exists('public/pembayaran/' . basename($data->bukti_pembayaran))) {
                Storage::delete('public/pembayaran/' . basename($data->bukti_pembayaran));
            }

            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $buktiPembayaran = $file->storeAs('public/pembayaran', $filename);

            $data->bukti_pembayaran = $buktiPembayaran;
        }

        $data->update($request->except('bukti_pembayaran'));
        return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil diupdate');
    }

    /**
     * Fungsi untuk menghapus data pembayaran
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            $bukti_pembayaran = $pembayaran->bukti_pembayaran;

            if (Storage::exists($bukti_pembayaran)) {
                Storage::delete($bukti_pembayaran);
            }

            $pembayaran->delete();

            return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran tidak ditemukan');
    }


    /**
     * Fungsi untuk mengunduh file bukti pembayaran
     * @param mixed $id
     * @return mixed|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download_file($id)
    {
        $pembayaran = Pembayaran::find($id);
        $bukti_pembayaran = storage_path('app/' . $pembayaran->bukti_pembayaran);
        return response()->download($bukti_pembayaran);
    }
}
