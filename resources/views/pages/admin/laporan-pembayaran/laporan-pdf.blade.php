@extends('layouts/app', ['title' => 'Laporan Pembayaran PDF'])

@section('content')
  <div class="table-responsive">
    <div class="text-center mt-4">
      <h1 class="fw-bolder">Data Laporan Pengguna</h1>
      <p class="mt-0">Tanggal Dibuat Laporan : {{ date('d F Y') }}</p>
    </div>

    <table class="table align-middle mb-0 table-hover table-centered mt-3 table-bordered">
      <thead class="bg-light-subtle">
        <tr class="bg-secondary ">
          <th class="text-white">Lokasi Produksi</th>
          <th class="text-white">Jumlah Pembayaran</th>
          <th class="text-white">Tanggal Pembayaran</th>
          <th class="text-white">Jumlah Tandan</th>
          <th class="text-white">Berat Total</th>
          <th class="text-white">Metode Pembayaran</th>
          <th class="text-white">Bukti Pembayaran</th>
          <th class="text-white">Didaftarkan Pada</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($data as $index => $pembayaran)
          <tr>
            <td> {{ $pembayaran->produksi->kebun->lokasi }} </td>
            <td>{{ 'Rp ' . number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</td>
            <td>{{ $pembayaran->tanggal_pembayaran->format('Y-m-d') }}</td>
            <td>{{ $pembayaran->produksi->jumlah_tandan }} Tandan</td>
            <td>{{ $pembayaran->produksi->berat_total }} Kg</td>

            <td>
              @if ($pembayaran->metode_pembayaran === 'Cash')
                <span class="badge bg-blue">Cash</span>
              @elseif ($pembayaran->metode_pembayaran === 'Transfer')
                <span class="badge bg-success">Transfer</span>
              @else
                <span class="badge bg-secondary">Metode Pembayaran Tidak Dikenal</span>
              @endif
            </td>

            {{-- Bukti Pembayaran --}}
            <td>
              <a href="{{ $pembayaran->bukti_pembayaran ? asset('storage/pembayaran/' . basename($pembayaran->bukti_pembayaran)) : asset('images/404-error.png') }}"
                target="_blank" class="text-blue fw-normal">Lihat Bukti</a>
            </td>

            <td>{{ $pembayaran->created_at->format('Y-m-d') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
