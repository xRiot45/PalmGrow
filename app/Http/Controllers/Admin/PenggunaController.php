<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaRequest;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PenggunaController extends Controller
{
    private function applyFilters(Builder $query, Request $request): void
    {
        $filters = $request->only(['name', 'email', 'role']);
        foreach ($filters as $filterName => $filterValue) {
            if (!empty($filterValue)) {
                match ($filterName) {
                    'name' => $query->where('name', 'like', '%' . $filterValue . '%'),
                    'email' => $query->where('email', 'like', '%' . $filterValue . '%'),
                    'role' => $query->where('role', 'like', '%' . $filterValue . '%'),
                };
            }
        }
    }

    public function index(Request $request): View
    {
        $perPage = $request->input('perPage', 10);
        $query = Pengguna::query()->orderBy('created_at', 'desc');

        $this->applyFilters($query, $request);

        $pengguna = $query->paginate($perPage)->appends($request->except('page'));
        return view('pages.admin.pengguna.index', [
            'data' => $pengguna->items(),
            'pagination' => $pengguna,
            'perPage' => $perPage,
        ]);
    }

    public function create(): View
    {
        return view('pages.admin.pengguna.create');
    }

    public function store(PenggunaRequest $request): RedirectResponse
    {
        $existingUser = Pengguna::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        }

        $pengguna = Pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'role' => $request->role,
        ]);

        if ($pengguna) {
            return redirect()->route('admin.pengguna.index')->with('success', 'Berhasil menambahkan pengguna');
        }

        return redirect()->route('admin.pengguna.index')->with('error', 'Gagal menambahkan pengguna');
    }

    public function edit(int $id): View
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pages.admin.pengguna.edit', [
            'data' => $pengguna,
        ]);
    }

    public function update(PenggunaRequest $request, int $id): RedirectResponse
    {
        $pengguna = Pengguna::findOrFail($id);
        if ($request->email !== $pengguna->email && Pengguna::whereEmail($request->email)->exists()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        }

        if ($pengguna->update($request->validated())) {
            return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil diupdate');
        }

        return redirect()->route('admin.pengguna.index')->with('error', 'Pengguna gagal diupdate');
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = Pengguna::findOrFail($id);
        if ($user->role->value === 'Admin') {
            return redirect()->route('admin.pengguna.index')->with('error', 'Tidak dapat menghapus akun admin');
        }

        if ($user->delete()) {
            return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus');
        }

        return redirect()->route('admin.pengguna.index')->with('error', 'Pengguna gagal dihapus');
    }
}
