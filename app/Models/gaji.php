<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru_id', 'gaji_pokok', 'kd_gaji',
        'tgl_gaji', 'jam_mengajar', 'sub_total',
    ];

    public function tunjangan()
    {
        return $this->belongsToMany(Tunjangan::class, 'detail_gaji_tunjangan', 'gaji_id', 'tunjangan_id');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function potongan()
    {
        return $this->belongsToMany(Potongan::class, 'detail_gaji_potongan', 'gaji_id', 'potongan_id');
    }

    public function honorMengajar()
    {
        return $this->belongsTo(HonorMengajar::class);
    }

    public function jurnals()
    {
        return $this->hasMany(Jurnal::class);
    }
}
