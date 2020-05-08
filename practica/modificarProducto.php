<?php
  //Se incluye la conexion asi como se manda a llamar la vairable que tomamos de la tabla de producto la cual es el id
  include_once "conn.php";
  $idProducto=$_POST["id"];
  //consulta con la cual le decimos a la pagina que producto vamos a editar
  $sql="SELECT p.idProducto AS id, p.nombre AS nombre, p.descripcion AS descripcion, p.precioVenta AS preciov, p.precioCompra AS precioc, p.color AS color, c.nombre AS pcategoria, f.nombre AS fnombre, c.idCategoria AS idCat, f.idFabricante AS idFab FROM productos p INNER JOIN categorias c ON p.fkCategoria = c.idCategoria INNER JOIN fabricantes f ON p.fkFabricante = f.idFabricante WHERE idProducto=$idProducto";
  $datos=mysqli_query($conn,$sql);
  $reg=mysqli_fetch_array($datos);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Modificar Producto</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <form action="modificarProductoFuncion.php" method="POST">
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
            <label>Descripcion</label>
            <input type="text" class="form-control" name="descripcion" value=<?php print_r($reg["descripcion"]); ?>>
          </div>
          <div class="col">
            <label>Precio Venta</label>
            <input type="text" class="form-control" name="preciov" value=<?php print_r($reg["preciov"]); ?>>
          </div>
        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row my-2 py-2">
            <div class="col">
                <label>Precio Compra</label>
                <input type="text" class="form-control" name="precioc" value=<?php print_r($reg["precioc"]); ?>>
              </div>
              <div class="col">
                <label>Color</label>
                <input type="text" class="form-control" name="color" value=<?php print_r($reg["color"]); ?>>
              </div>
        </div>
        <!-- Grid row -->
        <!-- Grid row -->
        <div class="row my-2 py-2">
            <div class="col">
              <div class="form-group"> 
                <label for="exampleFormControlSelect1">Categoria:</label>
                <select class="form-control" name="categoria">
                  <option selected value=<?php print_r($reg["idCat"]); ?>><?php print_r($reg["pcategoria"]); ?></option>
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
                  <option selected value=<?php print_r($reg["idFab"]); ?>><?php print_r($reg["fnombre"]); ?></option>
                  <?php $query = $mysqli -> query ("SELECT idFabricante, nombre FROM fabricantes");
                    while ($valores = mysqli_fetch_array($query)) {
                      if (!($reg["fnombre"]==$valores[nombre])) {
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