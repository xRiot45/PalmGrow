@extends('layouts.admin/app', ['title' => 'Tambah Petugas'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <form method="POST" action="{{ route('admin.petugas.update', $data->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
      {{-- Pengguna Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="pengguna_id">Pengguna</label>
        <select name="pengguna_id" id="pengguna_id" class="form-control" aria-label="Pilih Pengguna"
          data-choices data-choices-search-true data-choices-removeItem>
          <option value="">-- Pilih Pengguna --</option>
          @foreach ($pengguna as $user)
            <option value="{{ $user->id }}" @if (old('pengguna_id', $data->pengguna_id) == $user->id) selected @endif>
              {{ $user->name }}
            </option>
          @endforeach
        </select>
        @error('pengguna_id')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Pengguna End --}}

      {{-- Nama Petugas Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="nama_petugas">Nama Petugas</label>
        <input type="text" id="nama_petugas" name="nama_petugas" class="form-control"
          placeholder="Masukkan nama lengkap petugas"
          value="{{ old('nama_petugas', $data->nama_petugas) }}">
        @error('nama_petugas')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Nama Petugas End --}}

      {{-- Jabatan Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="jabatan">Jabatan</label>
        <input type="text" id="jabatan" name="jabatan" class="form-control"
          placeholder="Masukkan jabatan petugas" value="{{ old('jabatan', $data->jabatan) }}">
        @error('jabatan')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Jabatan End --}}

      {{-- Tanggal Bergabung Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="tanggal_bergabung">
          Tanggal Bergabung
        </label>
        <input type="date" id="tanggal_bergabung" class="form-control"
          placeholder="-- Pilih Tanggal --" name="tanggal_bergabung"
          value="{{ old('tanggal_bergabung', $data->tanggal_bergabung->format('Y-m-d')) }}">
        @error('tanggal_bergabung')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Bergabung End --}}
    </div>

    <div class="w-100 d-flex gap-1 justify-content-end">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.petugas.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Edit Petugas</button>
    </div>
  </form>
@endsection
