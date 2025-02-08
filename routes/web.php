<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
});
