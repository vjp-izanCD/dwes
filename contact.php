<?php
  $nombre = "";
  $apellidos = "";
  $correo = "";
  $subject = "";
  $mensaje = "";
  $errores = [];
  $mensajeExito = "";
  $claseDiv = "alert alert-info";
  $nombreFinal = "";
  $apellidosFinal = "";
  $correoFinal = "";
  $subjectFinal = "";
  $mensajeFinal = "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $subject = $_POST["subject"];
    $mensaje = $_POST["mensaje"];
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

    if (empty($correo)) {
      $errores["correo"] = "El correo es requerido.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $errores["correo"] = "El formato del correo es inválido.";
    } else {
      $errores["correo"] = "";
      $mensajeExito .= "<li>Correo: $correo</li>";
    }

    if (empty($subject)) {
      $errores["subject"] = "El subject es requerido.";
    } else {
      $errores["subject"] = "";
      $mensajeExito .= "<li>Subject: $subject</li>";
    }

    if (!empty($mensaje)) {
      $mensajeExito .= "<li>Mensaje: $mensaje</li>";
    }

    if (empty(array_filter($errores))) {

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