<?php
include_once "models/crud.php";
include_once "models/crudProd.php";

	class MvcController{
		#llamada a la plantilla
		public function pagina(){
			include "views/template.php";
		}

		//enlaces
		public function enlacesPaginasController{
			if(isset($_GET['action'])){
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//Es el momento en que el controlador invoca el modelo enalcesPaginaModel para que muestre el listaaod de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		//registro
		public function registroUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){
				//recibe a traves del metoddo post el name de usuario, passwoer y email se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
				$datosController= array("usuario"=>$_POST["usuarioRegistro"],"password"=>$_POST["passwordRegistro"],"email"=>$_POST["emailRegistro"]);
				//se le dice al modelo model/crud.php (Datos:registroUsuarioModel), en que modelo Datos el metodo registroUsuarioMOdel reciba en sus parmatros los valores $datoaController y el nombre de la tabla a ala cual debe conectarse

				$respuesta =Datos::registroUsuarioModel($datosController,"usuarios");
				//se imprime la respuesta en la vista
				if($respuesta=="success"){
					header(string: "location:index.php?action=ok");
				}else{
					header(string: "location:index.php");
				}
			}
		}

		//registro de productos
		public function registroProductoController(){
			if(isset($_POST["productoRegistro"])){
                //recibea traves del metodo post nel name de nombre, descripcion, pc, pv, invetnario y se almacenan los datos en una variable o pripoead de tipo array asociativo con sus respectivas propiedades.
                $datosController = array("nombre"=>$_POST["productoRegistro"],
                                          "descripcion"=>$_POST["descripcionRegistro"],
                                          "pv"=>$_POST["pvRegistro"],
                                          "pc"=>$_POST["pcRegistro"],
                                          "inventario"=>$_POST["inventarioRegistro"]);
                 
                 //Se mandan los datos al modelo 
                $respuesta = Datos2::registroProductoModel($datosController,"productos");
                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=okproduct");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		//registro de categoerias
		public function registroCategoriaController(){
			if(isset($_POST["categoriaRegistro"])){

                //recibe a traves del metodo post el name de nombre y se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
                $datosController = array("nombre"=>$_POST["categoriaRegistro"]);
                 
                 //Se mandan los datos al modelo 
                $respuesta = Datos2::registroCategoriaModel($datosController,"categorias");

                //se imprime la respuesta en la vista
                if($respuesta == "success"){
                    header("location:index.php?action=okcategoria");
                }
                else{
                    header("location:index.php");
                }
           
            }
		}

		//INgreso usuarios
		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){
				$datosController= array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);
				$respuesta= Datos::ingresoUsuarioModel($datosController,"usuarios");
				//validar la repsuesta de modelo
				if($respuesta["usuario"]==$_POST["usuarioIngreso"] $$ $respuesta["password"]== $_POST["passwordIngreso"]){
					$_SESSION["validar"]=true;
					header("location:index.php?action=usuarios");
				}else{
					header("location:index.php?action=fallo");
				}
			}
		}


		//Vista de usuarios
		public function vistaUsuariosController(){
			$respuesta=Datos::vistaUsuarioModel("usuarios");
			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td>'.$item["usuario"].'</td>
						<td>'.$item["password"].'</td>
						<td>'.$item["email"].'</td>
						<td><a href=index.php?action=editar&idBorrar='.$item["id"].'<button>Borrar</button></td>

						<td><a href=index.php?action=usuarios&idEditar='.$item["id"].'<button>Editar</button></td>';
			}
		}

		//Vista de productos
		public function vistaProductosController(){
			$respuesta = Datos2:: vistaProductosModel("productos");
			//se utiliza un foreach para recorrer un array e imprimir la consulta del modelo
			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td>'.$item["descripcion"].'</td>
					<td>'.$item["pv"].'</td>
					<td>'.$item["pc"].'</td>
					<td>'.$item["inventario"].'</td>
					<td><a href="index.php?action=editarProducto&id='.$item["id"].
					'"><button>Editar</button></a></td>
					<td><a href="index.php?action=producto&idBorrar='.$item["id"].
					'"><button>Borrar</button></a></td>';
			}
		}

		//Vista de categorias
		public function vistaCategoriasController(){
			$respuesta = Datos2:: vistaCategoriasModel("categorias");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
					<td>'.$item["nombre"].'</td>
					<td><a href="index.php?action=editarCategoria&id='.$item["id"].
					'"><button>Editar</button></a></td>
					<td><a href="index.php?action=categorias&idBorrar='.$item["id"].
					'"><button>Borrar</button></a></td>';
			}
		}

		//Editar usuario
		public function editarUsuarioController(){
			$datosController=$_GET["id"];
			$respuesta=Datos::editarUsuarioModel($datosController,"usuarios");

			//Diseñar la estructura de un formulario para que se muestre los datos de la consulta generada en el modelo.
			echo ('<input type="hidden" value="'.$respuesta["id"].'" name=""idEditar">
			<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			<input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>');
		}

		//Editar producto
		public function editarProductoController(){
			$datosController = $_GET["id"];
			$respuesta=Datos2::editarProductoModel($datosController,"productos");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" value="'.$respuesta["nombre"].'" name="productoEditar" required>
			<input type="text" value="'.$respuesta["descripcion"].'" name="descripcionEditar" required>
			<input type="number" value="'.$respuesta["pv"].'" name="pvEditar" required>
			<input type="number" value="'.$respuesta["pc"].'" name="pcEditar" required>
			<input type="number" value="'.$respuesta["inventario"].'" name="inventarioEditar" required>
			<input type="submit" value="Confirmar">';
		}

		//Editar categoria
		public function editarCategoriaController(){
			$datosController = $_GET["id"];
			$respuesta=Datos2::editarCategoriaModel($datosController,"categorias");

			//Diseñar la estructura de un formulario para que se muestren losdatos de la consulta generada en el modelo
			echo ' <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required>
			<input type="text" value="'.$respuesta["nombre"].'" name="categoriaEditar" required>
			<input type="submit" value="Confirmar">';
		}
       
		public function actualizarUsuarioController(){
			if(isset($_POST["usuarioEditar"])){
				$datosController=array("id"=>$_POST["idEditar"], "usuario"=>$_POST["usuarioEditar"],"password"=>$_POST["passwordEditar"], "email"=>$_POST["emailEditar"]);
				$respuesta=Datos::actualizarUsuarioModel($datosController,"usuarios");
				if($respuesta=="succes"){
					header("location:index.php?action=cambio");
				}else{
					echo("error");
				}
			}
		}

		//Actualizar producto
		public function actualizarProductoController(){
			if (isset($_POST["productoEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"nombre"=>$_POST["productoEditar"],
										"descripcion"=>$_POST["descripcionEditar"],
										"pv"=>$_POST["pvEditar"],
										"pc"=>$_POST["pcEditar"],
										"inventario"=>$_POST["inventarioEditar"]);
				$respuesta=Datos2::actualizarProductoModel($datosController,"productos");

				if($respuesta == "success"){
					header("location: index.php?action=cambioproduct");
				}else{
					echo "error";
				}
			}
		}

		//Actualizar categoria
		public function actualizarCategoriaController(){
			if (isset($_POST["categoriaEditar"])) {
				$datosController=array("id"=>$_POST["idEditar"],
										"nombre"=>$_POST["categoriaEditar"]);
				$respuesta=Datos2::actualizarCategoriaModel($datosController,"categorias");

				if($respuesta == "success"){
					header("location: index.php?action=cambiocategoria");
				}else{
					echo "error";
				}
			}
		}

		public function borrarUsuariosController(){
			if(isset($_GET["idBorrar"])){
				$datosController=$_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");
				if($respuesta=="success"){
					header("location:index.php?action=usuarios");
				}
			}
		}

		//Borrar producto
		public function borrarProductoController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos2::borrarProductoModel($datosController,"productos");
				if ($respuesta=="success") {
					header("location: index.php?action=producto");
				}
			}
		}

		//Borrar categoria
		public function borrarCategoriaController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos2::borrarCategoriaModel($datosController,"categorias");
				if ($respuesta=="success") {
					header("location: index.php?action=categorias");
				}
			}
		}

		//LISTA DE MODELOS POR DESARROLLAR:
		/*
		* 1. registroUsuariosModel
		* 2. ingresoUsuariosModel
		* 3. vistaUsuarioModel
		* 4. editarUsuarioModel
		* 5. actualizarUsuarioModel
		* 6. borrarUsuarioModel
		*/
	}
?>