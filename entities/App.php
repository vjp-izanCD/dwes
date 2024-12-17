<?php

namespace proyecto\entities;

use proyecto\exceptions\AppException;

require_once "../utils/const.php";

class App {
    private static $container = [];

    public static function bind($clave, $valor) {
        self::$container[$clave] = $valor;
    }

    public static function get($key) {
        if (!array_key_exists($key, self::$container)) {
            throw new AppException(getErrorString(ERROR_APP_CORE));
        }
        // Retornar el valor asociado a la clave
        return self::$container[$key];
    }

    public static function getConnection() {
        if (!array_key_exists("connection", self::$container)) {
            self::$container["connection"] = Connection::make();
        }
        // Retornar la conexión almacenada
        return self::$container["connection"];
    }
}

?>