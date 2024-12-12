@extends('layouts.vertical', ['title' => 'Tambah Kebun'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection

@section('content')
  <form action="{{ route('admin.kebun.store') }}" method="POST">
    @csrf
    <div class="row">
      {{-- Lokasi Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="lokasi">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" class="form-control py-2 mb-1"
          placeholder="Masukkan lokasi kebun">
        @error('lokasi')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Lokasi End --}}

      {{-- Luas Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="luas">Luas <span class="fst-italic"
            style="font-size: 0.8rem">
            (Gunakan satuan m<sup>2</sup>)</span>
        </label>
        <input type="number" id="luas" name="luas" class="form-control py-2 mb-1"
          placeholder="Masukkan luas kebun">
        @error('luas')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Luas End --}}

      {{-- Tanggal Tanam Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="tanggal_tanam">
          Tanggal Tanam
        </label>
        <input type="date" id="tanggal_tanam" class="form-control mb-1"
          placeholder="-- Pilih Tanggal --" name="tanggal_tanam"
          value="{{ request()->get('tanggal_tanam') }}">
        @error('tanggal_tanam')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Tanam End --}}

      {{-- Tanggal Panen Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="tanggal_panen">
          Tanggal Panen
        </label>
        <input type="date" id="tanggal_panen" class="form-control mb-1"
          placeholder="-- Pilih Tanggal --" name="tanggal_panen"
          value="{{ request()->get('tanggal_panen') }}">
        @error('tanggal_panen')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Panen End --}}

      {{-- Status Start --}}
      <div class="mb-3 col-md-12">
        <label class="form-label" for="status">Status Kebun</label>
        <select name="status" id="status" class="form-control" aria-label="Pilih Status"
          data-choices data-choices-search-false data-choices-removeItem>
          <option value="">-- Pilih Status --</option>
          <option value="Aktif" {{ request()->get('status') == 'Aktif' ? 'selected' : '' }}>Aktif
          </option>
          <option value="Non-Aktif" {{ request()->get('status') == 'Non-Aktif' ? 'selected' : '' }}>
            Non-Aktif
          </option>
        </select>
        @error('status')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Status End --}}
    </div>
    <div class="w-100 d-flex gap-1 justify-content-end">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.kebun.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Kebun</button>
    </div>
  </form>

  <script>
    document.querySelectorAll('input, select').forEach(input => {
      input.addEventListener('change', function() {
        const errorMessage = this.closest('.mb-3').querySelector('.error-message');
        if (this.value && errorMessage) {
          errorMessage.remove();
        }
      });
    });
  </script>
@endsection
