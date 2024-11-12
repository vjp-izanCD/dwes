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
    $categoriaRepositorio = new categoriaRepositorio();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $descripcion = trim(htmlspecialchars($_POST["descripcion"] ?? ''));
        $categoria = trim(htmlspecialchars($_POST["categoria"] ?? ''));

        $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];

        $imagen = new File("imagen", $tiposAceptados);
        $imagen->saveUploadFile(imagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY, imagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $imagenGaleria = new imagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        $imagenRepositorio->save($imagenGaleria);

        $descripcion = "";
        $mensaje = "Imagen guardada";
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
