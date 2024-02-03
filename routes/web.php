<?php

use App\Http\Controllers\EtiquetaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('etiquetas');
});


Route::get('/import', [EtiquetaController::class,"index"]);
Route::post('/import', [EtiquetaController::class,"import"]);
Route::get('/export', [EtiquetaController::class,"export"]);
Route::get('/exportar-pdf', [EtiquetaController::class, 'generarPDF'])->name('exportar-pdf');
Route::get('/pruebaVista', [EtiquetaController::class, 'pruebaVista'])->name('pruebaVista');