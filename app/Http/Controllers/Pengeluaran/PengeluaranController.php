<?php

namespace App\Http\Controllers\Pengeluaran;

use App\Http\Controllers\Controller;
use App\Models\Penerimaan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\Rekening;
use App\Models\Persediaan;
use App\Services\PengeluaranService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class PengeluaranController extends Controller
{
    public function index(){
        $rekening = Rekening::all();
        $persediaan = Persediaan::all();
        $jumlah = Persediaan::all()->count();


        return view("pengeluaran.creates.pengeluaran" ,[
            "rekenings" => $rekening,
            "persediaans" => $persediaan,
            "jumlah" => $jumlah
        ]);
    }

    public function getPengeluaran(Request $request){
        $request->validate([
            "rekening" => "required",
            "id_persediaan" => "required"
        ]);

        $penerimaan = Penerimaan::where('id_persediaan', $request->id_persediaan)->where('status', 'available')->orderBy('id', 'asc')->get();
        $name = Penerimaan::where('id_persediaan', $request->id_persediaan)->first();
        return view('pengeluaran.creates.daftar-penerimaan', [
            "penerimaan" => $penerimaan,
            "name" => $name
        ]);
    }


    public function pakaiPenerimaan(Request $request){
        $request->validate([
            "id_penerimaan" => "required",
            "id_persediaan" => "required",
            "jumlah" => "required"
        ]);

        $pengeluaran = new PengeluaranService();
        $pengeluaran->pakaiPenerimaan($request);
        
        $penerimaan = Penerimaan::where('id_persediaan', $request->id_persediaan)->where('status', 'available')->orderBy('id', 'asc')->get();
        $name = Penerimaan::where('id_persediaan', $request->id_persediaan)->first();
        return view('pengeluaran.creates.daftar-penerimaan', [
            "penerimaan" => $penerimaan,
            "name" => $name
        ]);

    }

}
