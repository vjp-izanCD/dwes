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
