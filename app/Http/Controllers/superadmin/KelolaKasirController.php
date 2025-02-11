<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaKasirController extends Controller
{
    public function index() {
        $user = Auth::user();
        $kasir = User::where('role', 'kasir')->get();

        return view('pages.superadmin.kasir.index', compact('user','kasir'));
    }
}
