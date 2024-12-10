<?php

namespace proyecto\entities\repository;

use Monolog;

use Exception;

class MyLog {
    private $log;

    public function __construct(string $filename) {
        try {
            $this->log = new Monolog\Logger("name");
            $this->log->pushHandler(
                new Monolog\Handler\StreamHandler($filename, Monolog\Logger::INFO)
            );
        } catch (Exception $e) {
            echo "Error al crear el logger: " . $e->getMessage();
        }
    }
}
?>