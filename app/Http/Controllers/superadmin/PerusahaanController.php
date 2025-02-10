<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function index() {
        $perusahaan = Perusahaan::all();
        $user = Auth::user();
        return view('pages.superadmin.perusahaan.index', compact('user', 'perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'email' => 'required',
            'is_paid' => 'null',
        ]);

        Perusahaan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'nomor_telp' => $request->nomor_telp,
        ]);

        return redirect()->back()->with('notif', 'Perusahaan berhasil ditambahkan');
    }
}
