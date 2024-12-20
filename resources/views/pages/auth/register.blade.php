@extends('layouts.auth/app', ['title' => 'Register'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <div class="d-flex flex-column h-100 p-3">
    <div class="d-flex flex-column flex-grow-1">
      <div class="row h-100">
        {{-- Left Side Start --}}
        <div class="col-xxl-7">
          <div class="row justify-content-center h-100">
            <div class="col-lg-6 py-lg-5">
              <div class="d-flex flex-column h-100 justify-content-center">

                <div class="auth-logo mb-4">
                  <a class="logo-dark" href="{{ route('index') }}">
                    <img src="/images/logo-dark.png" height="100" alt="logo dark">
                  </a>

                  <a class="logo-light" href="{{ route('index') }}">
                    <img src="/images/logo-light.png" height="100" alt="logo light">
                  </a>
                </div>

                <h2 class="fw-bold fs-24">Daftar</h2>

                <p class="text-muted mt-1 mb-4">
                  Baru di platform kami? Daftar sekarang! Hanya butuh satu menit
                </p>

                <div class="mb-4">
                  <form class="authentication-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name Start --}}
                    <div class="mb-3">
                      <label class="form-label" for="name">Nama</label>
                      <input type="text" id="name" name="name" class="form-control"
                        placeholder="Masukkan nama anda" value="{{ old('name') }}">
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Name End --}}

                    {{-- Email Start --}}
                    <div class="mb-3">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control"
                        placeholder="Masukkan email anda" value="{{ old('email') }}">
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Email End --}}

                    {{-- Password Start --}}
                    <div class="mb-3">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control"
                        placeholder="Masukkan password anda">
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Password End --}}

                    {{-- Role Start --}}
                    <div class="mb-3">
                      <label class="form-label" for="role">Role</label>
                      <select name="role" id="role" class="form-control"
                        aria-label="Pilih Role" data-choices data-choices-search-false
                        data-choices-removeItem>
                        <option value="">-- Pilih Role --</option>
                        <option value="Petugas Kebun"
                          {{ old('role') == 'Petugas Kebun' ? 'selected' : '' }}>
                          Petugas Kebun
                        </option>
                        <option value="Manajer" {{ old('role') == 'Manajer' ? 'selected' : '' }}>
                          Manajer
                        </option>
                      </select>
                      @error('role')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Role End --}}


                    <div class="mb-1 text-center d-grid">
                      <button class="btn btn-soft-primary" type="submit">Daftar</button>
                    </div>
                  </form>
                </div>

                <p class="text-danger text-center">
                  Sudah Punya Akun?
                  <a href="{{ route('login') }}" class="text-dark fw-bold ms-1">Login Sekarang</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        {{-- Left Side End --}}

        {{-- Right Side Start --}}
        <div class="col-xxl-5 d-none d-xxl-flex">
          <div class="card h-100 mb-0 overflow-hidden">
            <div class="d-flex flex-column h-100">
              <img src="/images/background.jpg" alt="" class="w-100 h-100"
                style="object-fit: cover;">
            </div>
          </div>
        </div>
        {{-- Right Side End --}}
      </div>
    </div>
  </div>
@endsection
