<?php
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;

class PartnersRepositorio extends QueryBuilder{
    public function __construct(string $table = "asociados", string $classEntity = "Partners")
    {
        parent::__construct($table, $classEntity);
    }

}
?>