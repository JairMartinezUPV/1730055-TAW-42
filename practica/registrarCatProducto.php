<?php
//se manda a llamar la conexion y tambien a las variables mediante el metodo POST
include_once "conn.php";
$Nombre = $_POST['nombre'];

//se valida que los campos no esten vacios aunque esto tambien esta en el formulario mediante un required
if($Nombre==null ){
    echo '<script>alert("Asegúrese de llenar todos los campos")</script>';
    echo '<script type="text/javascript"> history.back();</script>';
}else{
    //consulta con la cual se registra el producto
    $sql = "INSERT INTO categorias (nombre) VALUES ('$Nombre')";
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
