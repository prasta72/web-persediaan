  <div class="mb-3" style="display: none">
    <label for="exampleFormControlInput1" class="form-label">ID Rekening</label>
    <input type="text" required name="id_rekening" class="form-control"  value="{{ $rekenings->id }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Uraian</label>
    <input type="text" required name="name" class="form-control" id="exampleFormControlInput1" placeholder="Uraian nama barang" {{ old('name') }}>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Satuan</label>
    <input type="text" required name="satuan" class="form-control" id="exampleFormControlInput1" placeholder="Satuan" {{ old('satuan') }}>
  </div>
  <div class="mb-3 d-none">
    <label for="exampleFormControlInput1" class="form-label">Harga</label>
    <input value="0" type="number" required name="harga" class="form-control" id="exampleFormControlInput1" placeholder="Harga barang" {{ old('harga') }}>
  </div>
  <div class="mb-3 d-none">
    <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
    <input value="0" type="number" required name="jumlah" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah barang" {{ old('harga') }}>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>


  