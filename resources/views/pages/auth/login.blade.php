@extends('layouts.auth/app', ['title' => 'Login'])

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

                <h2 class="fw-bold fs-24">Login</h2>

                <p class="text-muted mt-1 mb-4">Masukkan alamat email dan kata sandi Anda untuk
                  mengakses panel anda.</p>

                <div class="mb-4">
                  <form method="POST" action="{{ route('login') }}" class="authentication-form">
                    @csrf

                    {{-- Email Start --}}
                    <div class="mb-3">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control"
                        placeholder="Masukkan alamat email anda">
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Email End --}}

                    {{-- Password Start --}}
                    <div class="mb-3">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control"
                        placeholder="Masukkan kata sandi anda">
                      @error('password')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Password End --}}

                    <div class="mb-1 text-center d-grid">
                      <button class="btn btn-soft-primary" type="submit">Login</button>
                    </div>
                  </form>
                </div>

                <p class="text-danger text-center">
                  Belum Punya Akun?
                  <a href="{{ route('register') }}" class="text-dark fw-bold ms-1">Daftar Sekarang</a>
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
