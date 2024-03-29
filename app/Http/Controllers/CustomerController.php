<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        $profil = Profil::where('user_id', Auth::user()->id)->get();
        return view('pendataan.customer', compact('customer', 'profil'));
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
            'nama_customer' => 'required',
            'kode_customer' => 'required|unique:customers',
            'alamat_customer' => 'required',
            'telepon_customer' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('customer')->with('error', 'Gagal Tambah Customer');
        } else {
            Customer::create($request->all());
            return redirect('customer')->with('success', 'Berhasil Tambah Customer');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect('customer')->with('success', 'Berhasil Ubah Data Customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customer')->with('success', 'Berhasil Hapus Data Customer');
    }

    public function customerExport()
    {
        return Excel::download(new CustomerExport, 'CustomerExport.xlsx');
    }
}
