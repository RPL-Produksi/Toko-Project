<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function dashboard() {
        $user = Auth::user();
        return view("pages.superadmin.dashboard", compact("user"));
    }
}
