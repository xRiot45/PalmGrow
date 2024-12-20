<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.login');
    }


    public function store(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $pengguna = Auth::user();
            switch ($pengguna->role->value) {

                case 'Admin':
                    return redirect()->route('admin.dashboard.index')->with('success', 'Login Berhasil');
                case 'Petugas Kebun':
                    return redirect()->route('petugas.dashboard.index')->with('success', 'Login Berhasil');
                case 'Manajer':
                    return redirect()->route('manajer.index')->with('success', 'Login Berhasil');
                default:
                    break;
            }
        } else {
            RateLimiter::hit($this->throttleKey($request));
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }

        RateLimiter::clear($this->throttleKey($request));
        return redirect()->back()->with('error', 'Email atau Password Salah');
    }


    public function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
}
