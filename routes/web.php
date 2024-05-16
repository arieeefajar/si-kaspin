<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\ReturPenjualanController;
use App\Http\Controllers\SupplierController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/prosesLogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // etalase route
    Route::prefix('etalase')->group(function () {
        Route::get('/', [EtalaseController::class, 'index'])->name('etalase');
    });

    // penjualan route
    Route::prefix('penjualan')->group(function () {
        Route::get('/', [PenjualanController::class, 'index'])->name('penjualan');
    });

    // retur route
    Route::prefix('retur')->group(function () {
        Route::get('/', [ReturPenjualanController::class, 'index'])->name('retur');
    });

    // piutang route
    Route::prefix('piutang')->group(function () {
        Route::get('/', [PiutangController::class, 'index'])->name('piutang');
    });

    // operator route
    Route::prefix('operator')->group(function () {
        Route::get('/', [OperatorController::class, 'index'])->name('operator');
        Route::post('/', [OperatorController::class, 'store'])->name('operator.store');
        Route::put('/{id}', [OperatorController::class, 'update'])->name('operator.update');
        Route::delete('{id}', [OperatorController::class, 'destroy'])->name('operator.destroy');
    });

    // supplier route
    Route::prefix('supplier')->group(function (){
        Route::get('/', [SupplierController::class, 'index'])->name('supplier');
        Route::post('/', [SupplierController::class, 'store'])->name('supplier.store');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    });
});
