<?php  
namespace app\Services;

use App\Models\Penerimaan;
use App\Models\Persediaan;
use App\Models\SaldoAkhir;
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

        SaldoAkhir::create([
            'id_persediaan' => $request->id_persediaan,
        ]);

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