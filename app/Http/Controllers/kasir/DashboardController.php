<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::query();

        if ($request->has('kategori') && $request->kategori != 'Semua') {
            $produk->where('kategori_id', $request->kategori);
        }

        if ($request->has('search')) {
            $produk->where('nama', 'like', '%' . $request->search . '%');
        }

        return Inertia::render('Dashboard', [
            'produk' => $produk->get(),
        ]);
    }
}
