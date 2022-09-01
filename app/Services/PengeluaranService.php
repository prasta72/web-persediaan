<?php 
namespace app\Services;

use App\Models\Penerimaan;
use App\Models\Pengeluaran;
use App\Models\Persediaan;
use App\Models\Saldo;
use App\Models\SaldoAkhir;
use App\Models\TotalPengeluaran;
use Illuminate\Http\Request;


class PengeluaranService
{
    public function pakaiPenerimaan(Request $request){
        $penerimaan = Penerimaan::where('id', $request->id_penerimaan)->first();
        $saldo = Saldo::where('id', $request->id_persediaan)->first();
        Pengeluaran::create([
            'id_persediaan' => $request->id_persediaan,
            'satuan' => $penerimaan->satuan,
            'jumlah' => $request->jumlah,
            'harga' => $request->jumlah * $penerimaan->harga,
            'tanggal' => date("Y/m/d")
        ]);
        //==========total Pengeluaran===========
        $total_pengeluaran = TotalPengeluaran::where('id_persediaan', $request->id_persediaan)->first();
        if($total_pengeluaran->jumlah == null){
            TotalPengeluaran::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $request->jumlah,
                'harga' => $request->jumlah * $penerimaan->harga
            ]);
        }else{
            TotalPengeluaran::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $total_pengeluaran->jumlah + $request->jumlah,
                'harga' => $total_pengeluaran->harga + ($request->jumlah * $penerimaan->harga)
            ]);
        }
       //========================================
        if($request->jumlah == $penerimaan->jumlah){
            Penerimaan::where("id", $request->id_penerimaan)->update([
                "jumlah" => 0,
                "status" => "not available",
            ]);

            Saldo::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $saldo->jumlah - $request->jumlah,
                'harga' => $saldo->harga - ($penerimaan->harga * $request->jumlah)
            ]);
            
        }else {
            Penerimaan::where("id", $request->id_penerimaan)->update([
                "jumlah" => $penerimaan->jumlah - $request->jumlah,
            ]);

            Saldo::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $saldo->jumlah - $request->jumlah,
                'harga' => $saldo->harga - ($penerimaan->harga * $request->jumlah)
            ]);
        }
    }


}

?>