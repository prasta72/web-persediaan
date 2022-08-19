
<select class="form-select mb-3" aria-label="Default select example" name="rekening" onchange="getPersediaan()" id="rekening">
    <option >Pilih Rekening</option>
    @foreach ($rekenings as $rekening)
        <option value="{{ $rekening->id }}"> {{ $rekening->rekening . "-" . $rekening->uraian }} </option>
    @endforeach
</select>
<select class="form-select mb-3" aria-label="Default select example" name="id_persediaan" id="persediaan">
  <option selected>Pilih Persediaan</option>
    @php
        $i = 1;
    @endphp
    @foreach ($persediaans as $persediaan)
        <option value="{{ $persediaan->id }}" class="{{ $persediaan->id_rekening }}"  id="{{ "persediaan-" . $i++ }}"> {{ $persediaan->name }} </option>
    @endforeach
</select>

<input class="mb-2" type="text" value="{{ $jumlah }}" id="jumlah" style="display: none">

<button type="submitmt-2" class="btn btn-primary">Pilih</button>



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