<?php

namespace App\Http\Controllers\Penerimaan;

use App\Http\Controllers\Controller;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use App\Models\Rekening;
use App\Models\Persediaan;
use App\Services\PenerimaanService;
use Illuminate\Support\Facades\Redirect;

class PenerimaanController extends Controller
{
  
   public function index(){
      $rekening = Rekening::all();
      $persediaan = Persediaan::all();
      $jumlah = Persediaan::all()->count();
      $penerimaan = Penerimaan::all();

      return view('penerimaan.creates.penerimaan', [
         "rekenings" => $rekening,
         "persediaans" => $persediaan,
         "jumlah" => $jumlah,
         "penerimaan" =>$penerimaan
      ]);

   }


   public function savePenerimaan(Request $request)
   {
      $request->validate([
         "id_persediaan" => "required",
         "satuan" => "required",
         "jumlah" => "required",
         "harga" => "required",
      ]);

      $penerimaan = new PenerimaanService();
      $penerimaan->savePenerimaan($request);

      return Redirect::back()->with('status', 'berhasil menambah perimaan barang');



   }

 
}
