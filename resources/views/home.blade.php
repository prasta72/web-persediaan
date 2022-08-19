@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Persediaan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Rekening</th>
                                <th scope="col">Uraian</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">jumlah</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php $no = 1; @endphp
                              @foreach ($persediaans as $persediaan)
                                  <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $persediaan->rekening->rekening }}</td>
                                    <td>{{ $persediaan->name }}</td>
                                    <td>{{ $persediaan->satuan }}</td>
                                    <td>{{ number_format("$persediaan->harga",2,",",".")  }}</td>
                                    <td>{{ $persediaan->total_persediaan }}</td>
                                    <td>{{ number_format("$persediaan->total_harga",2,",",".") }}</td>
                                    <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                      Penerimaan
                                    </button></td>
                                  </tr> 
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            ...
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
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
