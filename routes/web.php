<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\PenjualanController;
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
    Route::get('/', [LoginController::class , 'index'])->name('login');
    Route::post('/prosesLogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('etalase')->group(function () {
        Route::get('/',[EtalaseController::class, 'index'])->name('etalase');
    });

    Route::prefix('penjualan')->group(function () {
        Route::get('/', [PenjualanController::class, 'index'])->name('penjualan');
    });
});