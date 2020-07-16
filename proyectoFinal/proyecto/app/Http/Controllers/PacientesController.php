<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function getAll(){
        
        $pacientes = Paciente::all();
        return $pacientes;
    }

    public function getPaciente($id){
      
        $paciente = Paciente::findOrFail($id);

        return $paciente;
    }

    public function addPaciente(Request $request){
                
       
        $paciente = new Paciente();

     
        $paciente = $this->guardar($request, $paciente);

        
        $paciente->save();
    }

    public function updatePaciente(Request $request){
  
        $paciente = Paciente::findOrFail($request->id);

        
        $paciente = $this->guardar($request, $paciente);

       
        $paciente->save();

     
        return $paciente;
    }

    public function deletePaciente($id){
         
        $pacientes = Paciente::destroy($id);
        return $pacientes;
    }

    public function guardar($request, $paciente){
      
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->sexo = $request->sexo;
        $paciente->peso = $request->peso;
        $paciente->estatura = $request->estatura;
        $paciente->domicilio = $request->domicilio;
        $paciente->telefono = $request->telefono;
      
        return $paciente;
    }
}
