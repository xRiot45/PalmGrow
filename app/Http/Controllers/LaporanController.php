<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\Laporan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.laporan.index');
    }

    /**
     * Fungsi untuk menampilkan form tambah laporan dan mengirimkan data lokasi kebun
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $lokasi_kebun = Kebun::select('id', 'lokasi')->get();
        return view('pages.admin.laporan.create', [
            'lokasi_kebun' => $lokasi_kebun,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'kebun_id' => 'required',
                'file_path' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
                'tanggal_laporan' => 'required',
            ],
            [
                'kebun_id.required' => 'Kebun Harus Dipilih',
                'file_path.required' => 'File harus diisi',
                'file_path.mimes' => 'File harus berupa png, jpg, jpeg, atau pdf',
                'file_path.max' => 'File tidak boleh lebih dari 2MB',
                'tanggal_laporan.required' => 'Tanggal laporan harus diisi',
            ],
        );

        if ($request->hasFile('file_path') && $request->file('file_path')->isValid()) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/laporan', $filename);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid');
        }


        Laporan::create([
            'kebun_id' => $request->kebun_id,
            'file_type' => $filename,
            'file_path' => 'public/laporan/' . $filename,
            'tanggal_laporan' => $request->tanggal_laporan,
        ]);

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
