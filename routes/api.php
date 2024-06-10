<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\PelangganController;
use App\Http\Controllers\api\product\ProductController;
use App\Http\Controllers\api\UserController;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'prosesLogin']);

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::post('/retur', [ProductController::class, 'storeRetur']);
});

Route::prefix('/pelanggan')->group(function () {
    Route::get('/', [PelangganController::class, 'index']);
    Route::post('/', [PelangganController::class, 'store']);
});

Route::get('/user', [UserController::class, 'index']);
