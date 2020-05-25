<?php
include_once "models/crud.php";
include_once "models/crudProd.php";

	class MvcController{

		public function ingresoUsuarioController(){
			if(isset($_POST["txtUser"]) && isset($_POST["txtPassword"])){
				$datosController = array("user"=>$_POST["txtUser"],"password"=>$_POST["txtPassword"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController,"users");
				if ($respuesta["usuario"]==$_POST["txtUser"] && password_verify($_POST["txtPassword"],$respuesta["contrasena"])) {
					session_start()
				}
			}
		}

		public function vistaUsersController(){
			$respuesta = Datos::vistaUsersModel("users");
			foreach ($respuesta as $row => $item) {
				echo '
					<tr>
						<td>
							<a href="index.php?actiom=usuarios&idUserEditar='.$item["id]"';
			}
		}

	}

?>