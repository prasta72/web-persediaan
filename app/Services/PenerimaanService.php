<?php  
namespace app\Services;

use App\Models\Penerimaan;
use App\Models\Pengeluaran;
use App\Models\Persediaan;
use App\Models\Saldo;
use App\Models\SaldoAkhir;
use App\Models\TotalPenerimaan;
use App\Models\TotalPengeluaran;
use Illuminate\Http\Request;

class PenerimaanService
{
    public function savePenerimaan(Request $request){
        Penerimaan::create([
            "id_persediaan" => $request->id_persediaan,
            "satuan" => $request->satuan,
            "harga" => $request->harga,
            "jumlah" => $request->jumlah,
            "status" => $request->status,
            "tanggal" => date("Y/m/d")
        ]);
        // total penerimaan ===================================================
        $total_penerimaan = TotalPenerimaan::where('id_persediaan', $request->id_persediaan)->first();

        if($total_penerimaan == null){
            TotalPenerimaan::create([
                'id_persediaan' => $request->id_persediaan,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga * $request->jumlah
            ]);
        }else{
            TotalPenerimaan::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $total_penerimaan->jumlah + $request->jumlah,
                'harga' => $total_penerimaan->harga + ($request->harga*$request->jumlah)
            ]);
            
        }

        // Saldo ==============================================================
        $saldo = Saldo::where('id_persediaan', $request->id_persediaan)->first();
        if($saldo == null){
            Saldo::create([
                'id_persediaan' => $request->id_persediaan,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga*$request->jumlah
            ]);
        }else{
            Saldo::where('id_persediaan', $request->id_persediaan)->update([
                'jumlah' => $saldo->jumlah + $request->jumlah,
                'harga' => $saldo->harga + ($request->harga*$request->jumlah)
            ]);
        }
        // total pengeluaran =========================================================================
        $total_pengeluaran = TotalPengeluaran::where('id_persediaan', $request->id_persediaan)->first();
        if($total_pengeluaran == null){
            TotalPengeluaran::create([
                'id_persediaan' => $request->id_persediaan,
                'jumlah' => 0,
                'harga' => 0
            ]);
        }
        $persediaan = Persediaan::where('id', $request->id_persediaan)->first();
        if($persediaan->total_harga == 0){
            $total_harga = $request->harga * $request->jumlah;
        }else{
            $total_harga = $persediaan->total_harga + ($request->harga * $request->jumlah);
        }

        if($persediaan->total_persediaan == 0){
            $total_persediaan = $request->jumlah;
        }else{
            $total_persediaan = $persediaan->total_persediaan + $request->jumlah;
        }
        Persediaan::where('id', $request->id_persediaan)->update([
            'id_rekening' => $persediaan->id_rekening,
            'name' => $persediaan->name,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'total_persediaan' => $total_persediaan,
            'total_harga' => $total_harga,
            'tanggal' => $persediaan->tanggal
        ]);
    }
}