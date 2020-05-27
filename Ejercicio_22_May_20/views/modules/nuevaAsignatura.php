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
<h1>Resgistro de Asignatura</h1>
<!--formulario para ingresar un nuevo elemento-->
<form method="post">
  <td><B>Carrera</B></td>
  <td>
  <select name="nombreCarrera">
    <?php
    $respuesta = Datos::datosCarreraModel();
    foreach ($respuesta as $row => $item) {
      $idCarrera = $item['id'];
      $nombreCarrera = $item['nombre'];
      echo "<option value='$idCarrera'>".$nombreCarrera."</option>";
    }
    ?>
  </td> </select>
  <br>
  <td><B>Universidad</B></td>
  <td>
  <select name="nombreUniversidad">
    <?php
    $respuesta = Datos::datosUniversidadModel();
    foreach ($respuesta as $row => $item) {
      $idUniversidad = $item['id'];
      $nombreUniversidad = $item['nombre'];
      echo "<option value='$idUniversidad'>".$nombreUniversidad."</option>";
    }
    ?>
  </td> </select>
  <input type="submit" value="Enviar">
</form>

<?php

  //envia los parametros al controlador
  $registro = new MvcController();
  $registro -> registroAsignaturaController();

  if (isset($_GET["action"])) {
    if ($_GET["action"] == "asignadoOK") {
      echo "Registro exitoso";
    }
  }

 ?>
