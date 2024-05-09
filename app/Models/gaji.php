<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gaji';
    protected $fillable = [
        
        'kd_gaji',
        'tgl_gaji',
        'jam_mengajar',
        'id_tunjangan',
        'id_potongan',
        'id_guru',
        'gaji_pokok',
        'sub_total',
    ];

    public static function factory()
    {
        return new GajiFactory();
    }
}
