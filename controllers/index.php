<?php
  require "utils/utils.php";
  require "entities/imagenGaleria.class.php";
  require "entities/partners.class.php";
  include_once "partners.php";
  require "entities/File.class.php";
  require "entities/connection.class.php";
  require_once "entities/queryBuilder.class.php";
  require_once "exceptions/appException.class.php";
  require_once "entities/repository/imagenGaleriaRepositorio.class.php";
  require_once "entities/repository/categoriaRepositorio.class.php";
  require "entities/categoria.class.php";
  require_once "entities/repository/partnersRepositorio.class.php";

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {

    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    $partnerRepositorio = new PartnersRepositorio();

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
      $partners = $partnerRepositorio->findAll();
  }

  if (count($partners) > 3) {
    $partners = obtenerTresAleatorios($partners);
  }

  require "views/index.view.php";
?>