<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Profil;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = Invoice::all();
        $customer = Customer::all();
        $barang = Barang::all();
        $dinvoice = InvoiceDetail::all();
        $dinv = $dinvoice->unique('invoice_code');
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.invoice', compact('invoice', 'customer', 'barang', 'dinvoice', 'dinv', 'profil'));
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
            'invoice_code' => 'required|unique:invoices',
            'invoice_date' => 'required',
            'customer_id' => 'required',
            'description' => 'required',
            'total' => 'required',
            'charge' => 'required',
            'total_finale' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('invoice')->with('error', 'Gagal Menyimpan Data');
        } else {
            $data = $request->all();
            Invoice::create($data);
            Penjualan::create([
                'kode' => $request->invoice_code,
                'tanggal' => $request->invoice_date,
                'customer_id' => $request->customer_id,
                'jumlah' => $request->total_finale,
                'keterangan' => $request->description,
                'jenis' => 1,
            ]);
            return redirect('invoice')->with('success', 'Berhasil Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect('invoice')->with('success', 'Berhasil Menghapus Data');
    }

    public function invName($id)
    {
        /*
            * Tabel Detail faktur akan digabungkan dengan Tabel Customer dimana customer.id harus sama
            * Dengan kondisi kode_faktur sama dengan data kode_faktur($id) yang diambil
            * Setelah itu data diambil
        */
        $data = InvoiceDetail::join('customers', 'customers.id', 'invoice_details.customer_id')->where('invoice_details.invoice_code', $id)->get();
      
        // Data akan direspon ke dalam bentuk JSON dengan membawa data $data
        return response()->json($data);
    }

    public function printInv($id)
    {
        $data = DB::table('invoices')->select('*')->join('invoice_details', 'invoice_details.invoice_code', 'invoices.invoice_code')
        ->join('barangs', 'barangs.id', 'invoice_details.barang_id')->join('customers', 'customers.id', 'invoices.customer_id')
        ->where('invoices.invoice_code', $id)->get();

        $kode = $data->unique('invoice_code');

        foreach ($kode as $key) {
            $total = $key->total_finale;
        }

        $dp = $total * (50/100);

        $profil = Profil::where('user_id', Auth::user()->id)->get();

        // PDF akan ditampilkan dengan membawa data yang sudah dideklarasikan
        $pdf = Pdf::loadView('print.printinter', ['data' => $data, 'kode' => $kode, 'profil' => $profil, 'dp' => $dp]);

        foreach ($data as $isian){
            // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
            return $pdf->setPaper('a4', 'potrait')->stream('Faktur Inter' . ' • ' . $isian->invoice_code . '.pdf');
        }
    }
}
