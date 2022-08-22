<?php 
namespace app\Services;

use App\Models\Penerimaan;
use App\Models\Persediaan;
use App\Models\SaldoAkhir;
use Illuminate\Http\Request;


class PengeluaranService
{
    public function pakaiPenerimaan(Request $request){
        $penerimaan = Penerimaan::where('id', $request->id_penerimaan)->first();
        $persediaan = Persediaan::where('id', $request->id_persediaan)->first();
        if($request->jumlah == $penerimaan->jumlah){
            Penerimaan::where("id", $request->id_penerimaan)->update([
                "jumlah" => 0,
                "status" => "not available",
            ]);

            SaldoAkhir::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $persediaan->total_persediaan - $request->jumlah,
                'harga' => $persediaan->total_harga - ($penerimaan->harga * $penerimaan->jumlah)
            ]);
        }else {
            Penerimaan::where("id", $request->id_penerimaan)->update([
                "jumlah" => $penerimaan->jumlah - $request->jumlah,
            ]);

            SaldoAkhir::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $persediaan->total_persediaan - $request->jumlah,
                'harga' => $persediaan->total_harga - ($penerimaan->harga * $request->jumlah)
            ]);
        }
    }


}

?>