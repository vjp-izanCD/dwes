<?php
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;

class MensajeRepositorio extends QueryBuilder {
    public function __construct(string $table = "mensajes", string $classEntity = "Mensaje") {
        parent::__construct($table, $classEntity);
    }
}
?>