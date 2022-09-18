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
                <div class="card-header"> Daftar Penerimaan {{ $name->persediaan->name ?? "belum ada penerimaan" }}  </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <div class="container"> 
                        <div>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">satuan</th>
                                <th scope="col">harga</th>
                                <th scope="col">jumlah</th>
                                <th scope="col" class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php $no = 1; @endphp
                              @foreach ($penerimaan as $penerimaan)
                                  <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td id="date">{{ date('d/m/Y', strtotime($penerimaan->created_at))}}</td>
                                    <td id="satuan">{{ $penerimaan->satuan }}</td>
                                    <td id="harga">{{ $penerimaan->harga }}</td>
                                    <td id="jumlah">{{ $penerimaan->jumlah }}</td>
                                    <td><a href="" class="btn btn-success btn-sm" id="pakai" data-toggle="modal" data-target='#practice_modal' data-id="{{ $penerimaan->id }}" data-idpersediaan="{{ $penerimaan->id_persediaan }}" data-jumlah="{{ $penerimaan->jumlah }}" data-name="{{ $penerimaan->persediaan->name }}">Pakai</a></td>
                                  </tr> 
                              @endforeach
                            </tbody>
                          </table>
                          <div class="modal fade" id="practice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="nama_barang"></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('pengeluaran.store') }}" id="edit_form" method="POST">
                                  @csrf
                                    <div class="mb-3 d-none" >
                                      <label for="exampleFormControlInput1" class="form-label">id</label>
                                      <input value="" type="number" required name="id_persediaan" id="id_persediaan" class="form-control" id="exampleFormControlInput1" placeholder="" {{ old('id') }}>
                                    </div>
                                    <div class="mb-3 d-none">
                                      <label for="exampleFormControlInput1" class="form-label">id</label>
                                      <input value="" type="number" required name="id_penerimaan" id="id_penerimaan" class="form-control" id="exampleFormControlInput1" placeholder="" {{ old('id') }}>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleFormControlInput1"  class="form-label">Jumlah</label>
                                      <input value="" type="number" min="1" required name="jumlah" id="jumlah" class="form-control" id="exampleFormControlInput1" placeholder="jumlah barang" {{ old('jumlah') }}>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Pakai</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  $(document).on('click', '#pakai',function(){
    let id = $(this).data('id');
    let id_persediaan = $(this).data('idpersediaan');
    let jumlah = $(this).data('jumlah');
    let name = $(this).data('name');

  $('.modal-body #id_persediaan').val(id_persediaan);
  $('.modal-body #id_penerimaan').val(id);
  $('.modal-body #jumlah').val(jumlah);
  $('.modal-header #nama_barang').html(name);

  });
</script>

