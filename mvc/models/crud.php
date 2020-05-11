<?php  
require_once "conexion.php";
//heredar la clase conexion.php para poder accesar y utilizar la conexion a la base de datos, se extiende cuando se requiere manipular una funcion o un metodo, en este caso manipularemos la funcion "conectar" de models/conexion.php

class Datos extends Conexion
{
	//registro de usuarios 
	public function registroUsuarioModel($datosModel, $tabla){
		//prepare() prepara la sentencia de SQL para que sea ejecutada por el metodo POSTantement la sentencia de SQL se puede contener desde cero para ejecutar mas parametros 

		$stmt = Conexion::conectar()->("INSERT INTO %tabla (usuario, password, email) VALUES (:usuario,:password,:email)");

		//bindParam() vincula una variable de PHP a un parametro de sustitucion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia 

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		//regresar a una respuesta satosfactoria o no

		if ($stmt->execute()) {
			return "success";
		}else{
			return "error";
		}

		$stmt->close();

	}
}


?>