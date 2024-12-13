<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;

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

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    // Dashboard Route
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // Pengguna Route
    Route::prefix('/admin/pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
        Route::get('/tambah-pengguna', [PenggunaController::class, 'create'])->name('admin.pengguna.create');
        Route::post('/tambah-pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
        Route::get('/edit-pengguna/{id}', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
        Route::put('/edit-pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
        Route::delete('/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');
    });

    // Kebun
    Route::prefix('/admin/kebun')->group(function () {
        Route::get('/', [KebunController::class, 'index'])->name('admin.kebun.index');
        Route::get('/tambah-kebun', [KebunController::class, 'create'])->name('admin.kebun.create');
        Route::post('/tambah-kebun', [KebunController::class, 'store'])->name('admin.kebun.store');
        Route::get('/edit-kebun/{id}', [KebunController::class, 'edit'])->name('admin.kebun.edit');
        Route::put('/edit-kebun/{id}', [KebunController::class, 'update'])->name('admin.kebun.update');
        Route::delete('/{id}', [KebunController::class, 'destroy'])->name('admin.kebun.destroy');
    });

    // Petugas
    Route::prefix('/admin/petugas')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('admin.petugas.index');
        Route::get('/tambah-petugas', [PetugasController::class, 'create'])->name('admin.petugas.create');
        Route::post('/tambah-petugas', [PetugasController::class, 'store'])->name('admin.petugas.store');
        Route::get('/edit-petugas/{id}', [PetugasController::class, 'edit'])->name('admin.petugas.edit');
        Route::put('/edit-petugas/{id}', [PetugasController::class, 'update'])->name('admin.petugas.update');
        Route::delete('/{id}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');
    });

    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
