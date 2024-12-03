<?php
  require "entities/File.class.php";
  require "entities/mensaje.class.php";
  require "entities/connection.class.php";
  require_once "entities/queryBuilder.class.php";
  require_once "exceptions/appException.class.php";
  require_once "entities/repository/mensajeRepositorio.class.php";

  $nombre = "";
  $apellidos = "";
  $email = "";
  $asunto = "";
  $texto = "";
  $errores = [];
  $mensajeExito = "";
  $claseDiv = "";
  $nombreFinal = "";
  $apellidosFinal = "";
  $emailFinal = "";
  $asuntoFinal = "";
  $textoFinal = "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $texto = $_POST["texto"];
    $mensajeExito = "";

    if (empty($nombre)) {
      $errores["nombre"] = "El nombre es requerido.";
    } else {
      $errores["nombre"] = "";
      $mensajeExito .= "<li>Nombre: $nombre</li>";
    }

    if (!empty($apellidos)) {
      $mensajeExito .= "<li>Apellidos: $apellidos</li>";
    }

    if (empty($email)) {
      $errores["email"] = "El email es requerido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "El formato del email es inválido.";
    } else {
      $errores["email"] = "";
      $mensajeExito .= "<li>email: $email</li>";
    }

    if (empty($asunto)) {
      $errores["asunto"] = "El asunto es requerido.";
    } else {
      $errores["asunto"] = "";
      $mensajeExito .= "<li>Asunto: $asunto</li>";
    }

    if (!empty($mensaje)) {
      $mensajeExito .= "<li>Mensaje: $mensaje</li>";
    }

    if (empty(array_filter($errores))) {

      $nombreFinal = "";
      $apellidosFinal = "";
      $emailFinal = "";
      $asuntoFinal = "";
      $textoFinal = "";

      $errores = [];
      $descripcion = "";
      $mensaje = "";

      try {
        $config = require_once "app/config.php";

        App::bind("config", $config);
        $connection = App::getConnection();

        $mensajeRepositorio = new MensajeRepositorio();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = trim(htmlspecialchars($nombre ?? ''));
            $apellidos = trim(htmlspecialchars($apellidos ?? ''));
            $email = trim(htmlspecialchars($email ?? ''));
            $asunto = trim(htmlspecialchars($asunto ?? ''));
            $texto = trim(htmlspecialchars($texto ?? ''));
            $fecha = new DateTime();
            $fecha = $fecha->format("Y-m-d H:i:s");
            $mensaje = new Mensaje($nombre, $apellidos, $email, $asunto, $texto, $fecha);
            $mensajeRepositorio->saveMensaje($mensaje);

            $descripcion = "";
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
          $mensajes = $mensajeRepositorio->findAll();
      }

      $mostrarMensaje = $mensajeExito;

      $claseDiv = "alert alert-info";
    }

    if (!empty(array_filter($errores))) {

      $nombreFinal = $nombre;
      $apellidosFinal = $apellidos;
      $emailFinal = $email;
      $asuntoFinal = $asunto;
      $mensajeFinal = $mensaje;

      $claseDiv = "alert alert-danger";
    }
  }
  require "utils/utils.php";
  require "views/contact.view.php";
?>