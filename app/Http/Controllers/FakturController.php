<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail;
use App\Models\Faktur;
use App\Models\Profil;
use App\Models\Customer;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faktur = Faktur::all();
        $customer = Customer::all();
        $barang = Barang::all();
        $detail = Detail::all();
        $dfaktur = $detail->unique('kode_faktur');
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.faktur', compact('faktur', 'customer', 'barang', 'detail', 'dfaktur', 'profil'));
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
            'kode_faktur' => 'required|unique:fakturs',
            'tanggal_faktur' => 'required',
            'customer_id' => 'required',
            'ket_faktur' => 'required',
            'total' => 'required',
            'charge' => 'required',
            'total_final' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('faktur')->with('error', 'Gagal Menyimpan Data');
        } else {
            $data = $request->all();
            Faktur::create($data);
            Penjualan::create([
                'kode' => $request->kode_faktur,
                'tanggal' => $request->tanggal_faktur,
                'customer_id' => $request->customer_id,
                'jumlah' => $request->total_final,
                'keterangan' => $request->ket_faktur,
                'jenis' => 0,
            ]);
            return redirect('faktur')->with('success', 'Berhasil Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(Faktur $faktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Faktur $faktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faktur $faktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faktur $faktur)
    {
        $faktur->delete();
        return redirect('faktur');
    }

    public function getNama($id)
    {
        /*
            * Tabel Detail faktur akan digabungkan dengan Tabel Customer dimana customer.id harus sama
            * Dengan kondisi kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil
        */
        $data = Detail::join('customers', 'customers.id', 'details.customer_id')->where('details.kode_faktur', $id)->get();
      
        // Data akan direspon ke dalam bentuk JSON dengan membawa data $data
        return response()->json($data);
    }

    public function getBarang($id)
    {
        /*
            * Tabel Detail faktur akan digabungkan dengan Tabel Barang dimana barang.id harus sama
            * Dengan kondisi kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil
        */
        $data = Detail::join('barangs', 'barangs.id', 'details.barang_id')->where('details.kode_faktur', $id)->get();
      
        // Sebagai Variabel penampung
        $li = '';

        // Setelah itu data akan diulang
        foreach ($data as $item) {
            $li .= $item->nama_barang. ', ';
        }
      
        // Data akan ditampilkan dalam bentuk respon dan bentuk json. Data yang ditampilkan berupa Array
        return response()->json([$li]);
    }

}
