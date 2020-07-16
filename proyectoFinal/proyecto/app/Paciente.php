<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'sexo',
        'peso',
        'estatura',
        'domicilio',
        'telefono',
       
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'id'
    ];
}
