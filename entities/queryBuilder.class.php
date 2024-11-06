<?php
require_once "utils/const.php";
require_once "exceptions/queryException.class.php";
    class QueryBuilder {

        /**
         *
         * @var PDO
         */
        private $connection;

        /**
         *
         * @param PDO $connection
         */
        public function __construct(PDO $connection) {
            $this->connection = $connection;

        }

        public function findAll(string $table, string $classEntitie) {
            $sqlStatement = "Select * from " . $table;

            $pdoStatement = $this->connection->prepare($sqlStatement);

            $pdoStatement->execute();
            if($pdoStatement->execute() === false){
                throw new QueryException(getErrorString(ERROR_STRINGS[ERROR_EXECUTE_STATEMENT]));
            }

            return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classEntitie);
            
        }
    }
?>