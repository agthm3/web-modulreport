<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\PembelianBarangController;

Route::resource('master-barang', MasterBarangController::class);
Route::resource('pembelian-barang', PembelianBarangController::class);
Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
