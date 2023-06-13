@extends('staff.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Edit Pemasukan Obat</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('back-staff/drugIn/update',$getDetailDrugIn->id) }}" >
        @method('PUT')
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Obat</label>
              <select class="form-control" name="drug_id" data-toggle="select">
                @foreach ($getAllDrug as $item)
                <option value="{{ $item->id }}" @if ($getDetailDrugIn->drug_id == $item->id ) selected @endif >{{ $item->name }}</option>
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
              <input class="form-control" type="date" name="date_in" value="{{ $getDetailDrugIn->date_in }}" id="example-date-input">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Kuantitas</label>
              <input type="text" name="amount" class="form-control  @error('name') is-invalid @enderror" id="example2cols1Input" placeholder="Paracetamol" value="{{ $getDetailDrugIn->amount }}">
              @error('amounrt')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
        </div>
        <button class="btn btn-icon btn-primary" type="submit">
          <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
          <span class="btn-inner--text">Simpan</span>
        </button>
      </form>
    </div>
  </div>
</div>
@endsection