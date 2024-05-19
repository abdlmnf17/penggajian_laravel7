<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $table = 'akun';
    protected $fillable = [

        'nm_akun',
        'kd_akun',
        'jenis_akun',
        'total',
        
    ];
    public function jurnals()
    {
        return $this->hasMany(Jurnal::class);
    }
}
