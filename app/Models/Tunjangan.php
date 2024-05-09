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
    protected $primaryKey = 'id_tunjangan';
    protected $fillable = [
        'nm_tunjangan',
        'jumlah_tunjangan',

    ];

    /**
     * Get the guru that owns the tunjangan.
     */

}
