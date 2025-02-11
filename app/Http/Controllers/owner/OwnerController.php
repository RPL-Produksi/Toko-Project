<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function dashboard() {
        $user = Auth::user();
        return view("pages.owner.dashboard", compact('user'));
    }
}
