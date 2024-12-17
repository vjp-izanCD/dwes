<?php
    namespace proyecto\entities;

use proyecto\entities\repository\ImagenGaleriaRepositorio;
use proyecto\entities\repository\CategoriaRepositorio;

    class PagesController {
        public function index() {
            $imagenRepositorio = new ImagenGaleriaRepositorio();
            $imagenes = $imagenRepositorio->findAll();
            $categoriaRepositorio = new CategoriaRepositorio();
            $categorias = $categoriaRepositorio->findAll();

            require "../views/index.view.php";
        }
    }
?>