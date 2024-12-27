const pieChartOptions = {
  chart: {
    width: 380,
    type: 'pie',
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        width: 200
      },
      legend: {
        position: 'bottom'
      }
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
      colors: ['#4e4b66'],
    }
  }
};

function createPieChart(elementId, labels, data, colors) {
  const chartOptions = {
    ...pieChartOptions,
    labels: labels,
    series: data,
    colors: colors,
  };

  new ApexCharts(document.querySelector(`#${elementId}`), chartOptions).render();
}

// Fungsi untuk inisialisasi chart dengan data dari PHP
function initializeCharts(dataKebun, dataPembayaran) {
  createPieChart('chart-data-kebun', ['Aktif', 'Non Aktif'], [dataKebun.aktif, dataKebun.non_aktif], ['#22c55e', '#ef5f5f']);
  createPieChart('chart-data-pembayaran', ['Cash', 'Transfer'], [dataPembayaran.cash, dataPembayaran.transfer], ['#1c84ee', '#22c55e']);
}
