<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rutas para las enfermedades
Route::get('/enfermedades', function () {
    return view('componentes.componente_enfermedades');
});

Route::get('/enfermedades/obtenerenfermedades', 'enfermedadesController@getAll');

Route::get('/enfermedades/buscarEnfermedad/{id}', 'enfermedadesController@getEnfermedad');

Route::post('/enfermedades/agregarEnfermedad', 'enfermedadesController@addEnfermedad');

Route::patch('/enfermedades/editarEnfermedad', 'enfermedadesController@updateEnfermedad');

Route::delete('/enfermedades/eliminarEnfermedad/{id}', 'enfermedadesController@deleteEnfermedad');


//ruta para los medicamentos

Route::get('/', function () {
    return view('componentes.componente_medicamentos');
});

Route::get('/medicamentos/obtenerMedicamentos', 'MedicamentosController@getAll');

Route::get('/medicamentos/buscarMedicamento/{id}', 'MedicamentosController@getMedicamento');

Route::post('/medicamentos/agregarMedicamento', 'MedicamentosController@addMedicamento');

Route::patch('/medicamentos/editarMedicamento', 'MedicamentosController@updateMedicamento');

Route::delete('/medicamentos/eliminarMedicamento/{id}', 'MedicamentosController@deleteMedicamento');
