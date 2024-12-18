<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Pengguna;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    /**
     * Fungsi untuk menampilkan semua pengguna yang terdaftar & fitur pencarian berdasarkan nama, email dan juga role
     */
    public function index(Request $request)
    {
        $per_page = $request->input('per_page', 10);
        $name_search = $request->input('name');
        $email_search = $request->input('email');
        $role_search = $request->input('role');

        $query = Pengguna::query()->orderBy('created_at', 'desc');

        if ($name_search || $email_search || $role_search) {
            $query->where(function ($query) use ($name_search, $email_search, $role_search) {
                if ($name_search) {
                    $query->where('name', 'LIKE', '%' . $name_search . '%');
                }
                if ($email_search) {
                    $query->where('email', 'LIKE', '%' . $email_search . '%');
                }
                if ($role_search) {
                    $query->where('role', 'LIKE', '%' . $role_search . '%');
                }
            });
        }

        $pengguna = $query->paginate($per_page);

        return view('pages.admin.pengguna.index', [
            'data' => $pengguna->items(),
            'pagination' => $pengguna,
        ]);
    }

    /**
     * Fungsi untuk menampilkan halaman form tambah pengguna
     */
    public function create()
    {
        return view('pages.admin.pengguna.create');
    }

    /**
     * Fungsi untuk menyimpan data pengguna
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:3|max:255',
            'role' => ['required', Rule::in(array_column(Role::cases(), 'value'))],
        ]);

        $emailAlreadyExist = Pengguna::where('email', $validated['email'])->first();
        if ($emailAlreadyExist) {
            return redirect()->back()->with('error', 'Email sudah digunakan');
        }

        $pengguna = Pengguna::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('password123'),
            'role' => $validated['role'],
        ]);

        $pengguna->save();

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Fungsi untuk menampilkan halaman form edit data pengguna
     */
    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pages.admin.pengguna.edit', [
            'data' => $pengguna,
        ]);
    }

    /**
     * Fungsi untuk mengupdate data pengguna
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'role' => ['required', Rule::in(array_column(Role::cases(), 'value'))],
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ]);

        return redirect(route('admin.pengguna.index'))->with('success', 'Pengguna berhasil diupdate');
    }

    /**
     * Fungsi untuk menghapus data pengguna
     */
    public function destroy($id): RedirectResponse
    {
        $pengguna = Pengguna::findOrFail($id);
        if ($pengguna->role->value === 'Admin') {
            return redirect()->route('admin.pengguna.index')->with('error', 'Tidak dapat menghapus akun admin');
        }

        $pengguna->delete();
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
