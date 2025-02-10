<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\superadmin\SuperAdminController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [AuthController::class,'index'])->name('index');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['auth'])->group(function () { 
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::prefix('kasir')->group(function () {
        Route::inertia('/dashboard', 'Dashboard');
    });
});


