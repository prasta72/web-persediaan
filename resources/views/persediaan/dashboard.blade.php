@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-3">
                <input type="text"  id="myInput" onkeyup="myFunction()" required name="satuan" class="form-control" id="exampleFormControlInput1" placeholder="pencarian data" {{ old('satuan') }}>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Persediaan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="">
                        <ul id="myUL">
                            @forelse ($rekenings as $rekening)
                                <li class="mt-2"><a class="btn btn-primary" href="{{ route('tambah.persediaan' , ['id' => $rekening->id]) }}" class="text-decoration-none">{{ $rekening->uraian }}</a></li>
                                @empty
                                <div>kosong</div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
    