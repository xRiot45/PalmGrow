@extends('layouts.app', ['title' => 'Beranda'])

@section('content')
  <div class="position-relative"
    style="background-image: url('/images/background.jpg'); background-size: cover; background-position: center; height: 100vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-75"></div>
    <div
      class="position-relative text-center text-white d-flex align-items-center justify-content-center"
      style="height: 100vh;">
      <div class="container-fluid">
        <a class="logo-light" href="{{ route('index') }}">
          <img src="/images/logo-light.png" height="80" alt="logo light">
        </a>
        <h1 class="fw-bold text-white display-4 display-md-3 display-lg-2 mt-3">Selamat Datang di
          PalmGrow
        </h1>
        <p class="lead">Sistem Informasi Manajemen Perkebunan Kelapa Sawit</p>
        <div class="d-flex gap-2 justify-content-center flex-column flex-md-row mt-3">
          <a href="{{ route('login') }}"
            class="btn btn-primary mb-2 mb-md-0 w-md-auto align-items-center d-flex gap-1 justify-content-center">
            <iconify-icon icon="material-symbols:login" class="button-sm-hover-icon"></iconify-icon>
            Login Sekarang
          </a>
          <a href="{{ route('register') }}"
            class="btn btn-outline-primary  w-md-auto align-items-center d-flex gap-1 justify-content-center">
            <iconify-icon icon="mdi:register" class="button-sm-hover-icon"></iconify-icon>
            Daftar Sekarang
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
