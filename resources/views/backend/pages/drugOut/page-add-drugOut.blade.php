@extends('backend.layouts.app')
@section('content')
<div class="container-fluid mt--6">
  <div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Tambah Pengeluaran Obat</h3>
      @if (session('status'))
            
        <p>{{ session('status') }}</p>
        @endif
        @if (session('error'))
            
        <p>{{ session('error') }}</p>
        @endif
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form method="POST" action="{{ url('drugOut/new') }}" >
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="example2cols1Input">Nama Obat</label>
              <select class="form-control" id="drug" name="drug_id" data-toggle="select">
                @foreach ($getAllDrug as $item)
                <option value="{{ $item->id }}" >{{ $item->name }} | Rp {{ $item->price }}</option>
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
              <label class="form-control-label" for="exampleFormControlTextarea1">Tanggal Keluar (mm-dd-yyyy)</label>
              <input class="form-control" type="date" name="date_out" value="2023-06-02" id="example-date-input">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Kuantitas</label>
              <input type="number" name="amount" id="amount" class="form-control  @error('amount') is-invalid @enderror" id="example2cols1Input" placeholder="100">
              @error('amount')
              <span class="text-danger font-weight-bold text-sm">
                {{ $message }}
              </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="flex mb-3">
            <span class="text-lg">Total: Rp </span>
            <span class="text-lg" id="total"> </span>
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
  var drugSelect = document.getElementById("drug");
  var amountInput = document.getElementById("amount");
  var totalHarga = document.getElementById("total");

  drugSelect.addEventListener("change", hitungTotal);

  amountInput.addEventListener("input", hitungTotal);

  function hitungTotal() {
    var text = drug.options[drug.selectedIndex].innerHTML.split(' ');
    var amount = amountInput.value;

    var harga = parseInt( text[text.length - 1]);

    var total = harga * amount;

    totalHarga.innerHTML = total;
  }
</script>
    
@endsection