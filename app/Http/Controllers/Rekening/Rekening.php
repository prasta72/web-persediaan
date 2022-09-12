<?php

namespace App\Http\Controllers\Rekening;
use App\Http\Controllers\Controller;
use App\Imports\RekeningImport;
use App\Models\Pengeluaran;
use App\Models\Rekening as ModelsRekening;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class Rekening extends Controller
{
    public function index(){
        $rekening = ModelsRekening::all();

        return view('rekening.rekening', [
            'rekenings' => $rekening
        ]);
    }

    public function importExcel(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');

        Excel::import(new RekeningImport, $request->file('file')->store('temp'));
	
		return back()->with('status', 'berhasil mengimport file');
    }

    public function simpanRekening(Request $request){
        $this->validate($request,[
            'rekening' => 'required',
            'rekening_dua' => 'required',
            'uraian' => 'required'
        ]);
        try {
            ModelsRekening::create([
                'rekening' => $request->rekening,
                'rekening_dua' => $request->rekening_dua,
                'uraian' =>$request->uraian
            ]);
            return back()->with('status', 'berhasil menambah rekening');
        } catch (Throwable $e){
            report($e);
            return false;
        }
       




    }
}
