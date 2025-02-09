<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('kasir')->group(function () {
    Route::inertia('/dashboard', 'Dashboard');
});
