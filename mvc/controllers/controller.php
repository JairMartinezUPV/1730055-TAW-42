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
			$respuesta = Datos::registroUsuariosModel($datosController,"usuarios");

			//se imprime la respuesta en la vista
			if ($respuesta == "succes") {
				header(string:"location:index.php?action=ok");
			}else{
				header(string:"location:index.php");
			}
		}
	}
}

?>