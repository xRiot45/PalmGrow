@extends('layouts.admin/app', ['title' => 'Bukti Laporan Kebun'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <div>
    <a href="{{ route('admin.laporan-kebun.index') }}" class="btn btn-md btn-primary mb-4">
      Kembali Ke Halaman Sebelumnya
    </a>
    <embed src="{{ asset('storage/laporan-kebun/' . basename($pdfPath)) }}" type="application/pdf"
      width="100%" height="800px">
  </div>
@endsection
