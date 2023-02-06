<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        $lokal = DB::table('penjualans')->select('*')->where('jenis', 0)->sum('jumlah');
        $inter = DB::table('penjualans')->select('*')->where('jenis', 1)->sum('jumlah');
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.penjualan', compact('penjualan', 'profil', 'lokal', 'inter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect('penjualan')->with('success', 'Berhasil Hapus Data Penjualan');
    }

    public function status(Penjualan $penjualan)
    {
        if ($penjualan->status == 'Belum Lunas') {
            $penjualan->update([
                'status' => 'Lunas',
            ]);
        } else {
            $penjualan->update([
                'status' => 'Belum Lunas',
            ]);
        }
        return redirect('penjualan');
    }
}
