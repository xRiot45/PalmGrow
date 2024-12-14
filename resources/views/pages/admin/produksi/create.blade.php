@extends('layouts.vertical', ['title' => 'Tambah Produksi'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <form method="POST" action="{{ route('admin.produksi.store') }}">
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

      {{-- Jumlah Tandan Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="jumlah_tandan">Jumlah Tandan
        </label>
        <input type="number" id="jumlah_tandan" name="jumlah_tandan" class="form-control"
          placeholder="Masukkan jumlah tandan">
        @error('jumlah_tandan')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Jumlah Tandan End --}}

      {{-- Berat Total Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="berat_total">Berat Total <span class="fst-italic"
            style="font-size: 0.8rem">
            (Gunakan satuan Kg)</span>
        </label>
        <input type="number" id="berat_total" name="berat_total" class="form-control"
          placeholder="Masukkan berat total">
        @error('berat_total')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Berat Total End --}}

      {{-- Tanggal Panen Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="tanggal_panen">
          Tanggal Panen
        </label>
        <input type="date" id="tanggal_panen" class="form-control"
          placeholder="-- Pilih Tanggal --" name="tanggal_panen"
          value="{{ request()->get('tanggal_panen') }}">
        @error('tanggal_panen')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Panen End --}}
    </div>

    <div class="w-100 d-flex gap-1 justify-content-end">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.produksi.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Produksi</button>
    </div>
  </form>
@endsection
