<?php

require_once "entities/app.class.php";

class Connection{
    public static function make(){
        try {
            $config = App::get("config")["database"];
            $connection = new PDO($config["connection"] . ";dbname". $config["name"], $config["username"], $config["password"], $config["options"]);
        } catch (PDOException $error){
            throw new AppException(getErrorString(ERROR_CON_BD));
        }
        return $connection;
    }

    
}

?>