<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail;
use App\Models\Profil;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Detail::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.detailfaktur', compact('detail', 'barang', 'customer', 'profil'));
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
        $validator = Validator::make($request->all(), [
            'kode_faktur' => 'required',
            'barang_id' => 'required',
            'customer_id' => 'required',
            'diskon' => 'required', 
            'subtotal' => 'required', 
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('detail')->with('error', 'Gagal Tambah Barang Faktur');
        } else {
            Detail::create($request->all());
        }

        return redirect('detail')->with('success', 'Berhasil Tambah Barang Faktur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        $detail->delete();
        return redirect('detail')->with('success', 'Berhasil Menghapus Barang Faktur');
    }

    public function getHarga()
    {
        // Mengambil seluruh data yang ada dalam tabel barang
        $barang = Barang::all();

        // Setelah itu mengembalikannya dalam bentuk respon dan datanya dimuat dalam bentuk JSON
        return response()->json($barang);
    }

    public function getBarang($id)
    {
        // Mengambil seluruh data yang ada dalam tabel barang dengan kondisi idnya harus sama dengan id request
        $data = Barang::where('id', $id)->get();

         // Setelah itu mengembalikannya dalam bentuk respon dan datanya dimuat dalam bentuk JSON
        return response()->json($data);
    }
}
