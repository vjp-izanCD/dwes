<?php

  use proyecto\entities\repository\PartnersRepositorio;

  use proyecto\exceptions\FileException;
  use proyecto\exceptions\QueryException;
  use proyecto\exceptions\AppException;

  $errores = [];
  $descripcion = "";
  $mensaje = "";

  try {

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
      $partners = $partnerRepositorio->findAll();
  }

  require "views/partners.view.php";
?>
