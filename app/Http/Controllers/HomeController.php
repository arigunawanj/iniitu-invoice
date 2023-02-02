<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Profil;
use App\Models\Customer;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = Customer::all()->count();
        $barang = Barang::all()->count();
        $penjualan = Penjualan::all()->sum('jumlah');
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('home', compact('customer', 'barang', 'penjualan', 'profil'));
    }
}
