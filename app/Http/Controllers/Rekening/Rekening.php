<?php

namespace App\Http\Controllers\Rekening;
use App\Http\Controllers\Controller;
use App\Imports\RekeningImport;
use App\Models\Pengeluaran;
use App\Models\Rekening as ModelsRekening;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// import data
        Excel::import(new RekeningImport, $request->file('file')->store('temp'));
	
		return back()->with('status', 'berhasil mengimport file');
    }
}
