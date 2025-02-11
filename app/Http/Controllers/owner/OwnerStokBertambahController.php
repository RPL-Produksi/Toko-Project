<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerStokBertambahController extends Controller
{
    public function index() {
        $produk = Produk::all();
        $user = Auth::user();
        return view('pages.owner.stok-bertambah.index', compact('user', 'produk'));
    }
}
