<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\LevelHargaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\RekapPelangganController;
use App\Http\Controllers\ReturPenjualanController;
use App\Http\Controllers\SupplierController;
use App\Models\Pembelian;
use App\Http\Controllers\ProfileController;
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
        Route::get('/', [EtalaseController::class, 'index'])->name('etalase.index');
        Route::get('/produk/{id}', [EtalaseController::class, 'getProduk'])->name('etalase.getProduk');
        Route::get('/etalase/cari', [EtalaseController::class, 'search'])->name('etalase.search');
    });

    // penjualan route
    Route::prefix('penjualan')->group(function () {
        Route::get('/', [PenjualanController::class, 'index'])->name('penjualan');
        Route::get('levelharga/{id}', [PenjualanController::class, 'getLevelHarga'])->name('penjualan.getLevelHarga');
        Route::get('harga/{id}', [PenjualanController::class, 'getHarga'])->name('penjualan.getHarga');
        Route::get('/pelanggan', [PenjualanController::class, 'getPelanggan'])->name('penjualan.getPelanggan');
        Route::post('/', [PenjualanController::class, 'store'])->name('penjualan.store');
        Route::get('/data-penjualan', [PenjualanController::class, 'getDataPenjualan'])->name('penjualan.getDataPenjualan');
    });

    Route::prefix('pembelian')->group(function () {
        Route::get('/', [PembelianController::class, 'index'])->name('pembelian');
        Route::post('/', [PembelianController::class, 'store'])->name('pembelian.store');
    });

    // retur route
    Route::prefix('retur')->group(function () {
        Route::get('/', [ReturPenjualanController::class, 'index'])->name('retur');
    });

    // piutang route
    Route::prefix('piutang')->group(function () {
        Route::get('/', [PiutangController::class, 'index'])->name('piutang');
    });

    // kategori produk route
    Route::prefix('kategoriproduk')->group(function () {
        Route::get('/', [KategoriProdukController::class, 'index'])->name('kategoriproduk');
        Route::post('/', [KategoriProdukController::class, 'store'])->name('kategoriproduk.store');
        Route::put('/{id}', [KategoriProdukController::class, 'update'])->name('kategoriproduk.update');
        Route::delete('{id}', [KategoriProdukController::class, 'destroy'])->name('kategoriproduk.destroy');
    });

    //produk route
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk');
        Route::post('/', [ProdukController::class, 'store'])->name('produk.store');
        Route::put('/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });

    //stock produk route
    Route::prefix('stock')->group(function () {
        Route::get('/', [ProdukController::class, 'showStock'])->name('stock');
        Route::put('/{id}', [ProdukController::class, 'updateStock'])->name('stock.update');
    });

    // stock limit
    Route::get('/stocklimit', [ProdukController::class, 'stockLimit'])->name('stocklimit');

    // level harga
    Route::prefix('levelharga')->group(function () {
        Route::get('/', [LevelHargaController::class, 'index'])->name('levelharga');
        Route::post('/', [LevelHargaController::class, 'store'])->name('levelharga.store');
        Route::put('/{id}', [LevelHargaController::class, 'update'])->name('levelharga.update');
        Route::delete('{id}', [LevelHargaController::class, 'destroy'])->name('levelharga.destroy');
    });

    //pelanggan route
    Route::prefix('pelanggan')->group(function () {
        Route::get('/', [PelangganController::class, 'index'])->name('pelanggan');
        Route::post('/', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::put('/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::delete('{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    });

    //rekap pelanggan route
    Route::prefix('rekappelanggan')->group(function () {
        Route::get('/', [RekapPelangganController::class, 'index'])->name('rekappelanggan');
    });

    // operator route
    Route::prefix('operator')->group(function () {
        Route::get('/', [OperatorController::class, 'index'])->name('operator');
        Route::post('/', [OperatorController::class, 'store'])->name('operator.store');
        Route::put('/{id}', [OperatorController::class, 'update'])->name('operator.update');
        Route::delete('{id}', [OperatorController::class, 'destroy'])->name('operator.destroy');
    });

    // supplier route
    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('supplier');
        Route::post('/', [SupplierController::class, 'store'])->name('supplier.store');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    });

    //profile route
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        
    });

});
