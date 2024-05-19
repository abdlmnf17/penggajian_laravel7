<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nm_potongan',
        'jumlah_potongan',

    ];


    public function gaji()
    {
        return $this->belongsToMany(Gaji::class, 'gaji_potongan', 'potongan_id', 'gaji_id');
    }



    /**
     * Get the guru that owns the potongan.
     */

}


