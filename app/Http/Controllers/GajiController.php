<?php

namespace App\Http\Controllers;
use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
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
        $gaji = Gaji::all();
        return view('gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gaji.create');
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
            'kd_gaji' => 'required|string|max:10',
            'tgl_gaji' => 'required|date',
            'jam_mengajar' => 'required|string|max:50',
            'id_tunjangan' =>  'required|string|max:50',
            'id_potongan' => 'required|string|max:50',
            'id_guru' => 'required|string|max:50',
            'gaji_pokok' => 'required|string|max:200',
            'sub_total' => 'required|string|max:200',
        ]);

        // Simpan data gaji ke dalam database
        Gaji::create([
            'kd_gaji' => $request->kd_gaji,
            'tgl_gaji' => $request->tgl_gaji,
            'jam_mengajar' =>$request->jam_mengajar,
            'id_tunjangan' => $request->id_tunjangan,
            'id_potongan' => $request->id_potongan,
            'id_guru' => $request->id_guru,
            'gaji_pokok' => $request->gaji_pokok,
            'sub_total' => $request->sub_total,
            
        ]);

        // Redirect ke halaman yang tepat setelah penyimpanan
        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gaji = Gaji::find($id);

        if (!$gaji) {
            return abort(404);
        }
        return view('gaji.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gaji::findOrFail($id);
        return view('gaji.update', compact('gaji'));
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
         // Validasi input
         $request->validate([
            'kd_gaji' => 'required|string|max:10',
            'tgl_gaji' => 'required|date',
            'jam_mengajar' => 'required|string|max:50',
            'id_tunjangan' =>  'required|string|max:50',
            'id_potongan' => 'required|string|max:50',
            'id_guru' => 'required|string|max:50',
            'gaji_pokok' => 'required|string|max:200',
            'sub_total' => 'required|string|max:200',
        ]);

        // Temukan guru berdasarkan ID
        $gaji = Gaji::findOrFail($id);

        // Perbarui data guru
        $gaji->update([
            'kd_gaji' => $request->kd_gaji,
            'tgl_gaji' => $request->tgl_gaji,
            'jam_mengajar' =>$request->jam_mengajar,
            'id_tunjangan' => $request->id_tunjangan,
            'id_potongan' => $request->id_potongan,
            'id_guru' => $request->id_guru,
            'gaji_pokok' => $request->gaji_pokok,
            'sub_total' => $request->sub_total,

        ]);

        // Redirect ke halaman yang tepat setelah perubahan
        if($gaji) {
            return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui.');
        } else {
            return redirect()->route('gaji.index')->with('error', 'Data gaji  diperbarui.');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gaji)
{
    $gaji = Guru::findOrFail($id_gaji);
    $gaji->delete();
    if($gaji) {
        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil dihapus.');
    } else {
        return redirect()->route('gaji.index')->with('error', 'Data gaji gagal dihapus.');

    }
}


}


