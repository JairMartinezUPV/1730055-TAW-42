<?php
// se manda a llamar la conexion
include_once "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agregar Fabricante</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form action="registrarFabricante.php" method="POST">
      <!-- Default input -->
      <div class="form-group">
        <!-- Grid row -->
        <div class="row my-2 py-2">
          <div class="col">
            <input type="hidden" name="id" required>
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
          </div>
          <div class="col">
            <label>Direccion</label>
            <input type="text" class="form-control" name="direccion" required>
          </div>
          <div class="col">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" required>
          </div>
        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row my-2 py-2">
            <div class="col">
                <label>Telefono</label>
                <input type="text" class="form-control" name="telefono"  required>
              </div>
              <div class="col">
              <div class="form-group"> 
                <!--Tomamos los datos que esten en la tabla de categorias para este select-->
                <label for="exampleFormControlSelect1">Categoria:</label>
                <select class="form-control" name="categoria">
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