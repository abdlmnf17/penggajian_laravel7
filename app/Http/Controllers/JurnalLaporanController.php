<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JurnalLaporanController extends Controller
{
    public function index()
    {
        return view('laporanjurnal.index');
    }

    public function jurnalPdf(Request $request)
    {

        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');
        $jurnals = Jurnal::whereHas('gaji', function ($query) use ($tanggal_mulai, $tanggal_selesai) {
            $query->whereBetween('tgl_gaji', [$tanggal_mulai, $tanggal_selesai]);
        })->get();
        $totalDebit = $jurnals->sum('jumlah_akun_debit');
        $totalKredit = $jurnals->sum('jumlah_akun_kredit');

        $pdf = PDF::loadView('laporanjurnal.pdf', compact('jurnals', 'tanggal_mulai', 'tanggal_selesai', 'totalDebit', 'totalKredit'));


        $pdf->setPaper('A4', 'landscape');

    
        return $pdf->download('JURNAL_LAPORAN'.$tanggal_mulai.'_SAMPAI_'.$tanggal_selesai.'.pdf');
    }
}
