<?php
	//se manda a llamar la conexion y el id del producto que vamos a eliminar
	include "conn.php";
	$id=$_POST["id"];
	$sql="DELETE FROM fabricantes WHERE idFabricante=$id";
	if (mysqli_query($conn,$sql)) {
		echo '<script>alert("Producto eliminado exitosamente")</script>';
    	echo "<script>location.href='fabricantes.php'</script>";
	}else{
    	echo '<script>alert("Ocurrió un error al tratar de eliminar el producto")</script>';
    	echo "<script>location.href='fabricantes.php'</script>";
	}
?>