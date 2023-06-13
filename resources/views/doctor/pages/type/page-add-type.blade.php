@extends('doctor.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Tambah Jenis Obat</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('back-doctor/type/new') }}" >
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Jenis Obat</label>
              <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="example2cols1Input" placeholder="Pil">
              @error('name')
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