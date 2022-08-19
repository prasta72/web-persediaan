<?php 
namespace app\Services;

use App\Models\Penerimaan;
use App\Models\Persediaan;
use Illuminate\Http\Request;


class PengeluaranService
{
    public function pakaiPenerimaan(Request $request){
        $request->validate([
            "id_penerimaan" => "required",
            "id_persediaan" => "required",
            "jumlah" => "required"
        ]);

        $penerimaan = Penerimaan::where('id', $request->id_penerimaan)->first();
        $persediaan = Persediaan::where('id', $request->id_persediaan)->first();
        if($request->jumlah == $penerimaan->jumlah){
            Penerimaan::where("id", $request->id_penerimaan)->update([
                "jumlah" => 0,
                "status" => "not available",
            ]);
            Persediaan::where("id", $request->id_persediaan)->update([
                "total_persediaan" => 0,
            ]);


        }
    }


}

?>