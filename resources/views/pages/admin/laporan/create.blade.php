@extends('layouts.vertical', ['title' => 'Tambah Laporan'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <form method="POST" action="{{ route('admin.laporan.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      {{-- Kebun Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="kebun_id">Kebun</label>
        <select name="kebun_id" id="kebun_id" class="form-control" aria-label="Pilih Pengguna"
          data-choices data-choices-search-true data-choices-removeItem>
          <option value="">-- Pilih Kebun --</option>
          @foreach ($lokasi_kebun as $lokasi)
            <option value="{{ $lokasi->id }}">{{ $lokasi->lokasi }}</option>
          @endforeach
        </select>
        @error('kebun_id')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Kebun End --}}

      {{-- Tanggal Laporan Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="tanggal_laporan">
          Tanggal Laporan
        </label>
        <input type="date" id="tanggal_laporan" class="form-control"
          placeholder="-- Pilih Tanggal --" name="tanggal_laporan"
          value="{{ request()->get('tanggal_laporan') }}">
        @error('tanggal_laporan')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Laporan End --}}
    </div>

    {{-- Upload File Start --}}
    <label for="file_path" class="form-label">Upload Laporan <span><span
          class="text-danger fst-italic">(Wajib PDF)</span></span></label>
    <input type="file" name="file_path" class="form-control" value="{{ old('file_path') }}">
    @error('file_path')
      <span class="text-danger error-message">{{ $message }}</span>
    @enderror
    {{-- Upload File End --}}


    <div class="w-100 d-flex gap-1 justify-content-end mt-4">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.laporan.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Laporan</button>
    </div>
  </form>
@endsection
