@extends('layouts.app')

@section('content')
<style>
    table, th, td {
    border:1px solid black;
    border-collapse: collapse;
    padding: 2px;
  }
  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
            @endif
            <div class="card">
                <div class="card-header">Rekening</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <div class="container" > 
                       <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
                            <button type="submit" class="btn btn-primary">Import</button>
                       </form>
                       <h3 class="mt-2">Tambah Data Rekening</h3>
                       <form action="{{ route('add.rekening') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Rekening</label>
                                <input type="text" required name="rekening" class="form-control" id="exampleFormControlInput1" placeholder="Uraian nama barang" {{ old('rekening') }}>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Rekening dua</label>
                                <input type="text" required name="rekening_dua" class="form-control" id="exampleFormControlInput1" placeholder="Uraian nama barang" {{ old('rekening_dua') }}>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Uraian</label>
                                <input type="text" required name="uraian" class="form-control" id="exampleFormControlInput1" placeholder="Uraian nama barang" {{ old('uraian') }}>
                            </div>
                            <button type="submit" class="btn btn-primary">submit</button>
                       </form>
                        <hr>
                        <table >
                            <thead>
                                <th class="text-center" colspan="2">Rekening</th>
                                <th class="text-center">Uraian</th>
                            </thead>
                            <tbody>
                                @foreach ($rekenings as $rekening)
                                <tr>
                                    <td>{{ $rekening->rekening }}</td>
                                    <td style="color: red">{{ $rekening->rekening_dua }}</td>
                                    <td>{{ $rekening->uraian }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection