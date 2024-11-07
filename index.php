<?php
  require "utils/utils.php";
  require "entities/imagenGaleria.class.php";
  require "entities/partners.class.php";
  include_once "partners.php";

  $galeria = [];

  for ($i = 1; $i <= 12; $i++) {
      $nombre = "$i.jpg";
      $descripcion = "descripción imagen $i";
      $numVisualizaciones = rand(0, 2000);
      $numLikes = rand(0, 1000);
      $numDescargas = rand(0, 500);

      $galeria[] = new ImagenGaleria($nombre, $descripcion, $numVisualizaciones, $numLikes, $numDescargas);
  }

  $partners = [];
  for ($i = 1; $i <= 3 ; $i++) { 
    $partner = new Partner("Partners $i", "log$i.jpg", "Descripción del Partners $i");
    array_push($partners, $partner);
  }

  if (count($partners) > 3) {
    $partners = obtenerTresAleatorios($partners);
  }

  require "views/index.view.php";
?>