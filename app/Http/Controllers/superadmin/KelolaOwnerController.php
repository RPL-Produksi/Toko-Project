<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelolaOwnerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userShow = User::where('role', 'owner')->get();
        return view('pages.superadmin.owner.index', compact('user', 'userShow'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $request->id,
            'nomor_telp' => 'required|string|max:15|unique:users,nomor_telp,' . $request->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:superadmin,admin,owner,kasir',
        ]);

        $user = User::updateOrCreate(
            ['id' => $request->id], // Kondisi pencarian
            [
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'nomor_telp' => $request->nomor_telp,
                'password' => bcrypt($request->password),
                'role' => 'owner',
            ]
        );

       
    

        return redirect()->back()->with('success', 'Owner berhasil disimpan');
    }
}
