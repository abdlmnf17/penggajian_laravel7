<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Guru;
use App\Models\Potongan;
use App\Models\Tunjangan;
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
        $guru = Guru::all();
        $gaji = Gaji::all();
        $potongan = Potongan::all();
        $tunjangan = Tunjangan::all();

        return view('gaji.index', compact('gaji', 'tunjangan', 'potongan', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $gaji = Gaji::all();
        $potongan = Potongan::all();
        $tunjangan = Tunjangan::all();

        return view('gaji.create', compact('gaji', 'tunjangan', 'potongan', 'guru'));
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
            'kd_gaji' => 'required|string|unique:gaji,kd_gaji|max:255',
            'guru_id' => 'required|exists:guru,id',
            'tgl_gaji' => 'required|date',
            'jam_mengajar' => 'required|integer',
            'gaji_pokok' => 'required|integer',
            'sub_total' => 'required|integer',
            'tunjangan_ids.*' => 'required|exists:tunjangans,id',
            'potongan_ids.*' => 'required|exists:potongans,id',

        ]);

        // Simpan data gaji ke dalam database

        $gaji = Gaji::create($request->except('tunjangan_ids', 'potongan_ids'));

        // Lampirkan tunjangan yang dipilih ke entri gaji menggunakan attach
        $tunjanganIds = collect($request->tunjangan_ids)->unique(); // Hapus duplikat tunjangan jika ada
        $potonganIds = collect($request->potongan_ids)->unique(); // Hapus duplikat potongan jika ada
        $gaji->tunjangan()->attach($tunjanganIds);
        $gaji->potongan()->attach($potonganIds);

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil ditambahkan');

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

        if (! $gaji) {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  // Validasi input
        //  $request->validate([
        //     'kd_gaji' => 'required|string|max:10',
        //     'tgl_gaji' => 'required|date',
        //     'jam_mengajar' => 'required|string|max:50',
        //     'id_tunjangan' =>  'required|string|max:50',
        //     'id_potongan' => 'required|string|max:50',
        //     'id_guru' => 'required|string|max:50',
        //     'gaji_pokok' => 'required|string|max:200',
        //     'sub_total' => 'required|string|max:200',
        // ]);

        // // Temukan guru berdasarkan ID
        // $gaji = Gaji::findOrFail($id);

        // // Perbarui data guru
        // $gaji->update([
        //     'kd_gaji' => $request->kd_gaji,
        //     'tgl_gaji' => $request->tgl_gaji,
        //     'jam_mengajar' =>$request->jam_mengajar,
        //     'id_tunjangan' => $request->id_tunjangan,
        //     'id_potongan' => $request->id_potongan,
        //     'id_guru' => $request->id_guru,
        //     'gaji_pokok' => $request->gaji_pokok,
        //     'sub_total' => $request->sub_total,

        // ]);

        // // Redirect ke halaman yang tepat setelah perubahan
        // if($gaji) {
        //     return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui.');
        // } else {
        //     return redirect()->route('gaji.index')->with('error', 'Data gaji  diperbarui.');

        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();

        return redirect()->route('gaji.index')->with('success', 'Gaji berhasil dihapus');
    }
}
