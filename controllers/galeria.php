<?php
  use proyecto\entities\repository\ImagenGaleriaRepositorio;
  use proyecto\entities\repository\CategoriaRepositorio;

  use proyecto\exceptions\FileException;
  use proyecto\exceptions\QueryException;
  use proyecto\exceptions\AppException;

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {

    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    
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
