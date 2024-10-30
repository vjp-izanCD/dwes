<?php
    define("ERROR_MV_UP_FILE", 9);

    $errorStrings[UPLOAD_ERR_OK] = "No hay ningún error.";
    $errorStrings[UPLOAD_ERR_INI_SIZE] = "El archivo es demasiado grande.";
    $errorStrings[UPLOAD_ERR_FORM_SIZE] = "El archivo es demasiado grande.";
    $errorStrings[UPLOAD_ERR_PARTIAL] = "No se ha podido subir el archivo.";
    $errorStrings[UPLOAD_ERR_NO_FILE] = "No se ha encontrado ningún archivo.";
    $errorStrings[UPLOAD_ERR_NO_TMP_DIR] = "No existe el directorio temporal.";
    $errorStrings[UPLOAD_ERR_CANT_WRITE] = "No se puede escribir.";
    $errorStrings[UPLOAD_ERR_EXTENSION] = "Error de extensión del archivo.";
    $errorStrings[ERROR_MV_UP_FILE] = "No se ha podido mover el archivo de destino.";

    define("ERROR_STRINGS", $errorStrings);
?>