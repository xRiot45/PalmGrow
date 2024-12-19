@extends('layouts.admin/app', ['title' => 'Edit Laporan'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <form method="POST" action="{{ route('admin.laporan.update', $data->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      {{-- Kebun Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="kebun_id">Kebun</label>
        <select name="kebun_id" id="kebun_id" class="form-control" aria-label="Pilih Pengguna"
          data-choices data-choices-search-true data-choices-removeItem>
          <option value="">-- Pilih Kebun --</option>
          @foreach ($lokasi_kebun as $lokasi)
            <option value="{{ $lokasi->id }}" @if (old('kebun_id', $data->kebun_id) == $lokasi->id) selected @endif>
              {{ $lokasi->lokasi }}</option>
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
          value="{{ old('tanggal_laporan', $data->tanggal_laporan->format('Y-m-d')) }}">
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

    @if (isset($data->file_path))
      <div class="mt-4">
        <p class="fw-bold">File yang diunggah sebelumnya:</p>
        <embed src="{{ asset('storage/laporan/' . basename($data->file_path)) }}"
          type="application/pdf" width="100%" height="800px">
      </div>
    @endif

    @error('file_path')
      <span class="text-danger error-message">{{ $message }}</span>
    @enderror


    {{-- Upload File End --}}


    <div class="w-100 d-flex gap-1 justify-content-end mt-4">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.laporan.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Edit Laporan</button>
    </div>
  </form>
@endsection
