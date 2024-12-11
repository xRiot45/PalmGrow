<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterController extends Controller
{

    public function create(): View
    {
        return view('pages.auth.register');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Pengguna::class],
            'password' => ['required', Rules\Password::defaults()], // Hapus confirmed jika tidak ingin konfirmasi password
            'role' => ['required', 'string', 'in:Admin,Petugas Kebun,Manajer'],
        ]);

        $user = Pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        // Fungsi untuk login otomatis ketika pendaftaran berhasil
        // Auth::login($user);

        return redirect(route('login', absolute: false));
    }
}
