<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamentos;
use Alert;

class departamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //obtener todos los departamentos de latabla de la bd
       $departamentos=Departamentos::all();
       //MOstrar vista de la consulta de departamentos
       return view('departamentos.admin_departamento',compact('departamentos'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Mostrar el formulario para crear empleado
        return view('departamentos.alta_departamento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $departamento = new Departamentos; //Crea un nuevo objeto para almacenar en la bd
        $departamento->nombre = $request->nombre; //Obtiene el nombre del request
        $departamento->save(); //Guarda en la bd

        //Mensaje de alerta
        Alert::success('Datos guardados con exito');
        return redirect('departamentos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //BUsca el regustro en la bd si no esta manda error
        $departamento=Departamentos::findOrFail($id);
        //Mostrar la vista
        return view('departamentos.editar_departamento',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //BUsca el regustro a editar en la bd, si no esta manda error
        $departamento = Departamentos::findOrFail($request->id);
        $departamento->nombre = $request->nombre;
        $departamento->save(); //Guarda en la bd

        //Mensaje de alerta
        Alert::success('Datos actualizados con exito');
        return redirect('departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se busca el registro o falla
        $departamento =Departamentos ::findOrFail($id);
        $departamento ->delete(); //Se borra
        //Alerta de exito
        Alert::success('Datos eliminados de la base de datos');
        return redirect('departamentos');
    }
}
