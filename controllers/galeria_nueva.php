<?php

use proyecto\entities\repository\ImagenGaleriaRepositorio;
use proyecto\entities\File;
use proyecto\entities\ImagenGaleria;

use proyecto\entities\App;

use proyecto\exceptions\FileException;
use proyecto\exceptions\QueryException;
use proyecto\exceptions\AppException;

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {

    $imagenRepositorio = new ImagenGaleriaRepositorio();

    $descripcion = trim(htmlspecialchars($_POST["descripcion"] ?? ''));
    $categoria = trim(htmlspecialchars($_POST["categoria"] ?? ''));

    $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];

    // Verificar si se ha subido un archivo
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $imagen = new File("imagen", $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

        $ImagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        $imagenRepositorio->save($ImagenGaleria);

        $descripcion = "";
        $mensaje = "Se ha guardado una nueva imagen: " . $ImagenGaleria->getNombre();

    } else {
        App::get("logger")->info($mensaje);
        $errores[] = "Error al subir la imagen.";
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
  }

header("Location: /galeria");
?>