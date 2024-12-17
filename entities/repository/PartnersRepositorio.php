<?php
namespace proyecto\entities\repository;

use proyecto\entities\QueryBuilder;

use proyecto\entities\Partners;

class PartnersRepositorio extends QueryBuilder{
    public function __construct(string $table = "asociados", string $classEntity = Partners::class)
    {
        parent::__construct($table, $classEntity);
    }

}
?>