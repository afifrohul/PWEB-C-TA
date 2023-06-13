@extends('backend.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Edit Obat</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('back-staff/drug/update',$getDetailDrug->id) }}" >
        @method('PUT')
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Obat</label>
              <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="example2cols1Input" placeholder="Paracetamol" value="{{ $getDetailDrug->name }}">
              @error('name')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Jenis Obat</label>
              <select class="form-control" name="type_id" data-toggle="select">
                @foreach ($getAllType as $item)
                <option value="{{ $item->id }}" @if ($getDetailDrug->type_id == $item->id ) selected @endif >{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Deskripsi</label>
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Lorem Ipsum">{{ $getDetailDrug->description }}</textarea>
              @error('description')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Harga Obat</label>
              <input type="number" name="price" class="form-control  @error('price') is-invalid @enderror" id="example2cols1Input" placeholder="5000" value="{{ $getDetailDrug->price }}">
              @error('price')
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