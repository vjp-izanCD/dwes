<?php
namespace proyecto\entities;

    class Partners implements database\IEntity {
        private $id;
        private $nombre;
        private $logo;
        private $descripcion;

        const RUTA_IMAGENES_PORTFOLIO = "images/index/portfolio/";
        const RUTA_IMAGENES_GALLERY = "images/index/gallery/";

        public function __construct($nombre = "", $logo = "", $descripcion = "") {
            $this->id = null;
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;
        }

        public function getId(){
            return $this->id;
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

        public function getUrlPortfolio(){
            return self::RUTA_IMAGENES_PORTFOLIO . $this->getLogo();
        }

        public function getUrlGallery(){
            return self::RUTA_IMAGENES_GALLERY . $this->getLogo();
        }

        public function toArray():array{
            return [
                "id"=>$this->getId(),
                "nombre"=>$this->getNombre(),
                "logo"=>$this->getLogo(),
                "descripcion"=>$this->getDescripcion()
            ];
        }

    }
?>