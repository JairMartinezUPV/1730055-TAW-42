<?php
//se manda a llamar la conexion y tambien a las variables mediante el metodo POST
include_once "conn.php";
$Nombre = $_POST['nombre'];
$Direccion = $_POST['direccion'];
$Correo = $_POST['correo'];
$Telefono = $_POST['telefono'];
$Categoria = $_POST['categoria'];

//se valida que los campos no esten vacios aunque esto tambien esta en el formulario mediante un required
if($Nombre==null || $Direccion==null || $Correo==null || $Telefono==null || $Categoria==null){
    echo '<script>alert("Asegúrese de llenar todos los campos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
}else{
    //consulta con la cual se registra el producto
    $sql = "INSERT INTO fabricantes (nombre, direccion, correo, telefono, fkcatfabricante) VALUES ('$Nombre','$Direccion', '$Correo', '$Telefono', '$Categoria')";
    if(mysqli_query($conn,$sql)){      
          echo '<script>alert("Registro hecho")</script>';
          echo "<script>location.href='fabricantes.php'</script>";
      }else{
          echo '<script>alert("Asegurate de proporcionar datos correctos")</script>';
          echo '<script type="text/javascript"> history.back();</script>';
          //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
}


?>
