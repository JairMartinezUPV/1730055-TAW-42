<?php 
	// se incluye la conexion y se llaman a las variables mediante el metodo POST
	include "conn.php";
	$id=$_POST["id"];
	$nombre=$_POST["nombre"];
	$descripcion=$_POST["descripcion"];
	$precioventa=$_POST["preciov"];
	$preciocompra=$_POST["precioc"];
	$color=$_POST["color"];
	$categoria=$_POST["categoria"];
	$fabricante=$_POST["fabricante"];

	//consulta con la cual se actualizara el producto
	$sql="UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precioVenta='$precioventa', precioCompra='$preciocompra', color='$color', fkCategoria=$categoria, fkFabricante=$fabricante WHERE idProducto=$id";
	
	if (mysqli_query($conn,$sql)) {
		echo '<script>alert("Producto editado exitosamente")</script>';
    	echo "<script>location.href='index.php'</script>";
	}else{
    	echo '<script>alert("Ocurrió un error al tratar de actualizar el producto")</script>';
    	echo "<script>location.href='index.php'</script>";
	}
?>