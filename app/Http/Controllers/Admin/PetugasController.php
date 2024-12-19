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

    public function create(): View
    {
        $pengguna = Pengguna::whereDoesntHave('petugas')->where('role', 'Petugas Kebun')->get();
        return view('pages.admin.petugas.create', [
            'pengguna' => $pengguna,
        ]);
    }

    public function store(PetugasRequest $request): RedirectResponse
    {
        $petugas = Petugas::create($request->validated());
        if ($petugas) {
            return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan');
        }

        return redirect()->route('admin.petugas.index')->with('error', 'Petugas gagal ditambahkan');
    }

    public function edit(int $id): View
    {
        $petugas = Petugas::with('pengguna')->findOrFail($id);
        $pengguna = Pengguna::all();

        return view('pages.admin.petugas.edit', [
            'data' => $petugas,
            'pengguna' => $pengguna,
        ]);
    }

    public function update(PetugasRequest $request, int $id): RedirectResponse
    {
        $petugas = Petugas::findOrFail($id);
        if ($petugas->update($request->validated())) {
            return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil diperbarui');
        }

        return redirect()->route('admin.petugas.index')->with('error', 'Petugas gagal diperbarui');
    }

    public function destroy(int $id): RedirectResponse
    {
        $petugas = Petugas::findOrFail($id);
        if ($petugas->delete()) {
            return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus');
        }

        return redirect()->route('admin.petugas.index')->with('error', 'Petugas gagal dihapus');
    }
}
