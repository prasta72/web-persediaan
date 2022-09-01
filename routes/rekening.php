<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rekening\Rekening;

Route::middleware('auth')->prefix('rekening')->group(function() {
    Route::get('/tambah', [Rekening::class, 'index'])->name('rekening');
    Route::post('/import', [Rekening::class, 'importExcel'])->name('import');
});


?>