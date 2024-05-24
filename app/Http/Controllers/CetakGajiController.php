<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use PDF;

class CetakGajiController extends Controller
{
    public function cetak($id)
    {
        $gaji = Gaji::findOrFail($id);

        $pdf = PDF::loadView('cetak-gaji.pdf', compact('gaji'));

        return $pdf->download('slip_gaji_'.$gaji->kd_gaji.'_'.$gaji->guru->nm_guru.'.pdf');
    }
}
