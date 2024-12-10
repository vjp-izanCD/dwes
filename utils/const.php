<?php
namespace proyecto\utils;

    define("ERROR_MV_UP_FILE", 9);

    define("ERROR_EXECUTE_STATEMENT", 10);

    define("ERROR_APP_CORE", 11);

    define("ERROR_CON_BD", 12);

    define("ERROR_INS_BD", 13);

    $errorStrings = [
        UPLOAD_ERR_OK => "No hay ningún error.",
        UPLOAD_ERR_INI_SIZE => "El archivo es demasiado grande.",
        UPLOAD_ERR_FORM_SIZE => "El archivo es demasiado grande.",
        UPLOAD_ERR_PARTIAL => "No se ha podido subir el archivo.",
        UPLOAD_ERR_NO_FILE => "No se ha encontrado ningún archivo.",
        UPLOAD_ERR_NO_TMP_DIR => "No existe el directorio temporal.",
        UPLOAD_ERR_CANT_WRITE => "No se puede escribir.",
        UPLOAD_ERR_EXTENSION => "Error de extensión del archivo.",

        ERROR_MV_UP_FILE => "No se ha podido mover el archivo de destino.",
        ERROR_EXECUTE_STATEMENT => "No se ha podido ejecutar la consulta.",
        ERROR_APP_CORE => "No se ha encontrado la clave del contenedor.",
        ERROR_CON_BD => "No se ha podido crear la conexión con la bd.",
        ERROR_INS_BD => "No se ha podido realizar la conexión con la bd."
    ];
    define('ERROR_STRINGS', $errorStrings);

    function getErrorString($errorCode) {
        return match(true){
            $errorCode < count(ERROR_STRINGS) => ERROR_STRINGS[$errorCode],
            default => 'Código de error desconocido'
        };
    }

?>
