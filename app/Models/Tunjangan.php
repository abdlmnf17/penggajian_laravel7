<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nm_tunjangan',
        'jumlah_tunjangan',

    ];

    public function gaji()
    {
        return $this->belongsToMany(Gaji::class, 'gaji_tunjangan', 'tunjangan_id', 'gaji_id');
    }


    /**
     * Get the guru that owns the tunjangan.
     */

}
