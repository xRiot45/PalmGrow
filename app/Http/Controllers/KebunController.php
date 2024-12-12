<?php

namespace App\Http\Controllers;

use App\Enums\StatusKebun;
use App\Models\Kebun;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KebunController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['status', 'tanggal_tanam_mulai', 'tanggal_tanam_selesai', 'tanggal_panen_mulai', 'tanggal_panen_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'status' => $query->where($filterName, '=', $filterValue),
                    // Untuk tanggal_tanam_mulai, gunakan kolom 'tanggal_tanam'
                    'tanggal_tanam_mulai' => $query->where('tanggal_tanam', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    // Untuk tanggal_tanam_selesai, gunakan kolom 'tanggal_tanam'
                    'tanggal_tanam_selesai' => $query->where('tanggal_tanam', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
                    // Untuk tanggal_panen_mulai, gunakan kolom 'tanggal_panen'
                    'tanggal_panen_mulai' => $query->where('tanggal_panen', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    // Untuk tanggal_panen_selesai, gunakan kolom 'tanggal_panen'
                    'tanggal_panen_selesai' => $query->where('tanggal_panen', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
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
        $perPage = $request->input('per_page', 10);

        $query = Kebun::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $kebun = $query->paginate($perPage)->withQueryString();

        return view('pages.admin.kebun.index', [
            'data' => $kebun->items(),
            'pagination' => $kebun,
        ]);
    }

    /**
     * Fungsi untuk menampilkan halaman tambah kebun
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('pages.admin.kebun.create');
    }

    /**
     * Fungsi untuk menambahkan data kebun
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'lokasi' => 'required|string',
            'luas' => 'required|integer',
            'status' => ['required', Rule::in(StatusKebun::values())],
            'tanggal_tanam' => 'required',
            'tanggal_panen' => 'required',
        ], [
            'lokasi.required' => 'Lokasi kebun harus diisi.',
            'lokasi.string' => 'Lokasi kebun harus berupa teks.',
            'luas.required' => 'Luas kebun harus diisi.',
            'luas.integer' => 'Luas kebun harus berupa angka.',
            'status.required' => 'Status kebun harus dipilih.',
            'status.in' => 'Status kebun yang dipilih tidak valid.',
            'tanggal_tanam.required' => 'Tanggal tanam harus diisi.',
            'tanggal_panen.required' => 'Tanggal panen harus diisi.',
        ]);

        Kebun::create($request->only([
            'lokasi',
            'luas',
            'status',
            'tanggal_tanam',
            'tanggal_panen',
        ]));

        return redirect()->route('admin.kebun.index')->with('success', 'Kebun berhasil ditambahkan');
    }

    /**
     * Fungsi untuk menampilkan halaman edit dan mengirimkan data kebun berdasrkan id ke halaman edit nya
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id): View
    {
        $kebun = Kebun::findOrFail($id);
        // dd($kebun);

        return view('pages.admin.kebun.edit', [
            'data' => $kebun,
        ]);
    }

    /**
     * SFungsi untuk mengupdate data kebun
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'lokasi' => 'required|string',
            'luas' => 'required|integer',
            'status' => ['required', Rule::in(StatusKebun::values())],
            'tanggal_tanam' => 'required',
            'tanggal_panen' => 'required',
        ], [
            'lokasi.required' => 'Lokasi kebun harus diisi.',
            'lokasi.string' => 'Lokasi kebun harus berupa teks.',
            'luas.required' => 'Luas kebun harus diisi.',
            'luas.integer' => 'Luas kebun harus berupa angka.',
            'status.required' => 'Status kebun harus dipilih.',
            'status.in' => 'Status kebun yang dipilih tidak valid.',
            'tanggal_tanam.required' => 'Tanggal tanam harus diisi.',
            'tanggal_panen.required' => 'Tanggal panen harus diisi.',
        ]);

        $kebun = Kebun::findOrFail($id);
        $kebun->update($request->only([
            'lokasi',
            'luas',
            'status',
            'tanggal_tanam',
            'tanggal_panen',
        ]));

        return redirect()->route('admin.kebun.index')->with('success', 'Kebun berhasil diupdate');
    }

    /**
     * Fungsi untuk menghapus data kebun berdasarkan id nya
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->delete();
        return redirect()->route('admin.kebun.index')->with('success', 'Kebun berhasil dihapus');
    }
}
