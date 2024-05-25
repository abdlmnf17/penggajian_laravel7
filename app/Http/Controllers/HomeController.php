<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Gaji;
use App\Models\Guru;
use App\Models\Potongan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guru = Guru::count();
        $gaji = Gaji::sum('sub_total');

        $akunKas = Akun::where('nm_akun', 'Kas')->sum('total');

        return view('home', compact('guru', 'gaji', 'akunKas'));
    }
}
