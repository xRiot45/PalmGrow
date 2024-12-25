@extends('layouts.admin/app', ['title' => 'Dashboard'])


@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-md bg-soft-primary rounded">
                <iconify-icon icon="mdi:users" class="avatar-title fs-32 text-primary"></iconify-icon>
              </div>
            </div>
            <div class="col-6 text-end">
              <p class="text-muted mb-0 text-truncate">Total Pengguna</p>
              <h3 class="text-dark mt-1 mb-0">{{ $totals['total_pengguna'] }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-md bg-soft-primary rounded">
                <iconify-icon icon="lsicon:report-filled"
                  class="avatar-title fs-32 text-primary"></iconify-icon>
              </div>
            </div>
            <div class="col-6 text-end">
              <p class="text-muted mb-0 text-truncate">Total Laporan Masuk</p>
              <h3 class="text-dark mt-1 mb-0">{{ $totals['total_laporan_masuk'] }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-md bg-soft-primary rounded">
                <iconify-icon icon="fluent:production-20-filled"
                  class="avatar-title fs-32 text-primary"></iconify-icon>
              </div>
            </div>
            <div class="col-6 text-end">
              <p class="text-muted mb-0 text-truncate">Total Produksi</p>
              <h3 class="text-dark mt-1 mb-0">{{ $totals['total_produksi'] }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card overflow-hidden">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-md bg-soft-primary rounded">
                <iconify-icon icon="lsicon:distribution-filled"
                  class="avatar-title fs-32 text-primary"></iconify-icon>
              </div>
            </div>
            <div class="col-6 text-end">
              <p class="text-muted mb-0 text-truncate">Total Distribusi</p>
              <h3 class="text-dark mt-1 mb-0">{{ $totals['total_distribusi'] }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row ">
    <div class="card col-lg-3">
      <div class="card-body">
        <h4 class="card-title mb-3 anchor" id="simple_pie">Data Kebun</h4>
        <div dir="ltr">
          <canvas id="simple-pie"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const kebunData = @json($totals['total_kebun']);
    const ctx = document.getElementById('simple-pie').getContext('2d');

    const data = {
      labels: ["Aktif", "Non Aktif"],
      datasets: [{
        data: [kebunData.aktif, kebunData.non_aktif],
        backgroundColor: ["#0b5ed7", "#dc3545"],
        borderWidth: 5,
      }]
    };

    const options = {
      responsive: false,
      plugins: {
        legend: {
          show: true,
          position: 'bottom',
          horizontalAlign: 'center',
          verticalAlign: 'middle',
          floating: false,
          fontSize: '14px',
          offsetX: 0,
          offsetY: 7
        }
      },
      layout: {
        padding: {
          top: 10,
          bottom: 10,
        }
      }
    };

    new Chart(ctx, {
      type: 'pie',
      data: data,
      options: options,
    });
  </script>
@endsection
