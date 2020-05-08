<?php
  //Se incluye la conexion asi como se manda a llamar la vairable que tomamos de la tabla de producto la cual es el id
  include_once "conn.php";
  $idFabricante=$_POST["id"];
  //consulta con la cual le decimos a la pagina que producto vamos a editar
  $sql="SELECT f.idFabricante AS id, f.nombre AS nombre, f.direccion AS direccion, f.correo AS correo, f.telefono AS telefono, f.fkcatfabricante AS categoria, c.nombre AS fcategoria, c.idCatFabricante AS idcatf FROM fabricantes f INNER JOIN catfabricantes c ON f.fkcatfabricante = c.idCatFabricante WHERE idFabricante=$idFabricante";
  $datos=mysqli_query($conn,$sql);
  $reg=mysqli_fetch_array($datos);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Modificar Fabricante</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form action="modificarFabricanteFuncion.php" method="POST">
      <!-- Default input -->
      <!--Se colocan en los inputs la informacion que se habia registradi para el producto-->
      <div class="form-group">
        <!-- Grid row -->
        <div class="row my-2 py-2">
          <div class="col">
            <input type="hidden" name="id" value=<?php print_r($reg["id"]); ?>>
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" value=<?php print_r($reg["nombre"]); ?>>
          </div>
          <div class="col">
            <label>Direccion</label>
            <input type="text" class="form-control" name="direccion" value=<?php print_r($reg["direccion"]); ?>>
          </div>
          <div class="col">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" value=<?php print_r($reg["correo"]); ?>>
          </div>
        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row my-2 py-2">
            <div class="col">
                <label>Telefono</label>
                <input type="text" class="form-control" name="telefono" value=<?php print_r($reg["telefono"]); ?>>
              </div>
              <div class="col">
              <div class="form-group"> 
                <label for="exampleFormControlSelect1">Categoria:</label>
                <select class="form-control" name="categoria">
                  <option selected value=<?php print_r($reg["idcatf"]); ?>><?php print_r($reg["fcategoria"]); ?></option>
                <?php $query = $mysqli -> query ("SELECT idCatFabricante, nombre FROM catfabricantes");
                    while ($valores = mysqli_fetch_array($query)) {
                      if (!($reg["fcategoria"]==$valores[nombre])) {
                        echo '<option value="'.$valores[idCatFabricante].'">'.$valores[nombre].'</option>';
                      }
                    } ?>
                </select>
              </div>
            </div>
        </div>
        <!-- Grid row -->
      </div>
      <a class="btn btn-sm b5" href="fabricantes.php">Cancelar</a>
      <button type="submit" class="btn btn-sm b4">Guardar</button>
      <!-- Default form group -->
      </div>
    </form>
  </div>

  <!-- SCRIPTS NO MOVERLE-->
      <!-- JQuery -->
      <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- MDBootstrap Datatables  -->
      <script type="text/javascript" src="js/addons/datatables.min.js"></script>

</body>
</html>