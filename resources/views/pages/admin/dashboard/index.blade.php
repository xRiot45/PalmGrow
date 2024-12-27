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

  <div class="row g-3">
    <div class="col-md-6">
      <div class="card ">
        <div class="card-body">
          <h4 class="card-title mb-3 anchor fw-semibold" id="simple_pie">Data Kebun</h4>
          <div dir="ltr" class="d-flex justify-content-center">
            <canvas id="simple-pie-data-kebun"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card ">
        <div class="card-body">
          <h4 class="card-title mb-3 anchor fw-semibold" id="simple_pie">Data Pembayaran</h4>
          <div dir="ltr" class="d-flex justify-content-center">
            <canvas id="simple-pie-data-pembayaran"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const kebunData = @json($totals['total_kebun']);
    const pembayaranData = @json($totals['total_pembayaran']);

    // General chart options
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

    function createPieChart(elementId, labels, data, backgroundColors) {
      const ctx = document.getElementById(elementId).getContext('2d');
      const chartData = {
        labels: labels,
        datasets: [{
          data: data,
          backgroundColor: backgroundColors,
          borderWidth: 5,
        }]
      };
      new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: options,
      });
    }

    createPieChart('simple-pie-data-kebun', ['Aktif', 'Non Aktif'], [kebunData.aktif, kebunData
      .non_aktif
    ], ['#22c55e', '#ef5f5f']);
    createPieChart('simple-pie-data-pembayaran', ['Cash', 'Transfer'], [pembayaranData.cash,
      pembayaranData.transfer
    ], ['#1c84ee', '#22c55e']);
  </script>
@endsection
