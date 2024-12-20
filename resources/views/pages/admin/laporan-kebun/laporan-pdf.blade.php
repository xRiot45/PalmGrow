@extends('layouts/app', ['title' => 'Laporan Kebun PDF'])

@section('content')
  <div class="table-responsive">
    <div class="text-center mt-4">
      <h1 class="fw-bolder">Data Laporan Kebun</h1>
      <p class="mt-0">Tanggal Dibuat Laporan : {{ date('d F Y') }}</p>
    </div>

    <table class="table align-middle mb-0 table-hover table-centered mt-3 table-bordered">
      <thead class="bg-light-subtle">
        <tr class="bg-secondary ">
          <th class="text-white">Lokasi</th>
          <th class="text-white">Luas</th>
          <th class="text-white">Status</th>
          <th class="text-white">Tanggal Tanam</th>
          <th class="text-white">Tanggal Panen</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($data as $index => $kebun)
          <tr>
            <td> {{ $kebun->lokasi }} </td>
            <td>{{ number_format($kebun->luas, 2) }} m<sup>2</sup></td>
            <td>
              @if ($kebun->status->value === 'Aktif')
                <span class="badge bg-success">Aktif</span>
              @elseif ($kebun->status->value === 'Non-Aktif')
                <span class="badge bg-danger">Non-Aktif</span>
              @else
                <span class="badge bg-secondary">Status Tidak Dikenal</span>
              @endif
            </td>
            <td>{{ $kebun->tanggal_tanam->format('Y-m-d') }}</td>
            <td>{{ $kebun->tanggal_panen->format('Y-m-d') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
