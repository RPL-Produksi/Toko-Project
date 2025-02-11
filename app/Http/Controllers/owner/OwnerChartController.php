<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerChartController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages.owner.chart.index', compact('user'));
    }
}
