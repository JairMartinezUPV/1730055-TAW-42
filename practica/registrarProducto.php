<?php
//se manda a llamar la conexion y tambien a las variables mediante el metodo POST
include_once "conn.php";
$Nombre = $_POST['nombre'];
$Descripcion = $_POST['descripcion'];
$Preciov = $_POST['preciov'];
$Precioc = $_POST['precioc'];
$Color = $_POST['color'];
$Categoria = $_POST['categoria'];
$Fabricante = $_POST['fabricante'];

//se valida que los campos no esten vacios aunque esto tambien esta en el formulario mediante un required
if($Nombre==null || $Descripcion==null || $Preciov==null || $Precioc==null || $Color==null){
    echo '<script>alert("Asegúrese de llenar todos los campos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
}else{
    //consulta con la cual se registra el producto
    $sql = "INSERT INTO productos (nombre, descripcion, precioVenta, precioCompra, color, fkCategoria, fkFabricante) VALUES ('$Nombre','$Descripcion', '$Preciov', '$Precioc', '$Color', '$Categoria', '$Fabricante')";
    if(mysqli_query($conn,$sql)){      
          echo '<script>alert("Registro hecho")</script>';
          echo "<script>location.href='index.php'</script>";
      }else{
          echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
          echo '<script type="text/javascript"> history.back();</script>';
          //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
}


?>
