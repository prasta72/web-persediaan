<?php

use App\Http\Controllers\Penerimaan\PenerimaanController;
use App\Http\Controllers\Persediaan\PersediaanController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('persediaan')->group(function() {
    Route::get('/tambah', [PersediaanController::class, 'index'])->name('persediaan');
    Route::get('/tambah/{id}', [PersediaanController::class, 'createPersediaan'])->name('tambah.persediaan');
    Route::post('/tambah/simpan', [PersediaanController::class, 'savePersediaan'])->name('tambah.persediaan.simpan');
});








?>