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
     * @param  \Illuminate\Http\Request  $request
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
            'nm_jabatan' => 'required|string|max:255',
        ]);

        // Simpan data guru ke dalam database
        Guru::create([
            'nm_guru' => $request->nm_guru,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'guru_mapel' => $request->guru_mapel,
            'nm_jabatan' => $request->nm_jabatan,
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

        if (!$guru) {
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
        return view('guru.edit', compact('guru'));
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
    public function destroy($id_guru)
    {
        $guru = Guru::where('id_guru', $id_guru)->firstOrFail();
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');

    }

}
