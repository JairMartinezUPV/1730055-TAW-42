<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function getAll(){
        
        $medicos = Medico::all();
        return $medicos;
    }

    public function getMedico($id){
      
        $medico = Medico::findOrFail($id);

        return $medico;
    }

    public function addMedico(Request $request){
                
       
        $medico = new Medico();

     
        $medico = $this->guardar($request, $medico);

        
        $medico->save();
    }

    public function updateMedico(Request $request){
  
        $medico = Medico::findOrFail($request->id);

        
        $medico = $this->guardar($request, $medico);

       
        $medico->save();

     
        return $medico;
    }

    public function deleteMedico($id){
         
        $medicos = Medico::destroy($id);
        return $medicos;
    }

    public function guardar($request, $medico){
      
        $medico->nombre = $request->nombre;
        $medico->apellido = $request->apellido;
        $medico->usuario = $request->usuario;
        $medico->clave = $request->clave;
        $medico->sexo = $request->sexo;
        $medico->domicilio = $request->domicilio;
        $medico->telefono = $request->telefono;
        $medico->tipo = $request->tipo;
      
        return $medico;
    }
}
