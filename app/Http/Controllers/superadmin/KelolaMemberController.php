<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaMemberController extends Controller
{
    public function index() {
        $user = Auth::user();
        $member = User::where('role', 'member')->get();
        return view('pages.superadmin.member.index', compact('user','member'));
    }
}
