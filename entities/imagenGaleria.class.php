<?php
require_once "entities/database/IEntity.class.php";
    class imagenGaleria implements IEntity{
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDescargas;
        private $id;
        private $categoria;

        const RUTA_IMAGENES_PORTFOLIO = "images/index/portfolio/";
        const RUTA_IMAGENES_GALLERY = "images/index/gallery/";

        public function __construct(string $nombre = "", string $descripcion = "", int $categoria = 0, int $numVisualizaciones = 0, int $numLikes = 0, int $numDescargas = 0) {

            $this->id = null;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->categoria = $categoria;
            $this->numVisualizaciones = $numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDescargas = $numDescargas;
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        
        public function getCategoria(){
            return $this->categoria;
        }

        public function getNumVisualizaciones(){
            return $this->numVisualizaciones;
        }

        public function getNumLikes(){
            return $this->numLikes;
        }

        public function getNumDescargas(){
            return $this->numDescargas;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        public function setNumVisualizaciones($numVisualizaciones){
            $this->numVisualizaciones = $numVisualizaciones;
        }

        public function setNumLikes($numLikes){
            $this->numLikes = $numLikes;
        }

        public function setNumDescargas($numDescargas){
            $this->numDescargas = $numDescargas;
        }

        public function getUrlPortfolio(){
            return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
        }

        public function getUrlGallery(){
            return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
        }

        public function toArray():array{
            return [
                "id"=>$this->getId(),
                "nombre"=>$this->getNombre(),
                "descripcion"=>$this->getDescripcion(),
                "numVisualizaciones"=>$this->getNumVisualizaciones(),
                "numLikes"=>$this->getNumLikes(),
                "numDescargas"=>$this->getNumDescargas(),
                "categoria"=>$this->getCategoria()
            ];
        }
    }
?>