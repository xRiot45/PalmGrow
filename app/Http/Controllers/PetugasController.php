<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Petugas;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Fungsi untuk menerapkan fitur filter
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['nama_petugas', 'jabatan', 'tanggal_bergabung_mulai', 'tanggal_bergabung_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'nama_petugas' => $query->where('petugas.nama_petugas', 'like', '%' . $filterValue . '%'),
                    'jabatan' => $query->where('petugas.jabatan', 'like', '%' . $filterValue . '%'),
                    'tanggal_bergabung_mulai' => $query->where('petugas.tanggal_bergabung', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_bergabung_selesai' => $query->where('petugas.tanggal_bergabung', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
                };
            }
        }
    }

    /**
     * Fungsi untuk menampilkan halaman petugas
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $per_page = $request->input('per_page', 10);
        $query = Petugas::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, $request);

        $petugas = $query->paginate($per_page)->withQueryString();

        return view('pages.admin.petugas.index', [
            'data' => $petugas->items(),
            'pagination' => $petugas,
        ]);
    }

    /**
     * Fungsi untuk menampilkan halaman tambah petugas dan mengirimkan data pengguna
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        $pengguna = Pengguna::whereDoesntHave('petugas')->where('role', 'Petugas Kebun')->get();
        return view('pages.admin.petugas.create', [
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'pengguna_id' => 'required|unique:petugas,pengguna_id,null,id',
                'nama_petugas' => 'required|string',
                'jabatan' => 'required|string',
                'tanggal_bergabung' => 'required',
            ],
            [
                'pengguna_id.required' => 'Pengguna harus dipilih.',
                'pengguna_id.unique' => 'Pengguna sudah dipilih.',
                'nama_petugas.required' => 'Nama petugas harus diisi.',
                'nama_petugas.string' => 'Nama petugas harus berupa teks.',
                'jabatan.required' => 'Jabatan harus diisi.',
                'jabatan.string' => 'Jabatan harus berupa teks.',
                'tanggal_bergabung.required' => 'Tanggal bergabung harus diisi.',
            ],
        );

        Petugas::create($validate);
        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    /**
     * Fungsi untuk menghapus data petugas
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
