<?php
require __DIR__ . "/../exceptions/FileException.class.php";

class File {
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes) {
        // Comprobamos si el archivo existe en el array $_FILES
        if (!isset($_FILES[$fileName])) {
            throw new FileException("Archivo no encontrado en el array de subida.");
        }

        $this->file = $_FILES[$fileName];
        $this->fileName = $this->file['name']; // Obtenemos el nombre del archivo

        // Comprobamos si hay errores en la subida
        if ($this->file["error"] !== UPLOAD_ERR_OK) {
            switch ($this->file["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:{
                    throw new FileException("El archivo excede el tamaño máximo permitido.");
                    break;
                }
                case UPLOAD_ERR_PARTIAL:{
                    throw new FileException("El archivo fue subido parcialmente.");
                    break;
                }
                default:{
                    throw new FileException("Error desconocido en la subida.");
                    break;
                }
            }
        }

        // Comprobamos si el tipo de archivo es soportado
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

        if(is_file($ruta) == true){
            $fechaActual = date("dmYHis");
            $this->fileName = $this->fileName . "_" . $fechaActual;
            $ruta = $rutaDestino.$this->fileName;
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