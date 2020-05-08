<?php
include_once "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agregar Producto</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form action="registrarProducto.php" method="POST">
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
            <label>Descripcion</label>
            <input type="text" class="form-control" name="descripcion" required>
          </div>
          <div class="col">
            <label>Precio Venta</label>
            <input type="text" class="form-control" name="preciov" required>
          </div>
        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row my-2 py-2">
            <div class="col">
                <label>Precio Compra</label>
                <input type="text" class="form-control" name="precioc"  required>
              </div>
              <div class="col">
                <label>Color</label>
                <input type="text" class="form-control" name="color"  required>
              </div>
        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row my-2 py-2">
            <div class="col">
              <div class="form-group"> 
                <label for="exampleFormControlSelect1">Categoria:</label>
                <select class="form-control" name="categoria">
                <?php $query = $mysqli -> query ("SELECT idCategoria, nombre FROM categorias");
                    while ($valores = mysqli_fetch_array($query)) {
                      if (!($reg["pcategoria"]==$valores[nombre])) {
                        echo '<option value="'.$valores[idCategoria].'">'.$valores[nombre].'</option>';
                      }
                    } ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Fabricante:</label>
                <select class="form-control" name="fabricante">
                  <?php $query = $mysqli -> query ("SELECT idFabricante, nombre FROM fabricantes");
                    while ($valores = mysqli_fetch_array($query)) {
                      if (!($reg["fabricante"]==$valores[nombre])) {
                        echo '<option value="'.$valores[idFabricante].'">'.$valores[nombre].'</option>';
                      }
                    } ?>
                </select>
              </div>
            </div>
        </div>
        <!-- Grid row -->
      </div>
      <a class="btn btn-sm b5" href="index.php">Cancelar</a>
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