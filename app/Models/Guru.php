<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\GuruFactory;

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

    public static function factory()
    {
        return new GuruFactory();
    }
}
