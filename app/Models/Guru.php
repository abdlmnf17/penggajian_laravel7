<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_guru'; 
    protected $fillable = [
        'nm_guru',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'guru_mapel',
        'nm_jabatan',
    ];
}
