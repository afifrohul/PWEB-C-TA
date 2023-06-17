@extends('staff.layouts.app')
@section('content')

<div class="row">
    <div class="col">
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
        <h3 class="mb-0">List Pemeriksaan</h3>
        </div>
        <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Diagnosis</th>
                <th>Obat</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($getAllInspection as $item)
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->patient->name }}</td>
                <td>{{ $item->doctor->name }}</td>
                <td>{{ $item->date_inspection }}</td>
                
                <td>
                    {{-- <ol> --}}
                    @foreach ($item->diagnoses as $diagnosis)
                        <li>{{$diagnosis->name}}</li>
                    @endforeach
                    {{-- </ol> --}}
                </td>
                <td>
                    {{-- <ol> --}}
                    @foreach ($item->drugs as $drug)
                        <li>{{$drug->name}}</li>
                    @endforeach
                    {{-- </ol> --}}
                </td>
                <td>
                    @if ($item->status == 'unlisted')
                    <div class="btn btn-danger"> {{ $item->status }} </div>
                    @endif

                    @if ($item->status == 'listed')
                    <div class="btn btn-success"> {{ $item->status }} </div>
                    @endif
                </td>
                <td>
                    @if ($item->status == 'unlisted')
                        
                    
                    <div class="row">
                        <form method="POST" class="inline mr-2" action="{{ url('back-staff/drugList/update',$item->id) }}">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-icon btn-primary" type="submit" onclick="return confirm('Pengeluaran obat sudah di list?')">
                                <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
                            </button>
                        </form>
                        {{-- <form method="POST" class="inline" action="{{ url('back-doctor/drug/destroy',$item->id) }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-icon btn-danger" type="submit" onclick="return confirm('Hapus Data ?')">
                                <span class="btn-inner--icon"><i class="fa fa-trash"></i></span>
                            </button>
                        </form> --}}
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

@endsection