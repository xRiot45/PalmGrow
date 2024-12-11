<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;
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
    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/admin/pengguna/tambah-pengguna', [PenggunaController::class, 'create'])->name('admin.pengguna.create');
    Route::post('/admin/pengguna/tambah-pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
    Route::get('/admin/pengguna/edit-pengguna/{id}', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/admin/pengguna/edit-pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
    Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');

    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
