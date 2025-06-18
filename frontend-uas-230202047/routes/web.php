<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');

});

    Route::get('/obat',[ObatController::class,'index'])->name('Obat');
    Route::get('/pasien',[ObatController::class,'index'])->name('Pasien');

    Route::post('/obat',[ObatController::class,'index'])->name('Obat');
    Route::get('/pasien',[ObatController::class,'index'])->name('Pasien');



Route::get('/obat', [obatController::class, 'index']);
    Route::get('/obat/create', [obatController::class, 'create']);
    Route::post('/obat', [obatController::class, 'store']);
    Route::get('/obat/{npm}/edit', [obatController::class, 'edit']);
    Route::put('/obat/{npm}', [obatController::class, 'update']);
    Route::delete('/obat/{npm}', [obatController::class, 'destroy']);
