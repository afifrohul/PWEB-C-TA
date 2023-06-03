@extends('backend.layouts.app')
@section('card')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboards</a></li>
        </ol>
        </nav>
    </div>
</div>
<div class="row">
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
        <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Jenis Obat</h5>
            <span class="h2 font-weight-bold mb-0">{{ $getCountDrugType }}</span>
        </div>
        <div class="col-auto">
            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
            <i class="ni ni-active-40"></i>
            </div>
        </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
        </p>
    </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
        <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Obat</h5>
            <span class="h2 font-weight-bold mb-0">{{ $getCountDrug }}</span>
        </div>
        <div class="col-auto">
            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
            <i class="ni ni-chart-pie-35"></i>
            </div>
        </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
        </p>
    </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
        <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Pendapatan</h5>
            <span class="h2 font-weight-bold mb-0">Rp{{ $getCountDrugOutIncome }}</span>
        </div>
        <div class="col-auto">
            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
            <i class="ni ni-money-coins"></i>
            </div>
        </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
        </p>
    </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
        <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Pengeluaran</h5>
            <span class="h2 font-weight-bold mb-0">{{ $getCountDrugOutAmount }} Obat</span>
        </div>
        <div class="col-auto">
            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
            <i class="ni ni-chart-bar-32"></i>
            </div>
        </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
        <span class="text-nowrap">Since last month</span>
        </p>
    </div>
    </div>
</div>
</div>
@endsection
@section('content')
<div class="container-fluid mt--6">
    <div class="card mb-4">
        <div id="chartIncome" class="bg-white mt-2 w-full">
        </div>
    </div>
</div>
@endsection
@section('extraJS')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var optionsIncome = {
    series: [{
      name: "Pendapatan (Rp)",
      data: [{{ $getDrugOutJan }}, {{ $getDrugOutFeb }}, {{ $getDrugOutMar }}, {{ $getDrugOutApr }}, {{ $getDrugOutMei }}, {{ $getDrugOutJun }}, {{ $getDrugOutJul }}, {{ $getDrugOutAug }}, {{ $getDrugOutSep }}, {{ $getDrugOutOkt }}, {{ $getDrugOutNov }}, {{ $getDrugOutDes }}]
    }],
    colors: ['#5e72e4'],
    chart: {
    fontFamily:'Ubuntu',
    height: 250,
    // width: 100%,
    type: 'area',
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    curve: 'smooth'
  },
  grid: {
    row: {
      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
      opacity: 0.5
    },
  },
  markers: {
    size: 4
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
    title: {
      text: "Bulan"
    }
  },
  title: {
    text : "Pendapatan Penjualan Obat per Bulan",
    align: 'center'
  },
  yaxis: {
    title: {
      text: "Pendapatan (Rp)"
    }
  }
  };

  var chartIncome = new ApexCharts(document.querySelector("#chartIncome"), optionsIncome);
  chartIncome.render();
</script>
@endsection