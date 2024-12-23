@extends('layouts/app', ['title' => 'Laporan Produksi PDF'])

@section('content')
  <div class="table-responsive">
    <div class="text-center mt-4">
      <h1 class="fw-bolder">Data Laporan Produksi</h1>
      <p class="mt-0">Tanggal Dibuat Laporan : {{ date('d F Y') }}</p>
    </div>

    <table class="table align-middle mb-0 table-hover table-centered mt-3 table-bordered">
      <thead class="bg-light-subtle">
        <tr class="bg-secondary ">
          <th class="text-white">Lokasi Kebun</th>
          <th class="text-white">Luas Kebun</th>
          <th class="text-white">Jumlah Tandan</th>
          <th class="text-white">Berat Total</th>
          <th class="text-white">Tanggal Produksi</th>
          <th class="text-white">Didaftarkan Pada</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($data as $index => $produksi)
          <tr>
            <td> {{ $produksi->kebun->lokasi }} </td>
            <td>{{ number_format($produksi->kebun->luas, 2) }} m<sup>2</sup></td>
            <td> {{ $produksi->jumlah_tandan }} Tandan </td>
            <td> {{ $produksi->berat_total }} Kg </td>
            <td>{{ $produksi->tanggal_produksi->format('Y-m-d') }}</td>
            <td> {{ $produksi->created_at->format('Y-m-d') }} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
