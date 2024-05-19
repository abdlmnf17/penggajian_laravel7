<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $akun = Akun::all();
        return view('akun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = Akun::all();
        return view('akun.create', compact('akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nm_akun' => 'required|string',
            'jenis_akun' => 'required|string',
            'kd_akun' => 'required|integer',
            'total' => 'required|integer',
    
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);
    
        // Simpan tunjangan jika validasi berhasil
        $akun = Akun::create($validatedData);
    
        // Redirect ke halaman yang sesuai setelah berhasil menyimpan
        return redirect()->route('akun.index')->with('success', 'Akun berhasil disimpan.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $akun = Akun::findOrFail($id);
        $akun->delete();
        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus.');

    }
}
