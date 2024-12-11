@extends('layouts.vertical', ['title' => 'Edit Pengguna'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <div>
    <form method="POST" action="{{ route('admin.pengguna.update', $data->id) }}"
      class="authentication-form">
      @csrf
      @method('PUT')
      <div>
        {{-- Nama Pengguna Start --}}
        <div class="mb-3">
          <label class="form-label" for="name">Nama Pengguna</label>
          <input type="text" id="name" name="name" class="form-control py-2"
            placeholder="Masukkan nama lengkap pengguna" value="{{ old('name', $data->name) }}">
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        {{-- Nama Pengguna End --}}

        {{-- Email Start --}}
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control py-2"
            placeholder="Masukkan alamat email anda" value="{{ old('email', $data->email) }}">
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
            <option value="Admin" {{ old('role', $data->role->value) == 'Admin' ? 'selected' : '' }}>
              Admin
            </option>
            <option value="Petugas Kebun"
              {{ old('role', $data->role->value) == 'Petugas Kebun' ? 'selected' : '' }}>
              Petugas Kebun
            </option>
            <option value="Manajer"
              {{ old('role', $data->role->value) == 'Manajer' ? 'selected' : '' }}>
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
          <button type="submit" class="btn btn-primary">Edit Pengguna</button>
        </div>
      </div>
  </div>
  </form>
  </div>
@endsection
