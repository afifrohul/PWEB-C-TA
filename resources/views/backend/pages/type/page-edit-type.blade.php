@extends('backend.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Edit Jenis Obat</h3>
      {{-- @dd($getDetailType) --}}
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('type/update',$getDetailType[0]->id) }}" >
        @method('PUT')
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Jenis Obat</label>
              <input type="text" name="name" class="form-control text-black  @error('name') is-invalid @enderror" id="example2cols1Input" placeholder="Pil" value="{{ $getDetailType[0]->name }}">
              @error('name')
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