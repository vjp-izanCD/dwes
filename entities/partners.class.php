<?php
    class Partner{
        private $nombre = "";
        private $logo = "";
        private $descripcion = "";

        public function __construct($nombre, $logo, $descripcion) {
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getLogo(){
            return $this->logo;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setLogo($logo){
            $this->logo = $logo;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

    }
?>