<?php
  require "utils/utils.php";
  require "entities/File.class.php";
  require "entities/partners.class.php";
  require "entities/connection.class.php";
  require_once "entities/queryBuilder.class.php";
  require_once "exceptions/appException.class.php";
  require_once "entities/repository/partnersRepositorio.class.php";

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {
    $config = require_once "app/config.php";

    App::bind("config", $config);
    $connection = App::getConnection();

    $partnerRepositorio = new PartnersRepositorio();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $descripcion = trim(htmlspecialchars($_POST["descripcion"] ?? ''));
        $descripcion = trim(htmlspecialchars($_POST["nombre"] ?? ''));

        $tiposAceptados = ["image/jpeg", "image/jpg", "image/gif", "image/png"];

        // Verificar si se ha subido un archivo
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $imagen = new File("imagen", $tiposAceptados);
            
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
      $partners = $partnerRepositorio->findAll();
  }

  require "views/partners.view.php";
?>
