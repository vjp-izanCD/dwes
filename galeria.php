<?php
  require "utils/utils.php";
  require "entities/File.class.php";
  require "entities/imagenGaleria.class.php";
  require "entities/connection.class.php";
  require_once "entities/queryBuilder.class.php";
  require_once "exceptions/appException.class.php";
  require_once "entities/repository/imagenGaleriaRepositorio.class.php";
  require_once "entities/repository/categoriaRepositorio.class.php";
  require "entities/categoria.class.php";

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {
    $config = require_once "app/config.php";

    App::bind("config", $config);
    $connection = App::getConnection();

    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $descripcion = trim(htmlspecialchars($_POST["descripcion"] ?? ''));
        $categoria = trim(htmlspecialchars($_POST["categoria"] ?? ''));

        $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];

        // Verificar si se ha subido un archivo
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $imagen = new File("imagen", $tiposAceptados);
            $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

            $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
            $imagenRepositorio->save($imagenGaleria);

            $descripcion = "";
            $mensaje = "Imagen guardada";
        } else {
            $errores[] = "Error al subir la imagen.";
        }
    } 
  } catch (FileException $exception) {
      $errores[] = $exception->getMessage();
  } catch (QueryException $exception) {
      $errores[] = $exception->getMessage();
  } catch (AppException $exception) {
      $errores[] = $exception->getMessage();
  } catch (PDOException $exception) {
      $errores[] = $exception->getMessage();
  } catch (Exception $exception) {
      $errores[] = $exception->getMessage();
  } finally {
      $imagenes = $imagenRepositorio->findAll();
      $categorias = $categoriaRepositorio->findAll();
  }

  require "views/galeria.view.php";
?>
