<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\persediaan\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Persediaan\PersediaanController;
use App\Http\Controllers\Rekening\Rekening;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/export', [ExportController::class, 'exportPdf'])->name('persediaan.export-pdf');
require __DIR__ . "/persediaan.php";
require __DIR__ . "/penerimaan.php";
require __DIR__ . "/pengeluaran.php";
require __DIR__ . "/rekening.php";