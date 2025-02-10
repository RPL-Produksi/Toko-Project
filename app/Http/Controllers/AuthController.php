<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only('username', 'password');

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'superamdin') {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role == 'owner') {
                return redirect()->route('owner.dashboard');
            } 
        }
        return redirect()->back()->with('error', 'Username atau password salah!');
    }
}
