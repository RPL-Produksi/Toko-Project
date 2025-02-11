<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaAdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        $admin = User::where('role', 'admin')->get();
        return view('pages.superadmin.admin.index', compact('user','admin'));
    }
}
