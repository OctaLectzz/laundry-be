<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisLayananController;

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


// ---AUTHENTICATION--- //
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/profile', 'profile')->middleware('auth:sanctum');
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
});

// ---USER--- //
Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{user}', 'show');
    Route::post('/', 'store');
    Route::put('/{user}', 'update');
    Route::delete('/{user}', 'destroy');
});

// ---KARYAWAN--- //
Route::prefix('karyawan')->controller(KaryawanController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{karyawan}', 'show');
    Route::post('/', 'store');
    Route::put('/{karyawan}', 'update');
    Route::delete('/{karyawan}', 'destroy');
});

// ---BARANG--- //
Route::prefix('barang')->controller(BarangController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{barang}', 'show');
    Route::post('/', 'store');
    Route::put('/{barang}', 'update');
    Route::delete('/{barang}', 'destroy');
});

// ---JENIS LAYANAN--- //
Route::prefix('jenislayanan')->controller(JenisLayananController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{jenislayanan}', 'show');
    Route::post('/', 'store');
    Route::put('/{jenislayanan}', 'update');
    Route::delete('/{jenislayanan}', 'destroy');
});

// ---PELANGGAN--- //
Route::prefix('pelanggan')->controller(PelangganController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{pelanggan}', 'show');
    Route::post('/', 'store');
    Route::put('/{pelanggan}', 'update');
    Route::delete('/{pelanggan}', 'destroy');
});

// ---NOTA--- //
Route::prefix('nota')->controller(NotaController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{nota}', 'show');
    Route::post('/', 'store');
    Route::put('/{nota}', 'update');
    Route::delete('/{nota}', 'destroy');
});
