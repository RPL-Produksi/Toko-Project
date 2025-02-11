<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        $user = Auth::user();
        return view('pages.superadmin.perusahaan.index', compact('user', 'perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telp' => 'required|integer',
            'email' => 'required|email',
            'is_paid' => 'nullable',
        ]);

        Perusahaan::updateOrCreate(
            ['email' => $request->email],
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'nomor_telp' => $request->nomor_telp,
                'is_paid' => $request->is_paid ?? 0,
            ]
        );

        return redirect()->back()->with('success', 'Perusahaan berhasil disimpan');
    }

    public function delete($id) {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->back()->with('success', 'Perusahaan berhasil di hapus');
    }
}
