<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KebunRequest;
use App\Models\Kebun;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KebunController extends Controller
{
    /**
     * Fungsi untuk menerapkan filter pada query
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function applyFilters(Builder $query, Request $request): void
    {
        // Mengambil hanya parameter filter yang relevan
        $filters = $request->only(['status', 'tanggal_tanam_mulai', 'tanggal_tanam_selesai', 'tanggal_panen_mulai', 'tanggal_panen_selesai']);

        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'status' => $query->where($filterName, '=', $filterValue),
                    'tanggal_tanam_mulai' => $query->where('tanggal_tanam', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_tanam_selesai' => $query->where('tanggal_tanam', '<=', Carbon::parse($filterValue)->format('Y-m-d')),
                    'tanggal_panen_mulai' => $query->where('tanggal_panen', '>=', Carbon::parse($filterValue)->format('Y-m-d')),
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
        $perPage = $request->input('perPage', 10);
        $query = Kebun::query()->orderByDesc('created_at');

        $this->applyFilters($query, $request);

        $kebun = $query->paginate($perPage)->appends($request->except('page'));
        return view('pages.admin.kebun.index', [
            'data' => $kebun->items(),
            'pagination' => $kebun,
            'perPage' => $perPage,
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
     * @param \App\Http\Requests\KebunRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(KebunRequest $request): RedirectResponse
    {
        Kebun::create($request->only(['lokasi', 'luas', 'status', 'tanggal_tanam', 'tanggal_panen']));
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
        return view('pages.admin.kebun.edit', [
            'data' => $kebun,
        ]);
    }

    /**
     * Fungsi untuk mengupdate data kebun
     * @param \App\Http\Requests\KebunRequest $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(KebunRequest $request, $id): RedirectResponse
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->update($request->only(['lokasi', 'luas', 'status', 'tanggal_tanam', 'tanggal_panen']));

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
