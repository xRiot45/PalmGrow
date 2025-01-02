@extends('layouts.petugas/app', ['title' => 'Bukti Laporan'])

@section('content')
  <div>
    <a href="{{ route('petugas.laporan.index') }}" class="btn btn-md btn-primary mb-4">
      Kembali Ke Halaman Sebelumnya
    </a>
    <embed src="{{ asset('storage/' . basename($pdfPath)) }}" type="application/pdf" width="100%"
      height="800px">
  </div>
@endsection
