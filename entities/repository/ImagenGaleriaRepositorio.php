<?php
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;

class ImagenGaleriaRepositorio extends QueryBuilder{
    public function __construct(string $table = "imagenes", string $classEntity = "ImagenGaleria")
    {
        parent::__construct($table, $classEntity);
    }

}
?>