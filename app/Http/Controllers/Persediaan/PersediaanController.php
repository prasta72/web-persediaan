<?php

namespace App\Http\Controllers\Persediaan;

use App\Http\Controllers\Controller;
use App\Models\Persediaan;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Services\PersediaanService;

class PersediaanController extends Controller
{
    public function index(){
        $rekening = Rekening::all();

        return view('persediaan.dashboard', ['rekenings' => $rekening]);
    }


    public function createPersediaan($id)
    {
     $rekening = Rekening::where('id', $id)->first();
     return view('persediaan.creates.persediaan', ["rekenings" => $rekening]);
    }


    
    public function savePersediaan(Request $request){
        $request->validate([
            "id_rekening" => "required",
            "name" => "required",
            "satuan" => "required",
            "harga" => "required",
            "jumlah" => "required"
        ]);

        $persediaan = new PersediaanService();
        $persediaan->savePersediaan($request);

        return Redirect::back()->with('status', "berhasil menambah persediaan");
      
    }



}
