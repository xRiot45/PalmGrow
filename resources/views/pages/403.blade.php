@extends('layouts.auth', ['title' => 'Forbidden'])

@section('content')
  <div class="d-flex flex-column h-100 p-3">
    <div class="d-flex flex-column flex-grow-1">
      <div class="row align-items-center justify-content-center h-100">
        <div>
          {{-- <div class="auth-logo mb-3 text-center">
                <img src="/images/logo-dark.png" height="24" alt="logo dark">

                <img src="/images/logo-light.png" height="24" alt="logo light">
              </div> --}}
          <div class="mx-auto text-center">
            <img src="/images/forbidden.png" alt="Img Forbidden" class="img-fluid" height="700"
              width="700">
          </div>
          <h2 class="fw-bold text-center lh-base">Anda tidak memiliki hak akses</h2>
          <p class="text-muted text-center mt-1 mb-4">
            Anda tidak memiliki hak akses untuk mengakses halaman ini, <br> silahkan kembali ke
            halaman
            sebelumnya
          </p>

          <div class="text-center">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali ke Halaman
              Sebelumnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
