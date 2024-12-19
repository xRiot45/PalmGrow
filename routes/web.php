<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DistribusiController as AdminDistribusiController;
use App\Http\Controllers\Admin\KategoriPanenController as AdminKategoriPanenController;
use App\Http\Controllers\Admin\KebunController as AdminKebunController;
use App\Http\Controllers\Admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PenggunaController as AdminPenggunaController;
use App\Http\Controllers\Admin\PetugasController as AdminPetugasController;
use App\Http\Controllers\Admin\ProduksiController as AdminProduksiController;

use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\LaporanController as PetugasLaporanController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

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
    // Route Admin
    Route::group(['prefix' => '/admin', 'middleware' => RoleMiddleware::class . ':Admin'], function () {
        // Dashboard Route
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

        // Pengguna (Admin)
        Route::prefix('/pengguna')->group(function () {
            Route::get('/', [AdminPenggunaController::class, 'index'])->name('admin.pengguna.index');
            Route::get('/tambah-pengguna', [AdminPenggunaController::class, 'create'])->name('admin.pengguna.create');
            Route::post('/tambah-pengguna', [AdminPenggunaController::class, 'store'])->name('admin.pengguna.store');
            Route::get('/edit-pengguna/{id}', [AdminPenggunaController::class, 'edit'])->name('admin.pengguna.edit');
            Route::put('/edit-pengguna/{id}', [AdminPenggunaController::class, 'update'])->name('admin.pengguna.update');
            Route::delete('/{id}', [AdminPenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');
        });

        // Kebun (Admin)
        Route::prefix('/kebun')->group(function () {
            Route::get('/', [AdminKebunController::class, 'index'])->name('admin.kebun.index');
            Route::get('/tambah-kebun', [AdminKebunController::class, 'create'])->name('admin.kebun.create');
            Route::post('/tambah-kebun', [AdminKebunController::class, 'store'])->name('admin.kebun.store');
            Route::get('/edit-kebun/{id}', [AdminKebunController::class, 'edit'])->name('admin.kebun.edit');
            Route::put('/edit-kebun/{id}', [AdminKebunController::class, 'update'])->name('admin.kebun.update');
            Route::delete('/{id}', [AdminKebunController::class, 'destroy'])->name('admin.kebun.destroy');
        });

        // Petugas (Admin)
        Route::prefix('/petugas')->group(function () {
            Route::get('/', [AdminPetugasController::class, 'index'])->name('admin.petugas.index');
            Route::get('/tambah-petugas', [AdminPetugasController::class, 'create'])->name('admin.petugas.create');
            Route::post('/tambah-petugas', [AdminPetugasController::class, 'store'])->name('admin.petugas.store');
            Route::get('/edit-petugas/{id}', [AdminPetugasController::class, 'edit'])->name('admin.petugas.edit');
            Route::put('/edit-petugas/{id}', [AdminPetugasController::class, 'update'])->name('admin.petugas.update');
            Route::delete('/{id}', [AdminPetugasController::class, 'destroy'])->name('admin.petugas.destroy');
        });

        // Produksi (Admin)
        Route::prefix('/produksi')->group(function () {
            Route::get('/', [AdminProduksiController::class, 'index'])->name('admin.produksi.index');
            Route::get('/tambah-produksi', [AdminProduksiController::class, 'create'])->name('admin.produksi.create');
            Route::post('/tambah-produksi', [AdminProduksiController::class, 'store'])->name('admin.produksi.store');
            Route::get('/edit-produksi/{id}', [AdminProduksiController::class, 'edit'])->name('admin.produksi.edit');
            Route::put('/edit-produksi/{id}', [AdminProduksiController::class, 'update'])->name('admin.produksi.update');
            Route::delete('/{id}', [AdminProduksiController::class, 'destroy'])->name('admin.produksi.destroy');
        });

        // Distribusi (Admin)
        Route::prefix('/distribusi')->group(function () {
            Route::get('/', [AdminDistribusiController::class, 'index'])->name('admin.distribusi.index');
            Route::get('/tambah-distribusi', [AdminDistribusiController::class, 'create'])->name('admin.distribusi.create');
            Route::post('/tambah-distribusi', [AdminDistribusiController::class, 'store'])->name('admin.distribusi.store');
            Route::get('/edit-distribusi/{id}', [AdminDistribusiController::class, 'edit'])->name('admin.distribusi.edit');
            Route::put('/edit-distribusi/{id}', [AdminDistribusiController::class, 'update'])->name('admin.distribusi.update');
            Route::delete('/{id}', [AdminDistribusiController::class, 'destroy'])->name('admin.distribusi.destroy');
        });

        // Laporan (Admin)
        Route::prefix('/laporan')->group(function () {
            Route::get('/', [AdminLaporanController::class, 'index'])->name('admin.laporan.index');
            Route::get('/view-pdf/{id}', [AdminLaporanController::class, 'view_pdf'])->name('admin.laporan.view_pdf');
            Route::get('/download-pdf/{id}', [AdminLaporanController::class, 'download_pdf'])->name('admin.laporan.download_pdf');
            Route::get('/tambah-laporan', [AdminLaporanController::class, 'create'])->name('admin.laporan.create');
            Route::post('/tambah-laporan', [AdminLaporanController::class, 'store'])->name('admin.laporan.store');
            Route::get('/edit-laporan/{id}', [AdminLaporanController::class, 'edit'])->name('admin.laporan.edit');
            Route::put('/edit-laporan/{id}', [AdminLaporanController::class, 'update'])->name('admin.laporan.update');
            Route::delete('/{id}', [AdminLaporanController::class, 'destroy'])->name('admin.laporan.destroy');
        });

        // Pembayaran (Admin)
        Route::prefix('/pembayaran')->group(function () {
            Route::get('/', [AdminPembayaranController::class, 'index'])->name('admin.pembayaran.index');
            Route::get('/download-file/{id}', [AdminPembayaranController::class, 'download_file'])->name('admin.pembayaran.download_file');
            Route::get('/tambah-pembayaran', [AdminPembayaranController::class, 'create'])->name('admin.pembayaran.create');
            Route::post('/tambah-pembayaran', [AdminPembayaranController::class, 'store'])->name('admin.pembayaran.store');
            Route::get('/edit-pembayaran/{id}', [AdminPembayaranController::class, 'edit'])->name('admin.pembayaran.edit');
            Route::put('/edit-pembayaran/{id}', [AdminPembayaranController::class, 'update'])->name('admin.pembayaran.update');
            Route::delete('/{id}', [AdminPembayaranController::class, 'destroy'])->name('admin.pembayaran.destroy');
        });

        // Kategori Panen (Admin)
        Route::prefix('/kategori-panen')->group(function () {
            Route::get('/', [AdminKategoriPanenController::class, 'index'])->name('admin.kategori-panen.index');
            Route::get('/tambah-kategori-panen', [AdminKategoriPanenController::class, 'create'])->name('admin.kategori-panen.create');
            Route::post('/tambah-kategori-panen', [AdminKategoriPanenController::class, 'store'])->name('admin.kategori-panen.store');
            Route::get('/edit-kategori-panen/{id}', [AdminKategoriPanenController::class, 'edit'])->name('admin.kategori-panen.edit');
            Route::put('/edit-kategori-panen/{id}', [AdminKategoriPanenController::class, 'update'])->name('admin.kategori-panen.update');
            Route::delete('/{id}', [AdminKategoriPanenController::class, 'destroy'])->name('admin.kategori-panen.destroy');
        });
    });

    // Route Petugas Kebun
    Route::group(['prefix' => '/petugas', 'middleware' => RoleMiddleware::class . ':Petugas Kebun'], function () {
        Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard.index');

        // Laporan
        Route::prefix('/laporan')->group(function () {
            Route::get('/', [PetugasLaporanController::class, 'index'])->name('petugas.laporan.index');
        });
    });
});
