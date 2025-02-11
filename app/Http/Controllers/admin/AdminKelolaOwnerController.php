<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKelolaOwnerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $owner = User::where('role', 'owner')->get();
        return view('pages.admin.owner.index', compact('user', 'owner'));
    }
}
