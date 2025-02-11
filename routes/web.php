<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminKelolaKasirController;
use App\Http\Controllers\admin\AdminKelolaOwnerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\owner\OwnerChartController;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\owner\OwnerStokBertambahController;
use App\Http\Controllers\owner\OwnerStokTerjualController;
use App\Http\Controllers\superadmin\KelolaAdminController;
use App\Http\Controllers\superadmin\KelolaKasirController;
use App\Http\Controllers\superadmin\KelolaMemberController;
use App\Http\Controllers\superadmin\KelolaOwnerController;
use App\Http\Controllers\superadmin\PerusahaanController;
use App\Http\Controllers\superadmin\SuperAdminController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [AuthController::class,'index'])->name('index');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function () { 
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    
    Route::prefix('owner')->group(function () {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
        Route::get('/chart', [OwnerChartController::class, 'index'])->name('owner.chart');
        Route::get('/stok/terjual', [OwnerStokTerjualController::class, 'index'])->name('owner.stok.terjual');
        Route::get('/stok/bertambah', [OwnerStokBertambahController::class, 'index'])->name('owner.stok.bertambah');
    });

    Route::prefix('superadmin')->group(function() {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
        Route::post('/store/perusahaan', [PerusahaanController::class, 'store'])->name('store.perusahaan');
        Route::post('/store/owner', [KelolaOwnerController::class, 'store'])->name('store.owner');
        Route::get('/delete/perusahaan/{id}', [PerusahaanController::class, 'delete'])->name('delete.perusahaan');
        Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('kelola.perusahaan');
        Route::get('/kelola/owner', [KelolaOwnerController::class, 'index'])->name('kelola.owner');
        Route::get('/kelola/admin', [KelolaAdminController::class, 'index'])->name('kelola.admin');
        Route::get('/kelola/kasir', [KelolaKasirController::class, 'index'])->name('kelola.kasir');
        Route::get('/kelola/member', [KelolaMemberController::class, 'index'])->name('kelola.member');
    });
    
    Route::prefix('admin')->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/kelola/kasir', [AdminKelolaKasirController::class, 'index'])->name('admin.kelola.kasir');
        Route::get('/kelola/owner', [AdminKelolaOwnerController::class, 'index'])->name('admin.kelola.owner');
    });

    Route::prefix('kasir')->group(function () {
        Route::inertia('/dashboard', 'Dashboard');
    });
});


