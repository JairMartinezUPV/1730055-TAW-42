<?php
	include "conn.php";
	$id=$_POST["id"];
	$sql="DELETE FROM productos WHERE idProducto=$id";
	if (mysqli_query($conn,$sql)) {
		echo '<script>alert("Producto eliminado exitosamente")</script>';
    	echo "<script>location.href='index.php'</script>";
	}else{
    	echo '<script>alert("Ocurrió un error al tratar de eliminar el producto")</script>';
    	echo "<script>location.href='index.php'</script>";
	}
?>