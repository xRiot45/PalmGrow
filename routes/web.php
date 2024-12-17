<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProduksiController;
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

    // Pengguna (Admin)
    Route::prefix('/admin/pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
        Route::get('/tambah-pengguna', [PenggunaController::class, 'create'])->name('admin.pengguna.create');
        Route::post('/tambah-pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
        Route::get('/edit-pengguna/{id}', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
        Route::put('/edit-pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
        Route::delete('/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');
    });

    // Kebun (Admin)
    Route::prefix('/admin/kebun')->group(function () {
        Route::get('/', [KebunController::class, 'index'])->name('admin.kebun.index');
        Route::get('/tambah-kebun', [KebunController::class, 'create'])->name('admin.kebun.create');
        Route::post('/tambah-kebun', [KebunController::class, 'store'])->name('admin.kebun.store');
        Route::get('/edit-kebun/{id}', [KebunController::class, 'edit'])->name('admin.kebun.edit');
        Route::put('/edit-kebun/{id}', [KebunController::class, 'update'])->name('admin.kebun.update');
        Route::delete('/{id}', [KebunController::class, 'destroy'])->name('admin.kebun.destroy');
    });

    // Petugas (Admin)
    Route::prefix('/admin/petugas')->group(function () {
        Route::get('/', [PetugasController::class, 'index'])->name('admin.petugas.index');
        Route::get('/tambah-petugas', [PetugasController::class, 'create'])->name('admin.petugas.create');
        Route::post('/tambah-petugas', [PetugasController::class, 'store'])->name('admin.petugas.store');
        Route::get('/edit-petugas/{id}', [PetugasController::class, 'edit'])->name('admin.petugas.edit');
        Route::put('/edit-petugas/{id}', [PetugasController::class, 'update'])->name('admin.petugas.update');
        Route::delete('/{id}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');
    });

    // Produksi (Admin)
    Route::prefix('/admin/produksi')->group(function () {
        Route::get('/', [ProduksiController::class, 'index'])->name('admin.produksi.index');
        Route::get('/tambah-produksi', [ProduksiController::class, 'create'])->name('admin.produksi.create');
        Route::post('/tambah-produksi', [ProduksiController::class, 'store'])->name('admin.produksi.store');
        Route::get('/edit-produksi/{id}', [ProduksiController::class, 'edit'])->name('admin.produksi.edit');
        Route::put('/edit-produksi/{id}', [ProduksiController::class, 'update'])->name('admin.produksi.update');
        Route::delete('/{id}', [ProduksiController::class, 'destroy'])->name('admin.produksi.destroy');
    });

    // Distribusi (Admin)
    Route::prefix('/admin/distribusi')->group(function () {
        Route::get('/', [DistribusiController::class, 'index'])->name('admin.distribusi.index');
        Route::get('/tambah-distribusi', [DistribusiController::class, 'create'])->name('admin.distribusi.create');
        Route::post('/tambah-distribusi', [DistribusiController::class, 'store'])->name('admin.distribusi.store');
        Route::get('/edit-distribusi/{id}', [DistribusiController::class, 'edit'])->name('admin.distribusi.edit');
        Route::put('/edit-distribusi/{id}', [DistribusiController::class, 'update'])->name('admin.distribusi.update');
        Route::delete('/{id}', [DistribusiController::class, 'destroy'])->name('admin.distribusi.destroy');
    });

    // Laporan (Admin)
    Route::prefix('/admin/laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('admin.laporan.index');
        Route::get('/view-pdf/{id}', [LaporanController::class, 'view_pdf'])->name('admin.laporan.view_pdf');
        Route::get('/download-pdf/{id}', [LaporanController::class, 'download_pdf'])->name('admin.laporan.download_pdf');
        Route::get('/tambah-laporan', [LaporanController::class, 'create'])->name('admin.laporan.create');
        Route::post('/tambah-laporan', [LaporanController::class, 'store'])->name('admin.laporan.store');
        Route::get('/edit-laporan/{id}', [LaporanController::class, 'edit'])->name('admin.laporan.edit');
        Route::put('/edit-laporan/{id}', [LaporanController::class, 'update'])->name('admin.laporan.update');
        Route::delete('/{id}', [LaporanController::class, 'destroy'])->name('admin.laporan.destroy');
    });

    // Pembayaran (Admin)
    Route::prefix('/admin/pembayaran')->group(function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('admin.pembayaran.index');
        // Route::get('/view-file/{id}', [PembayaranController::class, 'view_file'])->name('admin.pembayaran.view_file');
        Route::get('/download-file/{id}', [PembayaranController::class, 'download_file'])->name('admin.pembayaran.download_file');
        Route::get('/tambah-pembayaran', [PembayaranController::class, 'create'])->name('admin.pembayaran.create');
        Route::post('/tambah-pembayaran', [PembayaranController::class, 'store'])->name('admin.pembayaran.store');
        Route::get('/edit-pembayaran/{id}', [PembayaranController::class, 'edit'])->name('admin.pembayaran.edit');
        Route::put('/edit-pembayaran/{id}', [PembayaranController::class, 'update'])->name('admin.pembayaran.update');
        Route::delete('/{id}', [PembayaranController::class, 'destroy'])->name('admin.pembayaran.destroy');
    });

    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
