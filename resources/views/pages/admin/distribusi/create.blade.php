@extends('layouts.admin/app', ['title' => 'Tambah Distribusi'])


@section('content')
  <form action="{{ route('admin.distribusi.store') }}" method="POST">
    @csrf
    <div class="row">
      {{-- Kebun Produksi Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="produksi_id">Kebun Produksi</label>
        <select name="produksi_id" id="produksi_id" class="form-control" aria-label="Pilih Kebun Produksi"
          data-choices data-choices-search-true data-choices-removeItem>
          <option value="">-- Pilih Kebun Produksi --</option>
          @foreach ($lokasi_kebun as $lokasi)
            <option value="{{ $lokasi->produksi_id }}">{{ $lokasi->lokasi }}</option>
          @endforeach
        </select>
        @error('produksi_id')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      {{-- Kebun Produksi End --}}

      {{-- Tujuan Distribusi Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="tujuan">
          Tujuan Distribusi
        </label>
        <input type="text" id="tujuan" name="tujuan" class="form-control"
          placeholder="Masukkan tujuan distribusi">
        @error('tujuan')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tujuan Distribusi End --}}

      {{-- Jumlah Distribusi Start --}}
      <div class="mb-3 col-md-6">
        <label class="form-label" for="jumlah">
          Jumlah Distribusi
        </label>
        <input type="number" id="jumlah" name="jumlah" class="form-control"
          placeholder="Masukkan jumlah distribusi">
        @error('jumlah')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Jumlah Distribusi End --}}

      {{-- Tanggal Distribusi Start --}}
      <div class="col-md-6 mb-3">
        <label class="form-label" for="tanggal_distribusi">
          Tanggal Distribusi
        </label>
        <input type="date" id="tanggal_distribusi" class="form-control"
          placeholder="-- Pilih Tanggal --" name="tanggal_distribusi"
          value="{{ request()->get('tanggal_distribusi') }}">
        @error('tanggal_distribusi')
          <span class="text-danger error-message">{{ $message }}</span>
        @enderror
      </div>
      {{-- Tanggal Distribusi End --}}
    </div>

    <div class="w-100 d-flex gap-1 justify-content-end">
      <button type="button" class="btn btn-secondary">
        <a href="{{ route('admin.produksi.index') }}" class="text-white">Kembali</a>
      </button>
      <button type="submit" class="btn btn-primary">Tambah Distribusi</button>
    </div>
  </form>
@endsection
