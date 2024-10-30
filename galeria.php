<?php
  require "utils/utils.php";
  require "entities/File.class.php";
  require "entities/imagenGaleria.class.php";

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $descripcion = trim(htmlspecialchars($_POST["descripcion"]));
        $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];
        $imagen = new File("imagen", $tiposAceptados);
        $imagen->saveUploadFile(imagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY, imagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        
        // Mensaje de éxito
        $mensaje = "Datos enviados";

        // Redirigir a la misma página para evitar el reenvío del formulario
        // header("Location: " . $_SERVER['PHP_SELF']);

    } catch (FileException $exception) {
        $errores[] = $exception->getMessage();
    }
}

  require "views/galeria.view.php";
?>