<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

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
        return view('akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
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

        // Simpan akun jika validasi berhasil
        $akun = Akun::create($validatedData);

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan
        return redirect()->route('akun.index')->with('success', 'Akun berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = Akun::findOrFail($id);

        return view('akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nm_akun' => 'required|string',
            'jenis_akun' => 'required|string',
            'kd_akun' => 'required|integer',
            'total' => 'required|integer',
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);

        $akun = Akun::findOrFail($id);
        $akun->update($validatedData);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui.');
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
