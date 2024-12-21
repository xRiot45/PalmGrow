@extends('layouts/app', ['title' => 'Laporan Pengguna PDF'])

@section('content')
  <div class="table-responsive">
    <div class="text-center mt-4">
      <h1 class="fw-bolder">Data Laporan Pengguna</h1>
      <p class="mt-0">Tanggal Dibuat Laporan : {{ date('d F Y') }}</p>
    </div>

    <table class="table align-middle mb-0 table-hover table-centered mt-3 table-bordered">
      <thead class="bg-light-subtle">
        <tr class="bg-secondary ">
          <th class="text-white">Nama Pengguna</th>
          <th class="text-white">Email</th>
          <th class="text-white">Role</th>
          <th class="text-white">Didaftarkan Pada</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($data as $index => $pengguna)
          <tr>
            <td> {{ $pengguna->name }} </td>
            <td>{{ $pengguna->email }}</td>
            <td>
              @if ($pengguna->role->value === 'Admin')
                <span class="badge bg-primary">Admin</span>
              @elseif ($pengguna->role->value === 'Petugas Kebun')
                <span class="badge bg-info">Petugas Kebun</span>
              @elseif ($pengguna->role->value === 'Manajer')
                <span class="badge bg-danger">Manajer</span>
              @else
                <span class="badge bg-secondary">Role Tidak Dikenal</span>
              @endif
            </td>
            <td> {{ $pengguna->created_at->format('Y-m-d') }} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
