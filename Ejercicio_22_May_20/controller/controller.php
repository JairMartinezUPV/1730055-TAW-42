<?php

class MvcController{

  //muestra la plantilla
  public function pagina(){
    include 'views/template.php';
  }

  //muestra los enlaces
  public function enlacesPaginasController(){

    if (isset($_GET["action"])) {
      $enlaces = $_GET["action"];
    } else {
      $enlaces = "index";
    }

    $respuesta = Paginas::enlacesPaginasModel($enlaces);
    include $respuesta;

  }

  public function ingresoUsuarioController(){
      if (isset($_POST["cedulaIngreso"])) {
        $datosController = array(
          'cedula' => $_POST["cedulaIngreso"],
          'password' => $_POST["passwordIngreso"]);

        $respuesta = Datos::ingresoUsuarioModel($datosController, "estudiante");
        //validacion para ver si el usuario es valido
        if ($respuesta["cedula"] == $_POST["cedulaIngreso"] &&
            $respuesta["password"] == $_POST["passwordIngreso"]) {
          session_start();
          $_SESSION["validar"] = true;
          header("location:index.php?action=alumnos");
        } else {
          header("location:index.php?action=fallo");
        }
      }
    }

  //vista de los alumnos
  public function vistaAlumnosController(){
      $respuesta = Datos::vistaAlumnosModel("estudiante");

      //el foreach se utiliza para iterar sobre el array
      foreach ($respuesta as $row => $item) {
        echo '<tr>
              <td>'.$item["cedula"].'</td>
              <td>'.$item["nombre"].'</td>
              <td>'.$item["apellidos"].'</td>
              <td>'.$item["promedio"].'</td>
              <td>'.$item["edad"].'</td>
              <td>'.$item["fecha"].'</td>
              <td><a href="index.php?action=editarAlumno&id='.$item["id"].'"><button>Editar</button></a>
              </td>
              <td><a href="index.php?action=alumnos&idBorrarAlumno='.$item["id"].'"><button>Borrar</button></a></td>
              </tr>';
      }
    }

    public function registroAlumnoController(){

   if (isset($_POST["cedulaRegistro"])) {

     //recibe a traves del metodo POST  el name de usuario, password y email, ademas se almacenan los datos en un array con propiedades
     $datosController = array(
       'cedula' => $_POST['cedulaRegistro'],
       'nombre' => $_POST['nombreRegistro'],
       'apellido' => $_POST['apellidoRegistro'],
       'promedio' => $_POST['promedioRegistro'],
       'edad' => $_POST['edadRegistro'],
       'fecha' => $_POST['fechaRegistro'],
       'password' => $_POST['contrasenaRegistro']);

       //se le dice al modelo registroUsuarioModel los datos que se van a almacenar

       $respuesta = Datos::registroAlumnoModel($datosController, "estudiante");

       //se impriome la vista de la respuesta del modelo
       if ($respuesta == "success") {
         header("location:index.php?action=ok");
       } else {
         header("location:index.php");
       }
     }
   }


    public function editarUsuarioController(){
      $datosController = $_GET["id"];
      $respuesta = Datos::editarUsuarioModel($datosController, "estudiante");

      echo '<input type="hidden" value=" '.$respuesta["id"].' " name="idEditar">
      <input type="text" value=" '.$respuesta["cedula"]. '" name="cedulaEditar" required>
      <input type="text" value=" '.$respuesta["nombre"]. '" name="nombreEditar" required>
      <input type="text" value=" '.$respuesta["apellidos"]. '" name="apellidoEditar" required>
      <input type="text" value=" '.$respuesta["promedio"]. '" name="promedioEditar" required>
      <input type="text" value=" '.$respuesta["edad"]. '" name="edadEditar" required>
      <input type="date" value=" '.$respuesta["fecha"]. '" name="fechaEditar" required>
      <input type="text" value=" '.$respuesta["password"]. '" name="passwordEditar" required>
      <input type="submit" value="Actualizar" name="usuarioEditar" required>';
    }

    //controlador actualizar usuario
    public function actualizarUsuarioController(){

      if (isset($_POST["usuarioEditar"])) {
        $datosController = array("id" => $_POST["idEditar"],
        'cedula' => $_POST['cedulaEditar'],
        'nombre' => $_POST['nombreEditar'],
        'apellidos' => $_POST['apellidoEditar'],
        'promedio' => $_POST['promedioEditar'],
        'edad' => $_POST['edadEditar'],
        'fecha' => $_POST['fechaEditar'],
        'password' => $_POST['passwordEditar']);

        $respuesta = Datos::actualizarUsuarioModel($datosController, "estudiante");

        //se recibe las respuesta del modelo
        if ($respuesta == "succes") {
          header("location:index.php?action=cambio");
        } else {
          echo "Error";
        }
      }
    }

    public function borrarUsuarioController(){

     if (isset($_GET["idBorrarAlumno"])) {

       $datosController = $_GET["idBorrarAlumno"];
       $respuesta = Datos::borrarUsuarioModel($datosController, "estudiante");

       //se recibe la respuesta del modelo
       if ($respuesta == "ok") {
         header("location:index.php?action=alumnos");
       }
     }
   }


    //universidades
    //vista de las universidades
    public function vistaUniversidadesController(){
      $respuesta = Datos::vistaUniversidadesModel("universidad");

      //el foreach se utiliza para iterar sobre el array
      foreach ($respuesta as $row => $item) {
        echo '<tr>
        <td>'.$item["nombre"].'</td>
        <td>'.$item["localidad"].'</td>
        <td><a href="index.php?action=editarUniversidad&id='.$item["id"].'"><button>Editar</button></a>
        </td>
        <td><a href="index.php?action=universidades&idBorrarUniversidad='.$item["id"].'"><button>Borrar</button></a></td>
        </tr>';
      }
    }

    //controlador registro de universidades
    public function registroUniversidadController(){

      if (isset($_POST["nombreUniversidad"])) {
        //Recibe a traves del metodo POST  el name de id, nombre ademas se almacenan los datos en un array con propiedades
        $datosController = array(
          'nombre' => $_POST['nombreUniversidad'],
          'localidad' => $_POST['localidad']);

          //Se le dice un modelo llamado registroUsuarioModel los datos que se van a almacenar
          $respuesta = Datos::registroUniversidadModel($datosController, "universidad");

          //se imprime la respuesta del modelo
          if ($respuesta == "success") {
            header("location:index.php?action=universidadOK");
          } else {
            header("location:index.php");
          }
        }
      }

      //controlador editar universidad
      public function editarUniversidadController(){
        $datosController = $_GET["id"];
        $respuesta = Datos::editarUniversidadModel($datosController, "universidad");

        echo '<input type="hidden" value=" '.$respuesta["id"].' " name="idEditarUniversidad">
        <input type="text" value=" '.$respuesta["nombre"]. '" name="nombreEditarUniversidad" required>
        <input type="text" value=" '.$respuesta["localidad"]. '" name="localidadEditarUniversidad" required>
        <input type="submit" value="Actualizar" name="universidadEditar" required>';
      }

      //controlador actualizar universidad
      public function actualizarUniversidadController(){

        if (isset($_POST["universidadEditar"])) {
          $datosController = array(
            "id" => $_POST["idEditarUniversidad"],
            "nombre" => $_POST["nombreEditarUniversidad"],
            "localidad" => $_POST["localidadEditarUniversidad"]);

            $respuesta = Datos::actualizarUniversidadModel($datosController, "universidad");

            //se recibe la respuesta del modelo
            if ($respuesta == "succes") {
              header("location:index.php?action=cambioUniversidad");
            } else {
              echo "Error";
            }
          }
        }

        //controlador borrar universidad
        public function borrarUniversidadController(){

          if (isset($_GET["idBorrarUniversidad"])) {

            $datosController = $_GET["idBorrarUniversidad"];
            $respuesta = Datos::borrarUniversidadModel($datosController, "universidad");

            //se recibe la respuesta del modelo
            if ($respuesta == "ok") {
              header("location:index.php?action=universidades");
            }
          }
        }

        //carrerar
        //vista de carreras
        public function vistaCarrerasController(){
          $respuesta = Datos::vistaCarrerasModel("carrera");

          //el foreach se utiliza se utiliza para ietrar sobre el array
          foreach ($respuesta as $row => $item) {
            echo '<tr>
            <td>'.$item["nombre"].'</td>
            <td><a href="index.php?action=editarCarrera&id='.$item["id"].'"><button>Editar</button></a>
            </td>
            <td><a href="index.php?action=carreras&idBorrarCarrera='.$item["id"].'"><button>Borrar</button></a></td>
            </tr>';
          }
        }

        //Controlador registro de carreras
        public function registroCarreraController(){

          if (isset($_POST["nombreCarrera"])) {
            //Recibe a traves del metodo POST  el name nombre ademas se almacenan los datos en un array con propiedades

            $datosController = array(
              'nombre' => $_POST['nombreCarrera']);

              //Se le dice un modelo llamado registroUsuarioModel los datos que se van a almacenar

              $respuesta = Datos::registroCarreraModel($datosController, "carrera");

              //se imprime la respuesta
              if ($respuesta == "success") {
                header("location:index.php?action=carreraOK");
              } else {
                header("location:index.php");
              }
            }
          }

          //controlador editar carrera
          public function editarCarreraController(){
            $datosController = $_GET["id"];
            $respuesta = Datos::editarCarreraModel($datosController, "carrera");

            echo '<input type="hidden" value=" '.$respuesta["id"].' " name="idEditarCarrera">
            <input type="text" value=" '.$respuesta["nombre"]. '" name="nombreEditarCarrera" required>
            <input type="submit" value="Actualizar" name="carreraEditar" required>';
          }

          //controlador actualizar carrera
          public function actualizarCarreraController(){

            if (isset($_POST["carreraEditar"])) {
              $datosController = array(
                "id" => $_POST["idEditarCarrera"],
                "nombre" => $_POST["nombreEditarCarrera"]);

                $respuesta = Datos::actualizarCarreraModel($datosController, "carrera");

                //se recibe la respuesta del modelo
                if ($respuesta == "succes") {
                  header("location:index.php?action=cambioCarrera");
                } else {
                  echo "Error";
                }
              }
            }

            //controlador borrar carrera
            public function borrarCarreraController(){

              if (isset($_GET["idBorrarCarrera"])) {

                $datosController = $_GET["idBorrarCarrera"];
                $respuesta = Datos::borrarCarreraModel($datosController, "carrera");

                //se recibe la respuesta del modelo
                if ($respuesta == "ok") {
                  header("location:index.php?action=carreras");
                }
              }
            }

            //asignatura
            //vista de asignatura
            public function vistaAsignaturaController(){
              $respuesta = Datos::vistaAsignaturaModel("asignado");

              //el foreach se utiliza para iterar sobre el array
              foreach ($respuesta as $row => $item) {
                echo '<tr>
                <td>'.$item["carrera"].'</td>
                <td>'.$item["universidad"].'</td>
                <td><a href="index.php?action=editarAsignatura&id='.$item["id"].'"><button>Editar</button></a>
                </td>
                <td><a href="index.php?action=asignaturas&idBorrarAsignatura='.$item["id"].'"><button>Borrar</button></a></td>
                </tr>';
              }
            }

            //controlador registro de carreras
            public function registroAsignaturaController(){

              if (isset($_POST["nombreUniversidad"])) {
                //recibe a traves del metodo POST  el name de carrera, universidad ademas se almacenan los datos con sus propiedades

                $datosController = array(
                  'carrera' => $_POST['nombreCarrera'],
                  'universidad' => $_POST['nombreUniversidad']);

                  //se le dice un modelo llamado registroUsuarioModel los datos que se van a almacenar
                  $respuesta = Datos::registroAsignaturaModel($datosController, "asignado");

                  //se imprime la respuesta del modelo
                  if ($respuesta == "success") {
                    header("location:index.php?action=asignadoOK");
                  } else {
                    header("location:index.php");
                  }
                }
              }

              //controlador editar proveedor
              public function editarAsignaturaController(){
                $datosController = $_GET["id"];

                echo '<input type="hidden" value=" '.$_GET["id"].' " name="idAsignatura">';

                echo '<td><B>Carrera</B></td>
                <td>
                <select name="editarCarrera">
                '.
                $respuesta = Datos::datosCarreraModel();
                foreach ($respuesta as $row => $item) {
                  $idCarrera = $item['id'];
                  $nombreCarrera = $item['nombre'];
                  echo "<option value='$idCarrera'>".$nombreCarrera."</option>";
                }'
                </td> </select><br>';
                echo '<input type="hidden" name="vacio">';

                echo '<br><td><B>Universidad</B></td>
                <td>
                <select name="editarUniversidad">
                '.
                $respuestaDos = Datos::datosUniversidadModel();
                foreach ($respuestaDos as $row => $item) {
                  $idUniversidad = $item['id'];
                  $nombreUniversidad = $item['nombre'];
                  echo "<option value='$idUniversidad'>".$nombreUniversidad."</option>";
                }'
                </td> </select><br>';
                echo '<input type="submit" value="Actualizar" name="asignadoEditar" required>';
              }

              //controlador actualizar proveedor
              public function actualizarAsignaturaController(){

                if (isset($_POST["asignadoEditar"])) {
                  $datosController = array(
                    "id" => $_POST["idAsignatura"],
                    "id_carrera" => $_POST["editarCarrera"],
                    "id_universidad" => $_POST["editarUniversidad"]);

                    $respuesta = Datos::actualizarAsignadoModel($datosController, "asignado");

                    //se recibe la respuesta del modelo
                    if ($respuesta == "succes") {
                      header("location:index.php?action=cambioAsignado");
                    } else {
                      echo "Error";
                    }
                  }
                }

                //controlador borrar carrera
                public function borrarAsignaturaController(){

                  if (isset($_GET["idBorrarAsignatura"])) {

                    $datosController = $_GET["idBorrarAsignatura"];
                    $respuesta = Datos::borrarAsignaturaModel($datosController, "asignado");

                    //se recibe respuesta del modelo
                    if ($respuesta == "ok") {
                      header("location:index.php?action=asignaturas");
                    }
                  }
                }

}
?>
