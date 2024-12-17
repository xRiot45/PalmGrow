<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Produksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.admin.pembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
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
        $validate = $request->validate(
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
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
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
            $metode_pembayaran = $pembayaran->metode_pembayaran;

            if (Storage::exists($metode_pembayaran)) {
                Storage::delete($metode_pembayaran);
            }

            $pembayaran->delete();

            return redirect()->route('admin.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus');
        }

        return redirect()->route('admin.pembayaran.index')->with('error', 'Pembayaran tidak ditemukan');
    }
}
