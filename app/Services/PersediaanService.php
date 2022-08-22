<?php 
namespace app\Services;

use App\Models\Persediaan;
use App\Models\SaldoAkhir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PersediaanService
{
    public function savePersediaan(Request $request){
        Persediaan::create([
            'id_rekening' => $request->id_rekening,
            'name' => $request->name,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'total_persediaan' => $request->jumlah,
            'total_harga' => $request->harga * $request->jumlah,
            'tanggal' => date("Y/m/d")
        ]);
        
    }
}



?>