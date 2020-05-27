<?php

  session_start();
  if (!$_SESSION["validar"]) {
    header("location:index.php?action=ingresar");
  }

 ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bethany Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v2.0.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

 <h1>Lista de Universidades</h1>

<table class="table table-condensed">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Localidad</th>
      <th>¿Editar?</th>
      <th>¿Borrar?</th>
    </tr>
  </thead>
  <tbody>
    <center>
    <!--boton para agregar una universidad-->
    <a href="index.php?action=nuevaUniversidad"><button>Agregar universidad</button></a>
    </center>
    <?php

    $vistauniversidad = new MvcController();
    $vistauniversidad -> vistaUniversidadesController();
    $vistauniversidad -> borrarUniversidadController();

    ?>
  </tbody>
</table>
<?php

  if (isset($_GET["action"])) {
    if ($_GET["action"] == "cambio") {
      echo "Cambio exitoso";
    }
  }

 ?>
