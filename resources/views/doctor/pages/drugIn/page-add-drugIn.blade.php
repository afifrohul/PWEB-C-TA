@extends('doctor.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Tambah Pemasukan Obat</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('back-doctor/drugIn/new') }}" >
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Obat</label>
              <select class="form-control" name="drug_id" data-toggle="select">
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
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Tanggal Masuk (mm-dd-yyyy)</label>
              <input class="form-control" type="date" name="date_in" value="2023-06-02" id="example-date-input">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Kuantitas</label>
              <input type="number" name="amount" class="form-control  @error('amount') is-invalid @enderror" id="example2cols1Input" placeholder="100">
              @error('amount')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
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