<?php
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;

use proyecto\entities\ImagenGaleria;

class ImagenGaleriaRepositorio extends QueryBuilder{
    public function __construct(string $table = "imagenes", string $classEntity = ImagenGaleria::class)
    {
        parent::__construct($table, $classEntity);
    }

}
?>