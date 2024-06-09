<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use PDF;
class LaporanGajiController extends Controller
{
    public function index()
    {
        return view('gaji.laporan');
    }


    public function gajiPdf(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');

        $gaji = Gaji::whereBetween('tgl_gaji', [$tanggal_mulai, $tanggal_selesai])->get();
        $totalGajiKeseluruhan = $gaji->sum('sub_total');

        // Buat objek DomPDF
        $pdf = PDF::loadView('gaji.pdf', compact('gaji', 'tanggal_mulai', 'tanggal_selesai', 'totalGajiKeseluruhan'));

        // Atur ukuran kertas dan orientasi
        $pdf->setPaper('F4', 'landscape'); // Ubah 'A4' sesuai dengan ukuran kertas yang diinginkan, dan 'landscape' untuk orientasi landscape

        // Unduh PDF
        return $pdf->stream('laporan_gaji_'.$tanggal_mulai.'_to_'.$tanggal_selesai.'.pdf');
    }
}
