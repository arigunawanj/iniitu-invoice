<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function print($id)
    {
        // Parameter $id adalah Tahun yang di cari

        // Jika Tahun bernilai 0
        if ($id == 0) {
            // Menampilkan seluruh penjualan yang disortir sesuai kolom tanggal_kirim
            $penjualan = Penjualan::all()->where('jenis', 0)->sortBy('tanggal');
            $penjualan2 = Penjualan::all()->where('jenis', 1)->sortBy('tanggal');

            // Menghitung jumlah status Lunas
            $lunas = DB::table('penjualans')->select('status')->where('status', 'Lunas')->where('jenis', 0)->count();
            $lunas2 = DB::table('penjualans')->select('status')->where('status', 'Lunas')->where('jenis', 1)->count();

             // Menghitung jumlah status Belum Lunas
            $belum = DB::table('penjualans')->select('status')->where('status', 'Belum Lunas')->where('jenis', 0)->count();
            $belum2 = DB::table('penjualans')->select('status')->where('status', 'Belum Lunas')->where('jenis', 1)->count();
            
            // Menjumlahkan tabel penjualan pada kolom harga jumlah
            $pertahun = DB::table('penjualans')->select('jumlah')->where('jenis', 0)->sum('jumlah');
            $pertahun2 = DB::table('penjualans')->select('jumlah')->where('jenis', 1)->sum('jumlah');

            // Mengambil seluruh data penjualan
            $year = DB::table('penjualans')->get();
            $year2 = DB::table('penjualans')->get();
        } 
        // Selain itu jika Tahun ada
        else {
            // Mengambil seluruh data yang ada dalam tabel Penjualan
            $penjualan = Penjualan::where(DB::raw('YEAR(tanggal)'), $id)->get()->sortBy('tanggal');

            // $penjualan2 = Penjualan::where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 1)->get()->sortBy('tanggal');
    
            // Mengambil Data berdasarkan tahun yang dicocokkan didatabase dan parameter tahun
            $year = DB::table('penjualans')->where(DB::raw('YEAR(tanggal)'), $id)->get();
    
            // Menghitung jumlah Status Lunas
            $lunas = DB::table('penjualans')->select('status')->where('status', 'Lunas')->where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 0)->count();
            $lunas2 = DB::table('penjualans')->select('status')->where('status', 'Lunas')->where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 1)->count();
    
            // Menghitung jumlah Status Belum Lunas
            $belum = DB::table('penjualans')->select('status')->where('status', 'Belum Lunas')->where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 0)->count();
            $belum2 = DB::table('penjualans')->select('status')->where('status', 'Belum Lunas')->where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 1)->count();
    
            // Menjumlahkan tabel penjualan pada kolom harga jumlah
            $pertahun = DB::table('penjualans')->where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 0)->sum('jumlah');
            $pertahun2 = DB::table('penjualans')->where(DB::raw('YEAR(tanggal)'), $id)->where('jenis', 1)->sum('jumlah');
        }

        // Jika Tahun didatabase dan parameternya cocok dan ada ATAU tahunnya bernilai 0
        if (DB::table('penjualans')->where(DB::raw('YEAR(tanggal)'), $id)->exists() || $id == 0) {
            // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
                $pdf = Pdf::loadView('print.printpenjualan', [
                'penjualan' => $penjualan, 
                'lunas' => $lunas, 
                'lunas2' => $lunas2, 
                'belum' => $belum, 
                'belum2' => $belum2, 
                'pertahun' => $pertahun,
                'pertahun2' => $pertahun2,
                'id' => $id,
                // 'hasil' => $hasil,
                'year' => $year,
            ]);
        } 
        // Sebaliknya jika tidak terdaftar
        else {
            $pdf = Pdf::loadView('print.printpenjualan', [
                'penjualan' => $penjualan, 
                'penjualan2' => $penjualan2,
                'lunas' => $lunas, 
                'lunas2' => $lunas2, 
                'belum' => $belum, 
                'belum2' => $belum2, 
                'pertahun' => $pertahun,
                'pertahun2' => $pertahun2,
                'id' => $id,
            ]);
        }
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Penjualan - '. Carbon::now(). '.pdf');
    }
}
