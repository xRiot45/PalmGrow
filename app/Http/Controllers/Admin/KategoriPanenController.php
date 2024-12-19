<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriPanen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $per_page = $request->input('per_page', 10);
        $query = KategoriPanen::query()->orderBy('created_at', 'desc');

        $search_nama_kategori = $request->input('nama_kategori');
        if ($search_nama_kategori) {
            $query->where('nama_kategori', 'like', '%' . $search_nama_kategori . '%');
        }

        $kategori_panen = $query->paginate($per_page)->withQueryString();
        return view('pages.admin.kategori-panen.index', [
            'data' => $kategori_panen->items(),
            'pagination' => $kategori_panen,
            'search_nama_kategori' => $search_nama_kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.admin.kategori-panen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate(
            [
                'nama_kategori' => 'required|max:100',
                'deskripsi' => 'required',
            ],
            [
                'nama_kategori.required' => 'Nama kategori harus diisi',
                'nama_kategori.max' => 'Maksimal 100 karakter',
                'deskripsi.required' => 'Deskripsi harus diisi',
            ],
        );

        KategoriPanen::create($validate);
        return redirect()->route('admin.kategori-panen.index')->with('success', 'Kategori panen berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori_panen = KategoriPanen::findOrFail($id);
        return view('pages.admin.kategori-panen.edit', [
            'data' => $kategori_panen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kategori' => 'required|max:100',
            'deskripsi' => 'required',
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi',
            'nama_kategori.max' => 'Maksimal 100 karakter',
            'deskripsi.required' => 'Deskripsi harus diisi',
        ]);

        $kategori_panen = KategoriPanen::findOrFail($id);
        $kategori_panen->update($validate);
        return redirect()->route('admin.kategori-panen.index')->with('success', 'Kategori panen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $kategori_panen = KategoriPanen::findOrFail($id);
        $kategori_panen->delete();
        return redirect()->route('admin.kategori-panen.index')->with('success', 'Kategori panen berhasil dihapus');
    }
}
