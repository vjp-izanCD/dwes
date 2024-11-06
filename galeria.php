<?php
  require "utils/utils.php";
  require "entities/File.class.php";
  require "entities/imagenGaleria.class.php";
  require "entities/connection.class.php";
  require_once "entities/queryBuilder.class.php";
  require_once "exceptions/appException.class.php";

  $errores = [];
  $descripcion = "";
  $mensaje = "";
  try {
    $config = require_once "app/config.php";

    App::bind("config", $config);

    $connection = App::getConnection();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
        $descripcion = trim(htmlspecialchars($_POST["descripcion"]));
        $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];
        $imagen = new File("imagen", $tiposAceptados);
        $imagen->saveUploadFile(imagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY, imagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";

        $pdoStatement = $connection->prepare($sql);

        $parametersStatementArray = [":nombre"=>$imagen->getFileName(), ":descripcion"=>$descripcion];
        if ($pdoStatement->execute($parametersStatementArray) === false){
          $errores[] = "No se ha podido guardar la imagen en la BD";
        } else {
          $descripcion = "";
          $mensaje = "Imagen guardada";
        }
        $querySql = "Select * from imagenes";
        $queryStatement = $connection->query($querySql);
        while($row = $queryStatement->fetch()){
          echo "ID: " . $row["id"];
          echo "Nombre: " . $row["nombre"];
          echo "Descripcion: " . $row["descripcion"];
        }
    } 

    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll("imagenes", "imagenGaleria");
  } catch (FileException $exception) {
    $errores[] = $exception->getMessage();
  }
  catch (QueryException $exception){
    $errores[] = $exception->getMessage();
  }
  catch (AppException $exception){
    $errores[] = $exception->getMessage();
  }
  require "views/galeria.view.php";
?>