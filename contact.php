<?php


  $nombre = $_POST["nombre"];
  $apellidos = $_POST["apellidos"];
  $correo = $_POST["correo"];
  $subject = $_POST["subject"];
  $mensaje = $_POST["mensaje"];
  $errores = [];
  $claseDiv = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $subject = $_POST["subject"];
    $mensaje = $_POST["mensaje"];

    if (empty($nombre)) {
      $errores["nombre"] = "El nombre es requerido.";
    } else {
      $errores["nombre"] = "";
    }

    if (empty($correo)) {
      $errores["correo"] = "El correo es requerido.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $errores["correo"] = "El formato del correo es inválido.";
    } else {
      $errores["correo"] = "";
    }

    if (empty($subject)) {
      $errores["subject"] = "El subject es requerido.";
    } else {
      $errores["subject"] = "";
    }

    if (empty(array_filter($errores))) {

      $mensajeExito = "<li>Nombre: $nombre.</li><li>Apellidos: $apellidos.</li><li>Correo: $correo.</li><li>Subject: $subject.</li><li>Mensaje: $mensaje.</li>";

      $nombreFinal = "";
      $apellidosFinal = "";
      $correoFinal = "";
      $subjectFinal = "";
      $mensajeFinal = "";

      $claseDiv = "alert alert-info";
    }

    if (!empty(array_filter($errores))) {

      $nombreFinal = $nombre;
      $apellidosFinal = $apellidos;
      $correoFinal = $correo;
      $subjectFinal = $subject;
      $mensajeFinal = $mensaje;

      $claseDiv = "alert alert-danger";
    }
  }
  require "views/contact.view.php";
?>