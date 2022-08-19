<?php 
use App\Http\Controllers\Penerimaan\PenerimaanController;
use App\Http\Controllers\Persediaan\PersediaanController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('penerimaan')->group(function() {
    Route::get('/tambah', [PenerimaanController::class, 'index'])->name('penerimaan');
    Route::post('/tambah/simpan', [PenerimaanController::class, 'savePenerimaan'])->name('tambah.penerimaan.simpan');
});


?>



