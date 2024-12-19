@extends('layouts.admin/app', ['title' => 'Tambah Pengguna'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <form method="POST" action="{{ route('admin.pengguna.store') }}" class="authentication-form">
    @csrf
    <div>
      {{-- Nama Pengguna Start --}}
      <div class="mb-3">
        <label class="form-label" for="name">Nama Pengguna</label>
        <input type="text" id="name" name="name" class="form-control py-2"
          placeholder="Masukkan nama lengkap pengguna">
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      {{-- Nama Pengguna End --}}

      {{-- Email Start --}}
      <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control py-2"
          placeholder="Masukkan alamat email anda">
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      {{-- Email End --}}


      {{-- Role Start --}}
      <div class="mb-3">
        <label class="form-label" for="role">Role</label>
        <select name="role" id="role" class="form-control py-2" aria-label="Pilih Role"
          data-choices data-choices-search-false data-choices-removeItem>
          <option value="">-- Pilih Role --</option>
          <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>
            Admin
          </option>
          <option value="Petugas Kebun" {{ old('role') == 'Petugas Kebun' ? 'selected' : '' }}>
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

      <div class="w-100 d-flex gap-1 justify-content-end">
        <button type="button" class="btn btn-secondary">
          <a href="{{ route('admin.pengguna.index') }}" class="text-white">Tutup</a>
        </button>
        <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
      </div>
    </div>
  </form>
@endsection
