@extends('layouts.admin/app', ['title' => 'Bukti Laporan'])

@section('content')
  <div>
    <a href="{{ route('admin.laporan.index') }}" class="btn btn-md btn-primary mb-4">
      Kembali Ke Halaman Sebelumnya
    </a>
    <embed src="{{ asset($pdfPath) }}" type="application/pdf" width="100%" height="800px">

    <p>{{ asset($pdfPath) }}</p>
  </div>
@endsection
