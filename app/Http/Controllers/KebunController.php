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
     * FUngsi untuk menampilkan halaman kebun yang disertai dengan fitur pencarian dan pagination
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request): View
    {
        $perPage = $request->input('per_page', 100);

        $query = Kebun::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $kebun = $query->paginate($perPage);

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
        $validated = $request->validate([
            'lokasi' => 'required|string',
            'luas' => 'required|integer',
            'status' => ['required', Rule::in(array_column(StatusKebun::cases(), 'value'))],
            'tanggal_tanam' => 'nullable',
            'tanggal_panen' => 'nullable',
        ]);

        $kebun = Kebun::create($validated);
        $kebun->save();

        return redirect()->route('admin.kebun.index')->with('success', 'Berhasil menambahkan kebun');
    }

    /**
     * Fungsi untuk menampilkan halaman edit dan mengirimkan data kebun berdasrkan id ke halaman edit nya
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id): View
    {
        $kebun = Kebun::findOrFail($id);
        return view('pages.admin.kebun.edit', [
            'data' => $kebun,
        ]);
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
