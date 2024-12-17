<?php
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;

use proyecto\entities\Categoria;

class CategoriaRepositorio extends QueryBuilder {
    public function __construct(string $table = "categorias", string $classEntity = Categoria::class) {
        parent::__construct($table, $classEntity);
    }
}
?>