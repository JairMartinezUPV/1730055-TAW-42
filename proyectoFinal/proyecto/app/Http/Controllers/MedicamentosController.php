<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    //Se obtienen todos los datos de la tabla
    public function getAll(){
        $medicamentos = Medicamento::all();
        return $medicamentos;
    }

    public function getMedicamento($id){
      
        $medicamento = Medicamento::findOrFail($id);

        return $medicamento;
    }

    //se agrega eun registro de medicamento
    public function addMedicamento(Request $request){
        $medicamento = new Medicamento();     
        $medicamento = $this->guardar($request, $medicamento);       
        $medicamento->save();
    }

    // se actualiza un registro de medicamento
    public function updateMedicamento(Request $request){
        $medicamento = Medicamento::findOrFail($request->id);
        $medicamento = $this->guardar($request, $medicamento);       
        $medicamento->save();     
        return $medicamento;
    }

    //se borra un registro de medicamento
    public function deleteMedicamento($id){
        $medicamentos = Medicamento::destroy($id);
        return $medicamentos;
    }

    public function guardar($request, $medicamento){
        $medicamento->nombre = $request->nombre;
        $medicamento->descripcion = $request->descripcion;
        $medicamento->presentacion = $request->presentacion;
        $medicamento->precio = $request->precio;
        return $medicamento;
    }

}
