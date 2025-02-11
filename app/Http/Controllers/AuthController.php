<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view("pages.auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->only('username', 'password');

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role == 'owner') {
                return redirect()->route('owner.dashboard');
            } 
        }
        return redirect()->back()->with('notif', 'Username atau password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
