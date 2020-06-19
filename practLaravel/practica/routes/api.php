<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;

//COMANDOS
/*
1. Crear modelo
php artisan make:model [nombre del modelo]

2. Crear migración:
php artisan make:migration [nombre de la migración]

3. Generar el esquema dentro de la BD de mysql.
php artisan migrate
*/

//listar empleados
Route::get('empleados',function(){
    $empleados = Empleado::get();
    return $empleados;
});

//Ruta para guardar nuevos empleados y recibir data (fase 1).
Route::post('empleados',function(Request $request){
    //Verificamos que los datos enviados se reciban bien para guardar en la bd, utilizamos Request.

    //Retornar solo un parámetro
    //return $request->input('estado_civil');

    //Retornar todos lo valores del array del form elaborado en postman.
    //return $request->all();

    //Validar datos del empleado:
    $request->validate([
        'nombres' => 'required|max:50',
        'apellidos' => 'required|max:50',
        'cedula' => 'required|max:20',
        'email' => 'required|max:50|email|unique:empleados',
        'lugar_nacimiento' => 'required|max:50',
        'estado_civil' => 'required|max:50',
        'telefono' => 'required|numeric'
    ]);

    //Llenar los parámeros usando Request y guardarlos en la tabla de la base de datos:
    $empleado = new Empleado;
    $empleado->nombres = $request->input('nombres');
    $empleado->apellidos = $request->input('apellidos');
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->sexo = $request->input('sexo');
    $empleado->estado_civil = $request->input('estado_civil');
    $empleado->telefono = $request->input('telefono');

    $empleado->save();
    return 'Usuario creado.';
});

