@extends('staff.layouts.app')
@section('content')
<div class="row">
    <div class="col">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
        <h3 class="mb-0">List Pasien</h3>
        </div>
        <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($getAllPatient as $item)
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

@endsection