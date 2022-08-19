@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Persediaan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-evenly flex-wrap">
                        @forelse ($rekenings as $rekening)
                            <button type="button" class="btn btn-primary mt-2"><a href="{{ route('tambah.persediaan' , ['id' => $rekening->id]) }}" class="text-white text-decoration-none">{{ $rekening->uraian }}</a></button>
                        @empty
                            <div>kosong</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
