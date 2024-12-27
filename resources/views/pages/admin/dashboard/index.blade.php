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
            <div id="chart-data-kebun"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card ">
        <div class="card-body">
          <h4 class="card-title mb-3 anchor fw-semibold" id="simple_pie">Data Pembayaran</h4>
          <div dir="ltr" class="d-flex justify-content-center">
            <div id="chart-data-pembayaran"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title anchor fw-semibold" id="basic">Data Produksi</h4>
        <div dir="ltr">
          <div id="chart-data-produksi" class="apex-charts"></div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    // Options Charts
    const prepareColumnChartOptions = (months, totalTandan, totalBerat) => ({
      chart: {
        height: 396,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          endingShape: 'rounded',
          columnWidth: '55%',
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 0,
        colors: ['transparent']
      },
      colors: ['#ff6c2f', '#4ecac2'],
      series: [{
          name: 'Total Tandan',
          data: totalTandan
        },
        {
          name: 'Total Berat',
          data: totalBerat
        },
      ],
      xaxis: {
        categories: months
      },
      legend: {
        offsetY: 7
      },
      yaxis: {
        title: {
          text: 'Data Produksi'
        }
      },
      fill: {
        opacity: 1
      },
      grid: {
        row: {
          colors: ['transparent', 'transparent'],
          opacity: 0.2
        },
        borderColor: '#f1f3fa',
        padding: {
          bottom: 5
        }
      },
      tooltip: {
        y: {
          formatter: (val, {
              seriesIndex
            }) =>
            seriesIndex === 0 ? `${val} Tandan` : `${val} Kg`
        }
      }
    });

    const preparePieChartOptions = (labels, data, colors) => ({
      chart: {
        width: 380,
        type: 'pie'
      },
      labels,
      series: data,
      colors,
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            position: 'bottom'
          },
        }
      }],
      legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        floating: false,
        fontSize: '14px',
      },
      dataLabels: {
        enabled: true,
        style: {
          fontSize: '14px',
          colors: ['#4e4b66']
        },
      },
    });

    // Data produksi Preprocessing 
    const prepareChartDataProduksi = (produksiData) => {
      const bulanUrut = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
        "September", "Oktober", "November", "Desember"
      ];

      const sortedData = [...produksiData].sort(
        (a, b) => bulanUrut.indexOf(a.month_name) - bulanUrut.indexOf(b.month_name)
      );

      const months = sortedData.map(item => item.month_name);
      const totalTandan = sortedData.map(item => parseInt(item.total_tandan, 10));
      const totalBerat = sortedData.map(item => parseInt(item.total_berat, 10));

      return {
        months,
        totalTandan,
        totalBerat
      };
    };

    const createColumnChart = (elementId, options) => {
      new ApexCharts(document.querySelector(`#${elementId}`), options).render();
    };

    const createPieChart = (elementId, labels, data, colors) => {
      const options = preparePieChartOptions(labels, data, colors);
      new ApexCharts(document.querySelector(`#${elementId}`), options).render();
    };

    // Main Logic
    document.addEventListener('DOMContentLoaded', () => {
      const kebunData = @json($totals['total_kebun']);
      const pembayaranData = @json($totals['total_pembayaran']);
      const produksiData = @json($totals['total_produksi_bulanan']);


      const {
        months,
        totalTandan,
        totalBerat
      } = prepareChartDataProduksi(produksiData);

      // Render Column Chart
      const columnChartOptions = prepareColumnChartOptions(months, totalTandan, totalBerat);
      createColumnChart('chart-data-produksi', columnChartOptions);

      // Render Pie Chart
      createPieChart(
        'chart-data-kebun',
        ['Aktif', 'Non Aktif'],
        [kebunData.aktif, kebunData.non_aktif],
        ['#22c55e', '#ef5f5f']
      );
      createPieChart(
        'chart-data-pembayaran',
        ['Cash', 'Transfer'],
        [pembayaranData.cash, pembayaranData.transfer],
        ['#1c84ee', '#22c55e']
      );
    });
  </script>
@endsection
