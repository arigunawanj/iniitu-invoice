<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail;
use App\Models\Faktur;
use App\Models\Profil;
use App\Models\Customer;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
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
        return redirect('faktur')->with('success', 'Berhasil Menghapus Data');
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

    public function printfaktur($id)
    {
        // DATA PADA TABEL FAKTUR DIGABUNGKAN DENGAN DETAIL FAKTUR DIGABUNGKAN LAGI DENGAN BARANG DIGABUNGKAN LAGI DENGAN CUSTOMER SETELAH ITU DIAMBIL DATANYA
        $data = DB::table('fakturs')->select('*')->join('details', 'details.kode_faktur', 'fakturs.kode_faktur')
        ->join('barangs', 'barangs.id', 'details.barang_id')->join('customers', 'customers.id', 'fakturs.customer_id')
        ->where('fakturs.kode_faktur', $id)->get();

        // MENGAMBIL DATA YANG UNIK SAJA
        $kode = $data->unique('kode_faktur');

        // MENGAMBIL DATA PROFIL SESUAI DENGAN YANG LOGIN
        $profil = Profil::where('user_id', Auth::user()->id)->get();

        // MENGAMBIL TOTAL
        foreach ($kode as $key) {
            $total = $key->total_final;
        }

        $dp = $total * (50/100);

        // PDF akan ditampilkan dengan membawa data yang sudah dideklarasikan
        $pdf = Pdf::loadView('print.printlokal', ['data' => $data, 'kode' => $kode, 'profil' => $profil, 'dp' => $dp]);
        
        foreach ($data as $isian){
            // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
            return $pdf->setPaper('a4', 'potrait')->stream( 'Faktur Lokal' . ' • ' . $isian->kode_faktur . '.pdf');
        }

    }

}
