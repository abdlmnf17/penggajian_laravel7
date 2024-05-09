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
    protected $primaryKey = 'id_potongan';
    protected $fillable = [
        'nm_potongan',
        'jumlah_potongan',

    ];

    /**
     * Get the guru that owns the potongan.
     */

}


