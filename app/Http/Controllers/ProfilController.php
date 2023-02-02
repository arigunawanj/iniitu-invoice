<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $profil = DB::table('users')->join('profils', 'profils.user_id' , 'users.id')->where('user_id', Auth::user()->id)->get();
        $data = Profil::where('user_id', Auth::user()->id)->get();
        // $profil = Profil::where('user_id', Auth::user()->id)->get();

        return view('profil', compact('profil', 'user', 'data'));
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
        // Mengambil data yang ada dalam seluruh form
        $data = $request->all();

        // Sebagai Variabel penampung nama file
        $newName = '';

        // Jika didalam form terdapat file foto
        if($request->file('foto')){

            // Mengambil ekstensi original foto
            $extension = $request->file('foto')->getClientOriginalExtension();

            // Dilakukan perubahan nama file yang diambil dari Nama, Timestamp dan Ekstensi
            $newName = $request->nama.'-'.now()->timestamp.'.'.$extension;

            // Menyimpan file ke dalam folder img dengan nama yang sudah dideklarasikan
            $isi = $request->file('foto')->storeAs('img', $newName);
       
            // Kolom foto akan diisi oleh variabel $isi
            $data['foto'] = $isi;
        }


        // Kolom user id akan diisi oleh ID yang sudah login
        $data['user_id'] = Auth::user()->id;

        // Detail profil akan diisi dengan variabel $data yang sudah dideklarasikan
        Profil::create($data);


        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman profil
        return redirect('profil')->with('success', 'Berhasil Menambah Detail Profil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        // Mengambil data yang ada dalam seluruh form
        $data = $request->all();

        // Kolom user ID akan otomatis terisi oleh ID yang login
        $data['user_id'] = Auth::user()->id;

        // Sebagai Variabel Penampung Nama File
        $newName = '';

        // Jika foto akan diganti
        if ($request->file('foto')) {   
            // Foto yang didalam database akan dihapus 
            Storage::delete($profil->foto);
            
            // mengambil ekstensi dari foto yang diinput
            $extension = $request->file('foto')->getClientOriginalExtension();

            // Mengganti nama file dengan Nama - timestamp - dan ekstensi
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;

            // Menyimpan file ke dalam folder img dengan nama yang sudah dideklarasikan
            $isi = $request->file('foto')->storeAs('img', $newName);

            // Kolom foto akan diisi oleh variabel $isi
            $data['foto'] = $isi;

            // Setelah itu dilakukan update data
            $profil->update($data);
        } else {
            // Jika tidak ada pergantian foto, maka foto diisi dengan foto yang sudah ada dalam database
            $profil->update([
                'nama' => $request->nama,
                'alamat' =>  $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'foto' => $profil->foto,
                'user_id' => Auth::user()->id,
            ]);
        }
                // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman profil
        return redirect('profil')->with('success', 'Berhasil Mengubah Detail Profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
