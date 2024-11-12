<?php
require_once "entities/queryBuilder.class.php";

class CategoriaRepositorio extends QueryBuilder {
    public function __construct(string $table = "categorias", string $classEntity = "Categoria") {
        parent::__construct($table, $classEntity);
    }
}
?>