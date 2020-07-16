<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
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
        'usuario',
        'clave',
        'sexo',
        'domicilio',
        'telefono',
        'tipo',
       
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
