@extends('doctor.layouts.app')
@section('extraCSS')
  <style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
    font-size: .875rem;
    line-height: 1.5rem;
    display: inline-flex;
    margin: 0 0 0.25rem 0.25rem;
    padding: 0 1.6rem;
    color: #ffffff;
    border: none;
    border-radius: 0.25rem;
    background-color: #5e72e4;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    margin-left: 0.5rem;
    color: #ffffff;
    order: 2;
    }
  </style>
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
              <select class="form-control" name="patient_id" data-toggle="select">
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
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="6" placeholder="Lorem Ipsum"></textarea>
              @error('description')
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
              <select class="js-example-basic-multiple js-states form-control multi" multiple="multiple" name="diagnoses[]" data-toggle="select">
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
              <select class="form-control multi" name="drugs[]" multiple="multiple" data-toggle="select">
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

<script>
  function matchStart(params, data) {
  // If there are no search terms, return all of the data
  if ($.trim(params.term) === '') {
    return data;
  }

  // Skip if there is no 'children' property
  if (typeof data.children === 'undefined') {
    return null;
  }

  // `data.children` contains the actual options that we are matching against
  var filteredChildren = [];
  $.each(data.children, function (idx, child) {
    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
      filteredChildren.push(child);
    }
  });

  // If we matched any of the timezone group's children, then set the matched children on the group
  // and return the group object
  if (filteredChildren.length) {
    var modifiedData = $.extend({}, data, true);
    modifiedData.children = filteredChildren;

    // You can return modified objects from here
    // This includes matching the `children` how you want in nested data sets
    return modifiedData;
  }

  // Return `null` if the term should not be displayed
  return null;
}

$(".multi").select2({
  matcher: matchStart
});
</script>
    
@endsection