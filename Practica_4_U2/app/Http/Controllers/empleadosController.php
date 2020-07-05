<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Departamentos;
//use BD; no existe
use Alert;
class empleadosController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //obtener los datos de la bd y su respectivo departamento, especificando los campos exactos
        $empleados= Empleado::join('departamentos', 'departamentos.id', '=', 'empleados.idDepartamento')->select('empleados.id','empleados.nombres','empleados.apellidos', 'empleados.cedula', 'empleados.email', 'empleados.sexo', 'empleados.estado_civil', 'empleados.telefono', 'departamentos.nombre')->get();
        //MOstrar vista de la consulta de empleados
        return view('empleados.admin_empleado',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //Mostrar el formulario para crear empleado
        $departamentos=Departamentos::all();
        return view('empleados.alta_empleado',compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //Retirar los datos del request
        $empleado = new Empleado;
        $empleado->nombres = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->cedula = $request->cedula;
        $empleado->email = $request->email;
        $empleado->idDepartamento = $request->idDepartamento;
        $empleado->sexo = $request->sexo;
        $empleado->estado_civil = $request->estado_civil;
        $empleado->telefono = $request->telefono;
        $empleado->save();
        //instertar en la tabla empleado los datos para la creación de un nuevo registro
        Alert::success('Datos guardados con exito');
        return redirect('empleados');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        //Busca el empleado a editar si no falla
        $empleado=Empleado::findOrFail($id);
        //Se trae todos lo departamentos
        $departamentos=Departamentos::all();
        //Mostrar la vista
        return view('empleados.editar_empleado',compact('empleado'), compact('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        //BUsca el registro en la bd si no esta manda error
        $empleado = Empleado::findOrFail($request->id);
        //Se retiran los datos del requiest
        $empleado->nombres = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->cedula = $request->cedula;
        $empleado->idDepartamento = $request->idDepartamento;
        $empleado->email = $request->email;
        $empleado->sexo = $request->sexo;
        $empleado->estado_civil = $request->estado_civil;
        $empleado->telefono = $request->telefono;
        $empleado->save();
        //Aviso de exito y redireccion
        Alert::success('Datos actualizados con exito');
        return redirect('empleados');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //BUsca el regustro en la bd si no esta manda error
        $empleado=Empleado::findOrFail($id);
        $empleado->delete(); //Se borra
        Alert::success('Datos eliminados de la base de datos');
        return redirect('empleados');
    }
}
