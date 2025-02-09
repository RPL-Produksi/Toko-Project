<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\owner\OwnerController;
use App\Http\Controllers\superadmin\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::prefix('kasir')->group(function () {
    Route::inertia('/dashboard', 'Dashboard');
});

Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
