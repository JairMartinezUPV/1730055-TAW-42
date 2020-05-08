<?php
include_once "conn.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Practica</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>


<body>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="row r1">
        <div class="col-md-9 col1">
          <h1>Productos</h1>
        </div>
        <div class="col-md-3 col2 my-2">
          <a class="btn btn-md btn-block b4" href="agregarProducto.php">Agregar Producto</a>
        </div>
      </div>
      <div class="container-fluid" >
        <table class="table table-hover table-bordered" id="dtUs">

          <thead class="bg-primary table1">
            <tr>
              <th scope="col">Nombres</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Precio Venta</th>
              <th scope="col">Precio Compra</th>
              <th scope="col">Color</th>
              <th scope="col">Categoria</th>
              <th scope="col">Fabricante</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($conn->query('SELECT p.idProducto AS id, p.nombre AS nombre, p.descripcion AS descripcion, p.precioVenta AS preciov, p.precioCompra AS precioc, p.color AS color, c.nombre AS pcategoria, f.nombre AS fnombre FROM productos p INNER JOIN categorias c ON p.fkCategoria = c.idCategoria INNER JOIN fabricantes f ON p.fkFabricante = f.idFabricante') as $row){ ?>
              <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['descripcion'] ?></td>
                <td><?php echo $row['preciov'] ?></td>
                <td><?php echo $row['precioc'] ?></td>
                <td><?php echo $row['color'] ?></td>
                <td><?php echo $row['pcategoria'] ?></td>
                <td><?php echo $row['fnombre'] ?></td>
                <td>
                  <div class="row justify-content-center">
                    <div class="col-6 justify-content-center">
                      <span>
                        <form action="modificarUser.php" method="POST">
                          <input type=image src="img/edit.png" width="20" data-toggle="tooltip" data-placement="top" title="Modificar">
                          <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                        </form>
                      </span>
                    </div>
                    <div class="col-6 justify-content-center">
                      <span>
                        <form action="borrarUser.php" method="POST">
                          <input type=image src="img/trash.png" width="20" data-toggle="modal" data-target="#delete" >
                          <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                        </form>
                      </span>
                    </div>

                  </div> <!-- div del row -->
                </td> <!-- espacio de las opciones -->
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
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
  <script type="text/javascript" src="js/addons/datatables-select.min.js"></script>
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <link href="css/addons/datatables-select.min.css" rel="stylesheet">
</body>


</html>
