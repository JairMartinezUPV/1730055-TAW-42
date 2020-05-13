<?php  
class MvcController{
	#llamadda a la plantilla
	public function pagina(){
		include "views/template.php";
	}

	//enlaces
	public function enlacesPaginasController(){
		$if (isset($_GET['action'])) {
			$enlaces = $_GET['action'];
		}else{
			$enlaces = 'index'
		}

		//es el momento en que el controlador invoca al modelo llamado "enlacesPaginasModel para que muestre el listado de paginas"
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	//Registro de usuarios
	public function registroUsuarioController(){
		if (isset($_POST["usuarioRegistro"])) {
			//recibe a traves del metodo POST el name(html) de usuario, password y email, se almacenan los datos en una variable opropiedad de tipo array asociativo con sus respectivas propiedades (usuario, password, email)
			$datosController = array("usuario"=>$_POST["usuarioRegistro"],"password"=>$_POST["passwordRegistro"],"email"=>$_POST["emailRegistro"])
			//se le dice al modelo models/crud.php (Datos::registroUsuariosModel), que en el modelo Datos el metodo registroUsuariosModel reciba en sus parametros los valores $datosController y el nombre de la tabla a la cual debe de conectarse (usuarios)
			$respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

			//se imprime la respuesta en la vista
			if ($respuesta == "succes") {
				header(string:"location:index.php?action=ok");
			}else{
				header(string:"location:index.php");
			}
		}
	}

	//ingreso usuarios
	public function ingresoUsuarioController(){
		if (isset($_POST["usuarioIngreso"]) {
			$datosController = array("usuario" => $_POST["usuarioIngreso"], 
				                     "password" => $_POST["passwordIngreso"]];
			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			//validar la respuesta del modelo para ver si es un usuario correcto
			if ($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]) {
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}

	//vistas de usuarios
	public function vistaUsuariosController(){
		$respuesta=Datos::vistaUsuarioModel("usuarios");
		//utilizar un foreach para iterar un array e imprimir la consulta del modelo

		foreach ($respuesta as $row => $item) {
			echo '<tr>
			      <td'.item["usuario"].'</td>
			      <td'.item["password"].'</td>
			      <td'.item["email"].'</td>
			      <td<a href = "index.php?action=usuarios&idEditar='.$item["id"].'"<button>Editar</button></a></td>
			      <td<a href = "index.php?action=usuarios&idBorrar='.$item["id"].'"<button>Borrar</button></a></td>
			      </tr>';
		}
	}
}

?>