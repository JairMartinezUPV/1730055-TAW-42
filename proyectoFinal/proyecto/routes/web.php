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

Route::get('/', function () {
    return view('welcome');
});

//ruta para los padecimientos
Route::get('/enfermedades', function () {
    return view('componentes.componente_enfermedades');
});

Route::get('/enfermedades/obtenerEnfermedades', 'EnfermedadesController@getAll');

Route::get('/enfermedades/buscarEnfermedad/{id}', 'EnfermedadesController@getEnfermedad');

Route::post('/enfermedades/agregarEnfermedad', 'EnfermedadesController@addEnfermedad');

Route::patch('/enfermedades/editarEnfermedad', 'EnfermedadesController@updateEnfermedad');

Route::delete('/enfermedades/eliminarEnfermedad/{id}', 'EnfermedadesController@deleteEnfermedad');

//ruta de medicamentos
Route::get('/medicamentos', function () {
    return view('componentes.componente_medicamentos');
});

Route::get('/medicamentos/obtenerMedicamentos', 'MedicamentosController@getAll');

Route::get('/medicamentos/buscarMedicamento/{id}', 'MedicamentosController@getMedicamento');

Route::post('/medicamentos/agregarMedicamento', 'MedicamentosController@addMedicamento');

Route::patch('/medicamentos/editarMedicamento', 'MedicamentosController@updateMedicamento');

Route::delete('/medicamentos/eliminarMedicamento/{id}', 'MedicamentosController@deleteMedicamento');


//rutas para pacientes
Route::get('/', function () {
    return view('componentes.componente_pacientes');
});

Route::get('/pacientes/obtenerPacientes', 'PacientesController@getAll');

Route::get('/pacientes/buscarPaciente/{id}', 'PacientesController@getPaciente');

Route::post('/pacientes/agregarPaciente', 'PacientesController@addPaciente');

Route::patch('/pacientes/editarPaciente', 'PacientesController@updatePaciente');

Route::delete('/pacientes/eliminarPaciente/{id}', 'PacientesController@deletePaciente');


//rutas para medicos
Route::get('/medicos', function () {
    return view('componentes.componente_medicos');
});

Route::get('/medicos/obtenerMedicos', 'MedicosController@getAll');

Route::get('/medicos/buscarMedico/{id}', 'MedicosController@getMedico');

Route::post('/medicos/agregarMedico', 'MedicosController@addMedico');

Route::patch('/medicos/editarMedico', 'MedicosController@updateMedico');

Route::delete('/medicos/eliminarMedico/{id}', 'MedicosController@deleteMedico');






