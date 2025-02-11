<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKelolaKasirController extends Controller
{
    public function index() {
        $user = Auth::user();
        $kasir = User::where('role', 'kasir')->get();

        return view('pages.admin.kasir.index', compact('user','kasir'));
    }
}
