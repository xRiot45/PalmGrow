@extends('layouts/app', ['title' => 'Laporan Distribusi PDF'])

@section('content')
  <div class="table-responsive">
    <div class="text-center mt-4">
      <h1 class="fw-bolder">Data Laporan Distribusi</h1>
      <p class="mt-0">Tanggal Dibuat Laporan : {{ date('d F Y') }}</p>
    </div>

    <table class="table align-middle mb-0 table-hover table-centered mt-3 table-bordered">
      <thead class="bg-light-subtle">
        <tr class="bg-secondary ">
          <th class="text-white">Tujuan Distribusi</th>
          <th class="text-white">Jumlah Distribusi</th>
          <th class="text-white">Tanggal Distribusi</th>
          <th class="text-white">Lokasi Kebun</th>
          <th class="text-white">Tanggal Produksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($data as $index => $distribusi)
          <tr>
            <td> {{ $distribusi->tujuan }} </td>
            <td> {{ $distribusi->jumlah }} </td>
            <td>{{ $distribusi->tanggal_distribusi->format('Y-m-d') }}</td>
            <td> {{ $distribusi->produksi->kebun->lokasi }} </td>
            <td>{{ $distribusi->produksi->tanggal_produksi->format('Y-m-d') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
