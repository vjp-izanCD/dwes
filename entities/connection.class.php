<?php

require_once "entities/app.class.php";

class Connection {
    public static function make() {
        try {
            $config = App::get("config")["database"];
            // Corrección en la concatenación de la cadena de conexión
            $connection = new PDO(
                $config["connection"] . ";dbname=" . $config["name"],
                $config["username"],
                $config["password"],
                $config["options"]
            );
            // Establecer el modo de error de PDO
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            // Puedes optar por mostrar el error real solo en desarrollo
            throw new AppException("Error en la conexión a la base de datos: " . $error->getMessage());
        }
        return $connection;
    }
}

?>
