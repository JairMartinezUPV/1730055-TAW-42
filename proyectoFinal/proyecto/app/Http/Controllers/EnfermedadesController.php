<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadsController extends Controller
{
    //Se obtienen todos los datos de la tabla
    public function getAll(){
        $enfermedads = Enfermedad::all();
        return $enfermedads;
    }

    public function getEnfermedad($id){
        
        $enfermedad = Enfermedad::findOrFail($id);

        return $enfermedad;
    }

    //se agrega un regsitro de enfermedad
    public function addEnfermedad(Request $request){
        $enfermedad = new Enfermedad();     
        $enfermedad = $this->guardar($request, $enfermedad);    
        $enfermedad->save();
    }

    //se modifica el registro de enfermedad
    public function updateEnfermedad(Request $request){
        $enfermedad = Enfermedad::findOrFail($request->id);      
        $enfermedad = $this->guardar($request, $enfermedad);        
        $enfermedad->save();      
        return $enfermedad;
    }

    //se elimina el registro de enfermedad
    public function deleteEnfermedad($id){
        $enfermedads = Enfermedad::destroy($id);
        return $enfermedads;
    }

    public function guardar($request, $enfermedad){
        $enfermedad->nombre = $request->nombre;
        $enfermedad->descripcion = $request->descripcion;
        return $enfermedad;
    }

}
