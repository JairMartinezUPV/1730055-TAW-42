<?php

namespace App\Http\Controllers;

use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    //Se obtienen los datos de la tabla
    public function getAll(){
        $medicamentos = Medicamento::all();
        return $medicamentos;
    }

    public function getMedicamento($id){
      
        $medicamento = Medicamento::findOrFail($id);
        return $medicamento;
    }

    //se agrega un medicamento
    public function addMedicamento(Request $request){
        $medicamento = new Medicamento();
        $medicamento = $this->guardar($request, $medicamento);
        $medicamento->save();
    }

    //me modifican los datos dependiendo de su id
    public function updateMedicamento(Request $request){
        $medicamento = Medicamento::findOrFail($request->id);
        $medicamento = $this->guardar($request, $medicamento);
        $medicamento->save();
        return $medicamento;
    }

    //se eliminan los productos dependiendo de su id
    public function deleteMedicamento($id){
        $medicamentos = Medicamento::destroy($id);
        return $medicamentos;
    }

    //se agrean los valores que se hayan ingresado
    public function guardar($request, $medicamento){
        $medicamento->nombre = $request->nombre;
        $medicamento->cantidad = $request->cantidad;
      
        return $medicamento;
    }

}
