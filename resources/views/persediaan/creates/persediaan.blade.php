@extends('layouts.app')

@section('content')
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
                <div class="card-header">{{ $rekenings->uraian }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <div class="container"> 
                        <form action="{{ route('tambah.persediaan.simpan') }}" method="POST">
                            @csrf
                            @include('persediaan.creates._form')
                        </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
