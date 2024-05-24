<?php

namespace App\Http\Controllers;

use App\Models\Tunjangan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
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
        $tunjangan = Tunjangan::all();

        return view('tunjangan.index', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('tunjangan.create'); // Kirim data guru ke view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input menggunakan metode validate
        $validatedData = $request->validate([
            'nm_tunjangan' => 'nullable|string',
            'jumlah_tunjangan' => 'nullable|integer',

            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);

        // Simpan tunjangan jika validasi berhasil
        $tunjangan = Tunjangan::create($validatedData);

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan
        return redirect()->route('tunjangan.index')->with('success', 'Tunjangan berhasil disimpan.');
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
        $tunjangan = Tunjangan::findOrFail($id);

        return view('tunjangan.update', compact('tunjangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tunjangan)
    {
        $validatedData = $request->validate([

            'nm_tunjangan' => 'nullable|string',
            'jumlah_tunjangan' => 'nullable|integer',
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);

        $tunjangan = Tunjangan::findOrFail($id_tunjangan);

        // $tunjangan = Tunjangan::update($validatedData);
        $tunjangan->update([
            'nm_tunjangan' => $request->nm_tunjangan,
            'jumlah_tunjangan' => $request->jumlah_tunjangan,

        ]);

        return redirect()->route('tunjangan.index')->with('success', 'Data tunjangan berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tunjangan)
    {
        $tunjangan = Tunjangan::findOrFail($id_tunjangan);
        $tunjangan->delete();

        if ($tunjangan) {
            return redirect()->route('tunjangan.index')->with('success', 'Data tunjangan berhasil dihapus.');
        } else {
            return redirect()->route('tunjangan.index')->with('error', 'Data tunjangan gagal dihapus.');

        }
    }
}
