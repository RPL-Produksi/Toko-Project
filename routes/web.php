<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\superadmin\KelolaOwnerController;
use App\Http\Controllers\superadmin\PerusahaanController;
use App\Http\Controllers\superadmin\SuperAdminController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [AuthController::class,'index'])->name('index');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function () { 
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    
    Route::prefix('superadmin')->group(function() {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
        Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
        Route::post('/storePerusahaan', [PerusahaanController::class, 'store'])->name('store.perusahaan');
        Route::get('/delete/perusahaan/{id}', [PerusahaanController::class, 'delete'])->name('delete.perusahaan');
        Route::get('/kelola/owner', [KelolaOwnerController::class, 'index'])->name('owner');
    });

    Route::prefix('kasir')->group(function () {
        Route::inertia('/dashboard', 'Dashboard');
    });
});


