<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circulo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'circulos';


    /**
     * The table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Indicates if the primary key is autoincrement.
     *
     * @var bool
     */
    public $incrementing = true;



    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be filleable for arrays.
     *
     * @var array
     *
     *  $guarded = []  or $filleable = []
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
