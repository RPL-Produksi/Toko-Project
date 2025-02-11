<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaOwnerController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userShow = User::where('role', 'owner')->get();
        return view('pages.superadmin.owner.index', compact('user', 'userShow'));
    }
}
