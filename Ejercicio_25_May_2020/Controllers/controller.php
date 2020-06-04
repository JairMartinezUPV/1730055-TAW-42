<?php
//include_once "models/crud.php";
//include_once "models/crudProd.php";

	class MvcController{
		
		#llamar a la plantilla
		public function pagina(){
			include "views/template.php";
		}

		// ENLACES A LAS PAGINAS
		public function enlacesPaginasController(){
			if (isset($_GET['action'])) {
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//Es el momento en que el controlador invoca al modelo llamado enlacesPaginasModel para que muestre el listado de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		public function vistaUserController(){
			?>
			<div class="col-md-6 mt-3">
				<div class="card card-primary">
					<div class="card-header">
						<h4><b>Registro</b> de Usuario</h4>
					</div>
					<div class="card-body">
						<form method="post" action="index.php?action=usuarios">
							<div class="form-group">
								<label>Nombre: </label>
								<input class="form-control" type="text" name="nusuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Apellido: </label>
								<input class="form-control" type="text" name="ausuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Usuario: </label>
								<input class="form-control" type="text" name="usuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Contraseña: </label>
								<input class="form-control" type="text" name="ucontratxt" placeholder="Ingrese nombre" required>
							</div>
							<div class="form-group">
								<label>Correo Electronico: </label>
								<input class="form-control" type="text" name="nusuariotxt" placeholder="Ingrese nombre" required>
							</div>
							<button class="btn btn-primary" type="submit">Agregar</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}

		public function insertarUserController(){
			if (isset($_POST["nusuariotxt"])) {
				
				$_POST["ncontratxt"] = password_hash($_POST["ncontratxt"],PASSWORD_DEFAULT);

				$datosController = array["nusuario" => $_POST["nusuariotxt"],"ausuario" => $_POST["ausuariotxt"],"usuario" => $_POST["usuariotxt"],"contra" => $_POST["ucontratxt"],"email"=>$_POST["uemailtxt"];

				$respuesta = Datos::insertarUserModel($datosController,"users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario agregado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de agregar un usuario
							</div>
						</div>
					';
				}
			}
		}

		public function editarUserController(){
			$datosController = $_GET["idUserEditar"];
			$respuesta = Datos::editarUserModel($datosController,"users");
			?>
            <div class="col-md-6 mt-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4><b>Editor</b> de Usuarios</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="index.php?action=usuarios">
                            <div class="form-group">
                                <input type="hidden" name="idUserEditar" class="form-control" value="<?php echo $respuesta["id"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nusuariotxtEditar">Nombre: </label>
                                <input class="form-control" type="text" name="nusuariotxtEditar" id="nusuariotxtEditar" placeholder="Ingrese el nuevo nombre" value="<?php echo $respuesta["nusuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ausuariotxtEditar">Apellido: </label>
                                <input class="form-control" type="text" name="ausuariotxtEditar" id="ausuariotxtEditar" placeholder="Ingrese el nuevo apellido" value="<?php echo $respuesta["ausuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="usuariotxtEditar">Usuario: </label>
                                <input class="form-control" type="text" name="usuariotxtEditar" id="usuariotxtEditar" placeholder="Ingrese el nuevo usuario" value="<?php echo $respuesta["usuario"]; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contratxtEditar">Contraseña: </label>
                                <input class="form-control" type="password" name="contratxtEditar" id="contratxtEditar" placeholder="Ingrese la nueva contraseña" required>
                            </div>
                            <div class="form-group">
                                <label for="uemailtxtEditar">Correo Electrónico: </label>
                                <input class="form-control" type="email" name="uemailtxtEditar" id="uemailtxtEditar" placeholder="Ingrese el nuevo correo electrónico" value="<?php echo $respuesta["email"]; ?>" required>
                            </div>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </div>
                    </div>
            </div>
            <?php
        }

        public function actualizarUserController(){
        	if (isset($_POST["nusuariotxtEditar"])) {
        		$_POST["contratxtEditar"]=password_hash($_POST["contratxtEditar"],PASSWORD_DEFAULT);

        		$datosController = array["nusuario"=>$_POST["nusuariotxt"],"ausuario"=>$_POST["ausuariotxt"],"usuario"=>$_POST["usuariotxt"],"contra"=>$_POST["ucontratxt"],"email"=>$_POST["uemailtxt"];

				$respuesta = Datos::actualizarUserModel($datosController,"users");

				if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario agregado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de agregar un usuario
							</div>
						</div>
					';
				}
        	}
        }


        public function eliminarUserController(){
        	if (isset($_GET["idBorrar"])) {
        		$datosController = $_GET["idBorrar"];

        		$respuesta = Datos::eliminarUserModel($datosController,"users");

        		if ($respuesta == "success") {
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Exito
								</h5>
								Usuario eliminado con exito
							</div>
						</div>
						';
				}else{
					echo '
						<div class="col-md-6 mt-3">
							<div class="alert alert-success alert-dismissible">
								<button>x</button>
								<h5>
									<i class="icon">
									Error
								</h5>
								Se ha producido un error al momento de eliminar un usuario
							</div>
						</div>
					';
				}
        	}
        }


		//INGRESO USUARIOS
		public function ingresoUserController(){
			if (isset($_POST["usuarioIngreso"]) && isset($_POST["txtPassword"])){
				$datosController=array("user" => $_POST["txtUser"],
										 "password" => $_POST["txtPasswordIngreso"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//Validar la respuesta del modelo para ver si es un usuario correcto.
				if($respuesta["usuario"] == $_POST["txtUser"] && $respuesta["password"] == $_POST["txtPassword"]){
					session_start();
					$_SESSION["validar"] = true;
					$_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
					$_SESSION["id"]=$respuesta["id"];
					header("location:index.php?action=tablero");
				}else{
					header("location: index.php?action=fallo&res=fallo");
				}

			}
		}

		//Controlador para cargar todos los datos de lo usuarios, la contraeña no se puede cargar debido a que independientemente de si se muestra o no, esta está encriptada.
        public function vistaUsersController(){
            $respuesta = Datos::vistaUsersModel("users");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class=fa fa-edit"></i></a>
                        </td>
                        <td>
                        <a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class=fa fa-trash"></i></a>
                        </td>
                        <td>'.$item["firstname"].'</td>
                        <td>'.$item["lastname"].'</td>
                        <td>'.$item["user_name"].'</td>
                        <td>'.$item["user_email"].'</td>
                        <td>'.$item["date_added"].'</td>
                    </tr>
                ';
            }
        }

        public function contarFilas(){
        	$respuesta_users = Datos::contarFilasModel("users");

        	echo '
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>'.$respuesta_users["filas"].'</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-address-card"></i>
                        </div>
                        <a class="small-box-footer" href="index.php?action=usuarios">Más <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>';
        }

        public function vistaProductsController(){
            $respuesta = Datos::vistaProductsModel("product");
            foreach ($respuesta as $row => $item){
                echo '
                    <tr>
                        <td>
                            <a href="index.php?action=usuarios&idUserEditar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Editar" data-toggle="tooltip"><i class=fa fa-edit"></i></a>
                        </td>
                        <td>
                        <a href="index.php?action=usuarios&idBorrar='.$item["id"].'" class="btn btn-warning btn-sm btn-icon" title="Eliminar" data-toggle="tooltip"><i class=fa fa-trash"></i></a>
                        </td>
                        <td>'.$item["id"].'</td>
                        <td>'.$item["codigo"].'</td>
                        <td>'.$item["producto"].'</td>
                        <td>'.$item["fecha"].'</td>
                        <td>'.$item["precio"].'</td>
                        <td>'.$item["stock"].'</td>
                        <td>'.$item["categoria"].'</td>
                        <td><a href="index.php?action=inventario&idProductAdd='.$item["id"].'" class="btn_warning btn -sm btn-icon" tittle="Agregar Stock""
                    </tr>
                ';
            }
        }

        public function registrarProductController(){
        	?>
        	<div class="col-md-6 mt-3"
        		<div class="card card-primary">
        		 	<div class="card-header">
        		 		<h4><b>Registro</b> de Productos</h4>
        		 		<div class="form-body">
        		 			<form method="POST" action="index.php?action?=inventario">
        		 				<div class="form-group">
        		 					<label for="nombretxt">Precio: </label>
        		 					<input class="form-control" name="nombretxt" id="nombretxt" type="number" min="1" required placeholder="Nombre del producto">

        }

         /*-- Esta funcion permite insertar productos llamando al modelo  que se encuentra en  elarchivo crud de modelos confirma con un isset que la caja de texto del codigo este llena y procede a llenar en una variable llamada datos controller este arreglo se manda como parametro aligual que elnombre de la tabla,una vez se obtiene una respuesta de la funcion del modelo de inserccion 
        tenemos que checar si la respuesta fue afirmativa hubo un error y mostrara los respectivas alerta,para insertar datos en la tabla de historial se tiene que mandar a un modelollamado ultimoproductmodel este traera el ultimo dato insertado que es el id del producto que se manda en elarray de datoscontroller2 junto al nombre de la tabla asi insertando los datos en la tabla historial --*/

        //////////////////////////////////////falta
        public function insertarProductController(){
        	else {
        		echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de agregar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
                }
        }
        <?php
        public function editarProductController(){
        	$datosController = $_GET["idProductEditar"];
        	$respuesta = Datos::editarProductModel($datosController,"products");
        	?>
        	<div class="col-mod-6 mt-3">
        		<div class="card card-warning">
        			<div class="card card-header">
        				<h4><b>Editor</b> de Productos</h4>
        			</div>
        			<div class="card-body">
        				<form method="post" action="index.php?action=inventario">
        					<div class="form-group">
        						<input type="hidden" name="idProductEditar" class="form-control" value="<?php echo $respuesta["id"];?>">
        					</div>
        					<div class="form-group">
        						<label for="stocktxteditar">Stock: </label>
        						 <input class="form-control" name="stocktxteditar" id="stocktxteditar" type="number" min="1" value="<?php echo $respuesta["stock"];?>" required placeholder="Cantidad de stock del producto">
        					</div
        			</div>
        }

         /*-- Esta funcion permite actualizar los datos en la tabla productos a partir del metodo form anterior mandando atravez del modelo del crud a traves del arreglo  y con la variable respuesta mandamos dichos datos porque se llama al modelo actualizarproductsmodel si en el modelo se realizo correctamente entonces mandara una alerta decorrecto y pasara allenar dichos datos en elmodelo de insertar historial model en caso contrario no se hara nada y mostrara mensaje de error --*/
        public funtion actualizarProductController(){
        	if (isset($_POST["codigotxteditar"])) {
        		$datosController = array("id"=>$_POST["idProductEditar"],"codigo"=>$_POST["codigotxteditar"],"precio"=>$_POST["preciotxteditar"],"stock"=>$_POST["stocktxteditar"],"categoria"=>$_POST["categoriaeditar"],"nombre"=>$_POST["nombretxteditar"]);
        		$respuesta = Datos::actualizarProductsModel($datosController,"products");
        		if ($respuesta == "success") {
        			$datoscontroller2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["stocktxteditar"],"producto"=>$_POST["idProductEditar"],"note"=$_POST["nombre_usuario"]."agrego/compro","refernce"=>$_POST["referenciatxteditar"]);
        			$respuesta2 = Datos::insertarHistorialModel($datosController2,"historial");
        				echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Exito!
                                </h5>
                                Producto eliminado con exito.
                            </div>
                        </div>
                    ';
        		} else {
        			echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Error!
                                </h5>
                                Se ha producido un error al momento de eliminar el producto, trate de nuevo.
                            </div>
                        </div>
                    ';
        		}
        	}
        }
        <?php
        public function addProductController(){
        	$datosController = $_GET["idProductAdd"];
        	$respuesta = Datos::editarProductModel($datosController,"products");
        	?>
        	<div class="col-md-6 mt-3"
        		<div class="card card-warning">
        			<div class="card card-header">
        				<h4><b>Agregar</b> stock del producto</h4>
        			</div>
        			<div class="card-body">
        				<form method="POST" action="index.php?action=inventario">
        				<div class="form-group">
        					<input type="hidden">
        				</div>
        			</div>
        		</div>
        	</div>
        }

        public function actualizar1StockController(){
        	if (isset($_POST["addstocktxt"])) {
        		$datosController = array("id"=>$_POST["idProductAdd"],"stock"=>$_POST["addstocktxt"]);
        		$respuesta = Datos::pushProductsModel($datosController,"products");
        		if ($respuesta=="success") {
        			$datoscontroller2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["addstocktxt]","Producto"=>$_POST["idProductAdd"],"note"=>$_SESSION["nombre_usuario"]."agrego/compro","reference"=>$_POST["referenciatxteditar"];
        				$respuesta2 = Datos::insertarHistorialModel($datoscontroller2,"historial");
        				echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Exito!
                                </h5>
                                stock actualizado con exito.
                            </div>
                        </div>
                    ';
        		}else{
        			echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Exito!
                                </h5>
                                Error al actualizar
                            </div>
                        </div>
                    ';
        		}
        	}
        }

        public function actualizar2StockController(){
        	if (isset($_POST["addstocktxt"])) {
        		$datosController = array("id"=>$_POST["idProductAdd"],"stock"=>$_POST["delstocktxt"]);
        		$respuesta = Datos::pushProductsModel($datosController,"products");
        		if ($respuesta=="success") {
        			$datoscontroller2 = array("user"=>$_SESSION["id"],"cantidad"=>$_POST["delstocktxt]","Producto"=>$_POST["idProductAdd"],"note"=>$_SESSION["nombre_usuario"]."quito","reference"=>$_POST["referenciatxteditar"];
        				$respuesta2 = Datos::insertarHistorialModel($datoscontroller2,"historial");
        				echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Exito!
                                </h5>
                                stock actualizado con exito.
                            </div>
                        </div>
                    ';
        		}else{
        			echo '
                        <div class="col-md-6 mt-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5>
                                    <i class="icon fas fa-ban"></i>
                                    ¡Exito!
                                </h5>
                                Error al actualizar
                            </div>
                        </div>
                    ';
        		}
        	}
        }




     
?>