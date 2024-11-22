<?php

require_once "utils/const.php";
require_once "exceptions/queryException.class.php";
require_once "entities/app.class.php";

abstract class QueryBuilder {

    private $connection;

    private $table;

    private $classEntity;

    public function __construct($table, $classEntity) {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    public function findAll() {
        $sqlStatement = "SELECT * FROM " . $this->table;

        $pdoStatement = $this->connection->prepare($sqlStatement);

        if (!$pdoStatement->execute()) {
            throw new QueryException(getErrorString(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]));
        }

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    public function save(IEntity $entity): void {
        $parameters = $entity->toArray();

        $sql = sprintf("insert into %s (%s) values (%s)", $this->table, implode(", ", array_keys($parameters)), ":" . implode(", :", array_keys($parameters)));

        try{
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

            if($entity instanceof imagenGaleria){
                $this->incrementaNumCategorias($entity->getCategoria());
            }
        } catch (PDOException $excepcion) {
            throw new PDOException($excepcion->getMessage());
            //throw new PDOException(getErrorString(ERROR_INS_BD));
        }
    }

    public function savePartner(IEntity $entity): void {
        $parameters = $entity->toArray();

        $sql = sprintf("insert into %s (%s) values (%s)", $this->table, implode(", ", array_keys($parameters)), ":" . implode(", :", array_keys($parameters)));

        try{
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

        } catch (PDOException $excepcion) {
            throw new PDOException($excepcion->getMessage());
            //throw new PDOException(getErrorString(ERROR_INS_BD));
        }
    }

    public function saveMensaje(IEntity $entity): void {
        $parameters = $entity->toArray();

        $sql = sprintf("insert into %s (%s) values (%s)", $this->table, implode(", ", array_keys($parameters)), ":" . implode(", :", array_keys($parameters)));

        try{
            $statement = $this->connection->prepare($sql);
            $statement->execute($parameters);

        } catch (PDOException $excepcion) {
            throw new PDOException($excepcion->getMessage());
            //throw new PDOException(getErrorString(ERROR_INS_BD));
        }
    }

    public function incrementaNumCategorias(int $categoria) {
        try{
            $this->connection->beginTransaction();
            $sql = "UPDATE categorias SET numImagenes=numImagenes+1 WHERE id=$categoria";
            $this->connection->exec($sql);
            $this->connection->commit();
        } catch (Exception $exception) {
            $this->connection->rollBack();
            throw new Exception($exception->getMessage());
        }
    }
}

?>
