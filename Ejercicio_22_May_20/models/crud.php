<?php
  // se llama a la clase conexion
  require_once 'conexion.php';

  class Datos extends Conexion {

    public function ingresoUsuarioModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT cedula, password FROM $tabla WHERE
      cedula = :cedula");

      $stmt -> bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_STR);
      $stmt ->execute();

      //se utiliza fetch() al obtener resultados asociados al objeto
      return $stmt -> fetch();
      $stmt -> close();
    }

    //alumnos
    public function vistaAlumnosModel($tabla){
     $stmt = Conexion::conectar() -> prepare("SELECT id, cedula, nombre, apellidos,
     promedio, edad, fecha FROM $tabla");

     $stmt -> execute();

     //se utiliza fetch()
     return $stmt -> fetchAll();
     $stmt -> close();
   }

    public function vistaUsuariosModel($tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT id, cedula, nombre, apellidos, promedio, edad, fecha
      FROM $tabla");

      $stmt -> execute();

      //se utiliza fetch()
      return $stmt -> fetchAll();
      $stmt -> close();
    }

    public function registroAlumnoModel($datosModel, $tabla){

      //se prepara la sentencia SQl a traves de PDO
      $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(cedula, nombre,
        apellidos, promedio, edad, fecha, password) VALUES
      (:cedula, :nombre, :apellidos, :promedio, :edad, :fecha, :password)");

      //se utiliza bindParam() para vincular una variable PHP a un parameto de sutitucion
      $stmt -> bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_STR);
      $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":apellidos", $datosModel["apellido"], PDO::PARAM_STR);
      $stmt -> bindParam(":promedio", $datosModel["promedio"], PDO::PARAM_STR);
      $stmt -> bindParam(":edad", $datosModel["edad"], PDO::PARAM_STR);
      $stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
      $stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "success";
      } else {
        return "error";
      }

      $stmt -> close();

    }

    public function editarUsuarioModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT id, cedula, nombre, apellidos, promedio, edad, fecha, password
      FROM $tabla WHERE id = :id");
      $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);
      $stmt -> execute();

      return $stmt -> fetch();
      $stmt -> close();

    }

    public function actualizarUsuarioModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET cedula = :cedula,
      nombre = :nombre, apellidos = :apellidos, promedio = :promedio, edad = :edad, fecha = :fecha, password = :password WHERE id = :id");

      $stmt -> bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_STR);
      $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
      $stmt -> bindParam(":promedio", $datosModel["promedio"], PDO::PARAM_STR);
      $stmt -> bindParam(":edad", $datosModel["edad"], PDO::PARAM_STR);
      $stmt -> bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
      $stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
      $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
      if ($stmt -> execute()) {
        return "succes";
      } else {
        return "error";
      }

      $stmt -> close();
    }

    public function borrarUsuarioModel($datosModel, $tabla){
     $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
     $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);

     if ($stmt -> execute()) {
       return "ok";
     } else {
       return "error";
     }

     $stmt -> close();

   }


    //universidades
    //vista universidades
    public function vistaUniversidadesModel($tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT id, nombre, localidad FROM $tabla");

      $stmt -> execute();

      //se utiliza fetch()
      return $stmt -> fetchAll();
      $stmt -> close();
    }

    //registro universidad
    public function registroUniversidadModel($datosModel, $tabla){

      //se prepara la sentencia SQL a traves de PDO
      $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre, localidad) VALUES
      (:nombre, :localidad)");

      //se utiliza bindParam() para vincular una variable PHP a un parameto de sutitucion
      $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":localidad", $datosModel["localidad"], PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "success";
      } else {
        return "error";
      }

      $stmt -> close();

    }

    //editar universiadad
    public function editarUniversidadModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT id, nombre, localidad
      FROM $tabla WHERE id = :id");
      $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);
      $stmt -> execute();

      return $stmt -> fetch();
      $stmt -> close();

    }

    //actualizar universidad
    public function actualizarUniversidadModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre = :nombre,
        localidad = :localidad
        WHERE id = :id");

      $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
      $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":localidad", $datosModel["localidad"], PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "succes";
      } else {
        return "error";
      }

      $stmt -> close();
    }

    //borrar universidad
    public function borrarUniversidadModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
      $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "ok";
      } else {
        return "error";
      }

      $stmt -> close();

    }

    //carreras
    //vista carreras
    public function vistaCarrerasModel($tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT id, nombre FROM $tabla");

      $stmt -> execute();

      //se utiliza fetch()
      return $stmt -> fetchAll();
      $stmt -> close();
    }

    //registro carreras
    public function registroCarreraModel($datosModel, $tabla){

      //se prepara la sentencia SQl atraves de PDO
      $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre) VALUES
      (:nombre)");

      //se utiliza bindParam() para vincular una variable PHP a un parameto de sutitucion
      $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "success";
      } else {
        return "error";
      }

      $stmt -> close();

    }

    //editar carrera
    public function editarCarreraModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT id, nombre
      FROM $tabla WHERE id = :id");
      $stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);
      $stmt -> execute();

      return $stmt -> fetch();
      $stmt -> close();

    }

    //actualizar carrera
    public function actualizarCarreraModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre = :nombre
        WHERE id = :id");

      $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
      $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "succes";
      } else {
        return "error";
      }

      $stmt -> close();
    }

    //borrar carrera
    public function borrarCarreraModel($datosModel, $tabla){
      $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
      $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);

      if ($stmt -> execute()) {
        return "ok";
      } else {
        return "error";
      }

      $stmt -> close();

    }


    //se obtienen los datos
    public function datosUniversidadModel(){
      $stmt = Conexion::conectar() -> prepare("SELECT id, nombre FROM universidad");
      $stmt -> execute();

      return $stmt -> fetchAll();
      $stmt -> close();
    }

    public function datosCarreraModel(){
      $stmt = Conexion::conectar() -> prepare("SELECT id, nombre FROM carrera");
      $stmt -> execute();

      return $stmt -> fetchAll();
      $stmt -> close();
    }

    //vista asignatura
    public function vistaAsignaturaModel($tabla){
      $stmt = Conexion::conectar() -> prepare("SELECT a.id, c.nombre AS carrera,
        u.nombre AS universidad FROM
        $tabla a
        INNER JOIN carrera c ON a.id_carrera = c.id
        INNER JOIN universidad u ON a.id_universidad = u.id");

        $stmt -> execute();

        //se utiliza fetch()
        return $stmt -> fetchAll();
        $stmt -> close();
      }

      //registro asignatura
      public function registroAsignaturaModel($datosModel, $tabla){

        //se prepara la sentencia SQL a traves de PDO
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(id_carrera, id_universidad) VALUES
        (:id_carrera, :id_universidad)");

        //se utiliza bindParam() para vincular una variable PHP a un parameto de sutitucion
        $stmt -> bindParam(":id_carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_universidad", $datosModel["universidad"], PDO::PARAM_STR);


        if ($stmt -> execute()) {
          return "success";
        } else {
          return "error";
        }

        $stmt -> close();

      }

      //borrar asignatura
      public function borrarAsignaturaModel($datosModel, $tabla){
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datosModel, PDO::PARAM_STR);

        if ($stmt -> execute()) {
          return "ok";
        } else {
          return "error";
        }

        $stmt -> close();

      }

      //actualizar asignatura
      public function actualizarAsignadoModel($datosModel, $tabla){
        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET id_carrera = :id_carrera,
          id_universidad = :id_universidad
          WHERE id = :id");

        $stmt -> bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_universidad", $datosModel["id_universidad"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
          return "succes";
        } else {
          return "error";
        }

        $stmt -> close();
      }



  }

 ?>
