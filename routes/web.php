<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\kasir\DashboardController as KasirDashboardController;
use App\Http\Controllers\kasir\KategoriController as KasirKategoriController;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\superadmin\KelolaOwnerController;
use App\Http\Controllers\superadmin\PerusahaanController;
use App\Http\Controllers\superadmin\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('kasir')->group(function () {
    Route::get('/dashboard', [KasirDashboardController::class, 'index']);
    Route::get('/kategori', [KasirKategoriController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');

    Route::prefix('superadmin')->group(function () {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
        Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
        Route::post('/store/perusahaan', [PerusahaanController::class, 'store'])->name('store.perusahaan');
        Route::post('/store/owner', [KelolaOwnerController::class, 'store'])->name('store.owner');
        Route::get('/delete/perusahaan/{id}', [PerusahaanController::class, 'delete'])->name('delete.perusahaan');
        Route::get('/kelola/owner', [KelolaOwnerController::class, 'index'])->name('owner');
    });
});
