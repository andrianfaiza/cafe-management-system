<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menu', MenuController::class);
Route::resource('tables', MejaController::class);
Route::resource('customers', PelangganController::class);
Route::resource('transactions', TransaksiController::class);
Route::post('/transactions/{transaksi}/done', [TransaksiController::class, 'done'])->name('transactions.done');