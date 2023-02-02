<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Profil;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dinvoice = InvoiceDetail::all();
        $barang = Barang::all();
        $customer = Customer::all();
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.invoicedetail', compact('dinvoice', 'barang', 'customer', 'profil'));
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
            'invoice_code' => 'required',
            'barang_id' => 'required',
            'customer_id' => 'required',
            'discount' => 'required', 
            'subtotal' => 'required', 
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('invoicedetail')->with('error', 'Gagal Menyimpan Barang Faktur');
        } else {
            InvoiceDetail::create($request->all());
        }

        return redirect('invoicedetail')->with('error', 'Berhasil Menambah Barang Faktur');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceDetail $invoicedetail)
    {
        $invoicedetail->delete();
        return redirect('invoicedetail')->with('success', 'Berhasil Menghapus Barang Faktur');
    }
}
