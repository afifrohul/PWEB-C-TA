@extends('doctor.layouts.app')
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
                <th>Tanggal Pemeriksaan</th>
                <th>Diagnosis</th>
                <th>Obat</th>
                <th>Catatan Dokter</th>
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($getAllInspection as $item)
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->patient->name }}</td>
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
                <td>{{Str::limit($item->note, 25)}}</td>
                <td>
                    <div class="row">
                        <form method="POST" class="inline mr-2" action="{{ url('back-doctor/inspection/show',$item->id) }}">
                            @csrf
                            <button class="btn btn-icon btn-primary" type="submit">
                                <span class="btn-inner--icon"><i class="fa fa-eye"></i></span>
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