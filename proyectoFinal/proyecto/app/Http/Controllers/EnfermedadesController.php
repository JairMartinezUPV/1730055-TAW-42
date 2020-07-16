<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadesController extends Controller
{
    public function getAll(){
        //Se obtienen los datos de la tabla
        $enfermedades = Enfermedad::all();
        return $enfermedades;
    }

    public function getEnfermedad($id){
        
        $enfermedad = Enfermedad::findOrFail($id);

        return $enfermedad;
    }

    public function addEnfermedad(Request $request){
        //se agrega una nueva enfermedad
        
        $enfermedad = new Enfermedad();
        $enfermedad = $this->guardar($request, $enfermedad);
        $enfermedad->save();
    }

    public function updateEnfermedad(Request $request){
        //se actualiza una enfermedad dependiendo de su id
    
        $enfermedad = Enfermedad::findOrFail($request->id);
        $enfermedad = $this->guardar($request, $enfermedad);
        $enfermedad->save();
        return $enfermedad;
    }

    public function deleteEnfermedad($id){
       //se elimina una enfermedad dependiendo de su id
        $enfermedades = Enfermedad::destroy($id);
        return $enfermedades;
    }

    public function guardar($request, $enfermedad){
        //Se agregan los valores que se haya ingresado
        $enfermedad->nombre = $request->nombre;
        $enfermedad->descripcion = $request->descripcion;
        return $enfermedad;
    }

}
