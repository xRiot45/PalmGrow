@extends('layouts.vertical', ['title' => 'Tambah Pembayaran'])

@section('css')
  @vite(['node_modules/choices.js/public/assets/styles/choices.min.css'])
@endsection


@section('content')
  <form action="{{ route('admin.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      {{-- Lokasi Kebun Produksi Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="produksi_id">Lokasi Kebun Produksi</label>
        <select name="produksi_id" id="produksi_id" class="form-control"
          aria-label="Pilih Lokasi Kebun Produksi" data-choices data-choices-search-true
          data-choices-removeItem>
          <option value="">-- Pilih Lokasi Kebun Produksi --</option>
          @foreach ($produksi as $lokasi)
            <option value="{{ $lokasi->id }}">{{ $lokasi->kebun->lokasi }}</option>
          @endforeach
        </select>
        @error('produksi_id')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Lokasi Kebun Produksi End --}}

      {{-- Jumlah Pembayaran Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="jumlah_pembayaran">
          Jumlah Pembayaran
        </label>
        <input type="number" id="jumlah_pembayaran" name="jumlah_pembayaran" class="form-control "
          placeholder="Masukkan jumlah pembayaran">
        @error('jumlah_pembayaran')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Jumlah Pembayaran End --}}

      {{-- Tanggal Pembayaran Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="tanggal_pembayaran">
          Tanggal Pembayaran
        </label>
        <input type="date" id="tanggal_pembayaran" class="form-control mb-1"
          placeholder="-- Pilih Tanggal --" name="tanggal_pembayaran"
          value="{{ request()->get('tanggal_pembayaran') }}">
        @error('tanggal_pembayaran')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Pembayaran End --}}

      {{-- Metode Pembayaran Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="metode_pembayaran">Metode Pembayaran</label>
        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control"
          aria-label="Pilih Metode Pembayaran" data-choices data-choices-search-true
          data-choices-removeItem>
          <option value="">-- Pilih Metode Pembayaran --</option>
          <option value="Cash">Cash</option>
          <option value="Transfer">Transfer</option>
        </select>
        @error('metode_pembayaran')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Metode Pembayaran End --}}


    </div>
    {{-- Metode Pembayaran Start --}}
    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
    <input type="file" name="bukti_pembayaran" class="form-control"
      value="{{ old('bukti_pembayaran') }}">
    @error('bukti_pembayaran')
      <span class="text-danger error-message">{{ $message }}</span>
    @enderror
    {{-- Metode Pembayaran End --}}


    <div class="w-100 d-flex gap-1 justify-content-end mt-4">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.pembayaran.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Pembayaran</button>
    </div>
  </form>
@endsection
