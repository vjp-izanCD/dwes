<?php

namespace proyecto\entities;

use proyecto\exceptions\FileException;

require_once "../utils/const.php";

class File {
    private $file = "";
    private $fileName = "";

    public function __construct(string $fileName, array $arrTypes) {

        $this->file = $_FILES[$fileName];
        $this->fileName = $this->file['name'];

        if (!isset($_FILES[$fileName])) {
            throw new FileException("Archivo no encontrado en el array de subida.");
        }

        if ($this->file["error"] !== UPLOAD_ERR_OK) {
            throw new FileException(getErrorString($this->file["error"]));
        }

        if (in_array($this->file["type"], $arrTypes) === false) {
            throw new FileException("Tipo de archivo no soportado: " . $this->file["type"]);
        }
    }

    public function getFileName() {
        return $this->fileName;
    }

    public function saveUploadFile(string $rutaDestino){
        if(is_uploaded_file($this->file["tmp_name"]) === false){
            throw new FileException("El archivo no se ha subido mediante el formulario");
        }

        $this->fileName = $this->file["name"];
        $ruta = $rutaDestino.$this->fileName;

        if (is_file($ruta) == true) {
            $i = 1;
            $posName = strpos($this->fileName, ".");
            $name = substr($this->fileName, 0, $posName);
            $posExtensión = strpos($this->fileName, ".");
            $extensión = substr($this->fileName, $posExtensión, strlen($this->fileName));
            
            $this->fileName = $name . "($i)" . $extensión;
            $ruta = $rutaDestino . $this->fileName;
        
            while (is_file($ruta)) {
                $i++;
                $this->fileName = $name . "($i)" . $extensión;
                $ruta = $rutaDestino . $this->fileName;
            }
        }

        if(move_uploaded_file($this->file["tmp_name"], $ruta) === false){
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }

    public function copyFile (string $rutaOrigen, string $rutaDestino){
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        if(is_file($origen) === false){
            throw new FileException("No existe el fichero $origen que intentas copiar.");
        }

        if(is_file($destino) === true){
            throw new FileException("El fichero $destino ya existe y no se puede sobreescribirlo.");
        }

        if(copy($origen, $destino) === false){
            throw new FileException("No se a podido copiar el fichero $origen a $destino.");
        }
    }
}
?>