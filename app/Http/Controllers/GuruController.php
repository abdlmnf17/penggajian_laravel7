<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
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
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nm_guru' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'guru_mapel' => 'required|string|max:255',

        ]);

        // Simpan data guru ke dalam database
        Guru::create([
            'nm_guru' => $request->nm_guru,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'guru_mapel' => $request->guru_mapel,

        ]);

        // Redirect ke halaman yang tepat setelah penyimpanan
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);

        if (! $guru) {
            return abort(404);
        }

        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('guru.update', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nm_guru' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'guru_mapel' => 'required|string|max:255',

        ]);

        // Temukan guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Perbarui data guru
        $guru->update([
            'nm_guru' => $request->nm_guru,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'guru_mapel' => $request->guru_mapel,

        ]);

        // Redirect ke halaman yang tepat setelah perubahan
        if ($guru) {
            return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
        } else {
            return redirect()->route('guru.index')->with('error', 'Data guru gagal diperbarui.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        if ($guru) {
            return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
        } else {
            return redirect()->route('guru.index')->with('error', 'Data guru gagal dihapus.');

        }
    }
}
