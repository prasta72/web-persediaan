<?php
use App\Http\Controllers\Pengeluaran\PengeluaranController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('pengeluaran')->group(function(){
    Route::get('/tambah', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::post('/tambah/simpan', [PengeluaranController::class, 'getPengeluaran'])->name('tambah.pengeluaran.pilih');
    Route::post('/update/{id}', [PengeluaranController::class, 'updatePenerimaan'])->name('update.pengeluaran');
    Route::post('/pakai', [PengeluaranController::class, 'pakaiPenerimaan'])->name('pakai.penerimaan');
    
    
});

?>