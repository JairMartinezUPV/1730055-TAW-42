<?php

  class Conexion{
    public function conectar(){
      $link = new PDO("mysql:host=localhost;dbname=practica2","root","");
      return $link;
    }
  }

 ?>
