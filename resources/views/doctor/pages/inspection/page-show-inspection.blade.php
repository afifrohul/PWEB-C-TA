@extends('doctor.layouts.app')
@section('extraCSS')
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
@endsection

@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Detail Pemeriksaan</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <p class="font-weight-bold">Nama Pasien:</p>
            <p>{{ $getDetailInspection->patient->name }}</p>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p class="font-weight-bold">Tanggal Pemeriksaan:</p>
              <p>{{ $getDetailInspection->date_inspection }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p class="font-weight-bold">Catatan Dokter:</p>
              <p>{{ $getDetailInspection->note }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row-12">
              <div class="form-group">
                <p class="font-weight-bold">Diagnosis Penyakit:</p>
                <p>
                    @foreach ($getDetailInspection->diagnoses as $item)
                      <p>{{ $item->name }}</p>
                    @endforeach
                </p>
              </div>
            </div>
            <div class="row-12">
              <div class="form-group">
                <p class="font-weight-bold">Obat:</p>
                <p>
                    @foreach ($getDetailInspection->drugs as $item)
                      <p>{{ $item->name }}</p>
                    @endforeach
                </p>
              </div>
            </div>
            
          </div>
        </div>
        <a class="btn btn-icon btn-secondary" href="{{ url('/back-doctor/inspection') }}">
          <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
          <span class="btn-inner--text">Kembali</span>
        </a>
    </div>
  </div>
</div>
@endsection
@section('extraJS')
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>

<script>
  $('#normalize').selectize();

  $("#remove-button").selectize({
  plugins: ["remove_button"],
  delimiter: ",",
  persist: false,
  create: function (input) {
    return {
        value: input,
        text: input,
    };
  },
});

$("#remove-button2").selectize({
  plugins: ["remove_button"],
  delimiter: ",",
  persist: false,
  create: function (input) {
    return {
        value: input,
        text: input,
    };
  },
});
</script>
    
@endsection