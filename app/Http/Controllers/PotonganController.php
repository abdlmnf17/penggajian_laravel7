<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Potongan;
class PotonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $potongan = Potongan::all();
        return view('potongan.index', compact('potongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('potongan.create'); // Kirim data guru ke view
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validasi input menggunakan metode validate
    $validatedData = $request->validate([
        'nm_potongan' => 'nullable|string',
        'jumlah_potongan' => 'nullable|integer',

        // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
    ]);

    // Simpan tunjangan jika validasi berhasil
    $potongan = Potongan::create($validatedData);

    // Redirect ke halaman yang sesuai setelah berhasil menyimpan
    return redirect()->route('potongan.index')->with('success', 'Potongan berhasil disimpan.');
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
        $potongan = Potongan::findOrFail($id);
        return view('potongan.update', compact('potongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_potongan)
    {
        $validatedData = $request->validate([

        'nm_potongann' => 'nullable|string',
        'jumlah_potongan' => 'nullable|integer',
        ]);

        $potongan = Potongan::findOrFail($id_potongan);

        // $tunjangan = Potongan::update($validatedData);
        $potongan->update([
            'nm_potongan' => $request->nm_potongan,
            'jumlah_potongan' => $request->jumlah_potongan,

        ]);

        return redirect()->route('potongan.index')->with('success', 'Data potongan berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_potongan)
    {
        $potongan = Potongan::findOrFail($id_potongan);
        $potongan->delete();

    if($potongan) {
        return redirect()->route('potongan.index')->with('success', 'Data potongan berhasil dihapus.');
    } else {
        return redirect()->route('potongan.index')->with('error', 'Data potongan gagal dihapus.');

    }
    }
}
