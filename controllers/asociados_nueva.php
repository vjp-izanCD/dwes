<?php
  use proyecto\entities\repository\PartnersRepositorio;
  use proyecto\entities\File;
  use proyecto\entities\Partners;

  use proyecto\entities\App;

  use proyecto\exceptions\FileException;
  use proyecto\exceptions\QueryException;
  use proyecto\exceptions\AppException;

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {

    $partnerRepositorio = new PartnersRepositorio();

    $nombre = trim(htmlspecialchars($_POST["nombre"] ?? ''));
    $descripcion = trim(htmlspecialchars($_POST["descripcion"] ?? ''));

    $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];

    // Verificar si se ha subido un archivo
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        $imagen = new File("imagen", $tiposAceptados);
        $imagen->saveUploadFile(Partners::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(Partners::RUTA_IMAGENES_GALLERY, Partners::RUTA_IMAGENES_PORTFOLIO);

        $partner = new Partners($nombre, $imagen->getFileName(), $descripcion);
        $partnerRepositorio->savePartner($partner);

        $descripcion = "";
        $mensaje = "Imagen guardada";
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
      $partners = $partnerRepositorio->findAll();
  }

header("Location: /asociados");
?>
