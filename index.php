<?php
  require "utils/utils.php";
  require "entities/imagenGaleria.class.php";

  $galeria = [];

  for ($i = 1; $i <= 12; $i++) {
      $nombre = "$i.jpg";
      $descripcion = "descripción imagen $i";
      $numVisualizaciones = rand(0, 2000);
      $numLikes = rand(0, 1000);
      $numDownloads = rand(0, 500);

      $galeria[] = new ImagenGaleria($nombre, $descripcion, $numVisualizaciones, $numLikes, $numDownloads);
  }

  require "views/index.view.php";
?>