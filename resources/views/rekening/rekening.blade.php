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
                        <hr>
                        <table >
                            <thead>
                                <th>Rekening</th>
                                <th>Uraian</th>
                            </thead>
                            <tbody>
                                @foreach ($rekenings as $rekening)
                                <tr>
                                    <td>{{ $rekening->rekening }}</td>
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