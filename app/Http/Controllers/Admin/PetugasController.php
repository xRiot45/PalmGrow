<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasRequest;
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
     * Fungsi untuk fitur filter
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
     * Fungsi untuk menampilkan halaman kebun yang disertai dengan fitur filter dan pagination
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Petugas::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, $request);

        $petugas = $query->paginate($perPage)->appends($request->except('page'));

        return view('pages.admin.petugas.index', [
            'data' => $petugas->items(),
            'pagination' => $petugas,
            'perPage' => $perPage,
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
     * Fungsi untuk menambahkan data petugas
     * @param \App\Http\Requests\PetugasRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PetugasRequest $request): RedirectResponse
    {
        Petugas::create($request->only(['pengguna_id', 'nama_petugas', 'jabatan', 'tanggal_bergabung']));
        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    /**
     * Fungsi untuk menampilkan halaman edit petugas dan mengirimkan data petugas berdasarkan id beserta data relasi pengguna
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id): View
    {
        $petugas = Petugas::with('pengguna')->findOrFail($id);
        $pengguna = Pengguna::all();

        return view('pages.admin.petugas.edit', [
            'data' => $petugas,
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Fungsi untuk mengupdate data petugas
     * @param \App\Http\Requests\PetugasRequest $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PetugasRequest $request, $id): RedirectResponse
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->only(['pengguna_id', 'nama_petugas', 'jabatan', 'tanggal_bergabung']));
        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil diperbarui');
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
