@extends('staff.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Tambah Pasien</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('back-staff/patient/new') }}" >
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama</label>
              <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="example2cols1Input" placeholder="Heri">
              @error('name')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Password</label>
              <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="example2cols1Input" placeholder="********">
              @error('password')
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
              <label class="form-control-label" for="example2cols1Input">Email</label>
              <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="example2cols1Input" placeholder="example@gmail.com">
              @error('email')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" id="example2cols1Input" placeholder="********">
              @error('password_confirmation')
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