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
            <div class="card">
                <div class="card-header">{{ __('Persediaan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                     <a class="btn btn-danger mb-2" href="{{ route('persediaan.export-pdf') }}">export PDF</a>
                      <div class="mb-3">
                        <input type="text"  id="myInput" onkeyup="myFunction()" required name="satuan" class="form-control" id="exampleFormControlInput1" placeholder="pencarian data" {{ old('satuan') }}>
                      </div>
                        <table id="myTable">
                            <thead>
                              <tr>
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" colspan="2" class="text-center">Kode Rekening</th>
                                <th rowspan="2" class="text-center">Uraian</th>
                                <th rowspan="2" class="text-center">Satuan</th>
                                <th rowspan="2" class="text-center">Harga Satuan</th>
                                <th scope="col" colspan="2" class="text-center">Saldo Awal</th>
                                <th scope="col" colspan="2" class="text-center">Penerimaan</th>
                                <th scope="col" colspan="2" class="text-center">Pengeluaran</th>
                                <th scope="col" colspan="2" class="text-center">Saldo Akhir</th>
                              </tr>
                              <tr>
                                <th scope="col" class="text-center">jumlah</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">jumlah</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">jumlah</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Jumlah</th>
                                <th scope="col" class="text-center">Harga</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php $no = 1; @endphp
                              @foreach ($persediaans as $persediaan)
                                  <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $persediaan->rekening->rekening }}</td>
                                    <td style="color: red">{{ $persediaan->rekening->rekening_dua }}</td>
                                    <td>{{ $persediaan->name }}</td>
                                    <td>{{ $persediaan->satuan }}</td>
                                    <td>{{ number_format("$persediaan->harga",2,",",".")  }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>{{ $persediaan->total_persediaan }}</td>
                                    <td>{{ number_format("$persediaan->total_harga",2,",",".") }}</td>
                                    @if (isset($persediaan->totalPengeluaran->jumlah))
                                      <td>{{ $persediaan->totalPengeluaran->jumlah }}</td>
                                    @else
                                      <td>-</td>
                                    @endif

                                    @if (isset($persediaan->totalPengeluaran->harga))
                                      <td>{{ number_format(floatval($persediaan->totalPengeluaran->harga),2,",",".") }}</td>
                                    @else
                                      <td>-</td>
                                    @endif

                                    @if (isset($persediaan->saldo->jumlah))
                                      <td>{{ $persediaan->saldo->jumlah }}</td> 
                                    @else
                                      <td>-</td>
                                    @endif
                                    @if (isset($persediaan->saldo->harga))
                                    <td>{{ number_format(floatval($persediaan->saldo->harga),2,",",".") }}</td> 
                                    @else
                                      <td>-</td>
                                    @endif
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

<script>
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    console.log(tr[0]);
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>
@endsection
