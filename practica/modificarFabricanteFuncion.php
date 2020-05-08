<?php 
	// se incluye la conexion y se llaman a las variables mediante el metodo POST
	include "conn.php";
	$id=$_POST["id"];
	$nombre=$_POST["nombre"];
	$direccion=$_POST["direccion"];
	$correo=$_POST["correo"];
	$telefono=$_POST["telefono"];
	$categoria=$_POST["categoria"];

	//consulta con la cual se actualizara el producto
	$sql="UPDATE fabricantes SET nombre='$nombre', direccion='$direccion', correo='$correo', telefono='$telefono', fkcatfabricante=$categoria WHERE idFabricante=$id";
	
	if (mysqli_query($conn,$sql)) {
		echo '<script>alert("Fabricante editado exitosamente")</script>';
    	echo "<script>location.href='fabricantes.php'</script>";
	}else{
    	echo '<script>alert("Ocurrió un error al tratar de actualizar el fabricante")</script>';
    	echo "<script>location.href='fabricantes.php'</script>";
	}
?>