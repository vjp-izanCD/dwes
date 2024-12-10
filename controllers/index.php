<?php
  use proyecto\entities\repository\PartnersRepositorio;
  use proyecto\entities\repository\ImagenGaleriaRepositorio;
  use proyecto\entities\repository\CategoriaRepositorio;

  use proyecto\exceptions\FileException;
  use proyecto\exceptions\QueryException;
  use proyecto\exceptions\AppException;

  require_once "../utils/utils.php";

  use proyecto\utils;

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
    $partners = utils\obtenerTresAleatorios($partners);
  }

  require "../views/index.view.php";
?>