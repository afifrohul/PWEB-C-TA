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
      <h3 class="mb-0">Tambah Pemeriksaan</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('back-doctor/inspection/new') }}" >
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Pasien</label>
              <select class="" name="patient_id" id="normalize">
                <option value="">---Pilih Nama Pasien--</option>
                @foreach ($getAllPatient as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
              </select>
              @error('patient_id')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Tanggal Pemeriksaan</label>
              <input class="form-control" type="date" name="date_inspection"  id="example-date-input">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Catatan Dokter</label>
              <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="6" placeholder="Lorem Ipsum"></textarea>
              @error('note')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="row-12">
              <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Diagnosis Penyakit</label>
              <select class="" id="remove-button" multiple="multiple" name="diagnoses[]" data-toggle="select">
                @foreach ($getAllDiagnosis as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
              </select>
              @error('diagnosis_id')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
              </div>
            </div>
            <div class="row-12">
              <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Obat</label>
              <select class="" id="remove-button2" name="drugs[]" multiple="multiple" data-toggle="select">
                @foreach ($getAllDrug as $item)
                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                @endforeach
              </select>
              @error('drug_id')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
              </div>
            </div>
            
          </div>
        </div>
        <button class="btn btn-icon btn-primary" type="submit">
          <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
          <span class="btn-inner--text">Tambah</span>
        </button>
      </form>
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