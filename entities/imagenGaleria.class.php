<?php
    class imagenGaleria{
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;
        private $id;

        const RUTA_IMAGENES_PORTFOLIO = "images/index/portfolio/";
        const RUTA_IMAGENES_GALLERY = "images/index/gallery/";

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getNumVisualizaciones(){
            return $this->numVisualizaciones;
        }

        public function getNumLikes(){
            return $this->numLikes;
        }

        public function getNumDownloads(){
            return $this->numDownloads;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function setNumVisualizaciones($numVisualizaciones){
            $this->numVisualizaciones = $numVisualizaciones;
        }

        public function setNumLikes($numLikes){
            $this->numLikes = $numLikes;
        }

        public function setNumDownloads($numDownloads){
            $this->numDownloads = $numDownloads;
        }


        public function getUrlPortfolio(){
            return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
        }

        public function getUrlGallery(){
            return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
        }


    }
?>