
<select class="form-select mb-3" aria-label="Default select example" name="rekening" onchange="getPersediaan()" id="rekening">
    <option >Pilih Rekening</option>
    @foreach ($rekenings as $rekening)
        <option value="{{ $rekening->id }}"> {{ $rekening->rekening . "-" . $rekening->uraian }} </option>
    @endforeach
</select>
<select class="form-select" aria-label="Default select example" name="id_persediaan" id="persediaan">
  <option selected>Pilih Persediaan</option>
    @php
        $i = 1;
    @endphp
    @foreach ($persediaans as $persediaan)
        <option value="{{ $persediaan->id }}" class="{{ $persediaan->id_rekening }}"  id="{{ "persediaan-" . $i++ }}"> {{ $persediaan->name }} </option>
    @endforeach
</select>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Satuan</label>
  <input type="text" required name="satuan" class="form-control" id="exampleFormControlInput1" placeholder="Satuan" {{ old('satuan') }}>
</div>
<div class="mb-3 d-none">
  <label for="exampleFormControlInput1" class="form-label">status</label>
  <input type="text" value="available" required name="status" class="form-control" id="exampleFormControlInput1" placeholder="Satuan" {{ old('satuan') }}>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Harga</label>
  <input value="" type="number" required name="harga" class="form-control" id="exampleFormControlInput1" placeholder="Harga barang" {{ old('harga') }}>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
  <input value="" type="number" required name="jumlah" class="form-control" id="exampleFormControlInput1" placeholder="Jumlah barang" {{ old('harga') }}>
</div>
<input type="text" value="{{ $jumlah }}" id="jumlah" style="display: none">

<button type="submit" class="btn btn-primary">Simpan</button>



<script>
   function getPersediaan()
   {
     let rekening = document.getElementById("rekening")
     let jumlah = document.getElementById("jumlah")


     console.log(rekening.value)
     console.log(jumlah.value)

     for(let i = 1; i <= jumlah.value; i++){
        var id = "persediaan-" + i;
        var persediaan = document.getElementById(id);
        console.log(persediaan.value)

        if(persediaan.className == rekening.value){
          persediaan.style.display = "";
        }else{
          persediaan.style.display = "none";
        }
     }
   }
</script>