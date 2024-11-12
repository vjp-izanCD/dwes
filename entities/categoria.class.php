<?php
    require_once "entities/database/IEntity.class.php";
    class Categoria implements IEntity{
        private $id;
        private $nombre;
        private $numImagenes;

        public function __construct(string $nombre = "", int $numImagenes = 0) {
            $this->nombre = $nombre;
            $this->numImagenes = $numImagenes;
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getnumImagenes(){
            return $this->numImagenes;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setnumImagenes($numImagenes){
            $this->numImagenes = $numImagenes;
        }

        public function toArray(): array
        {
            return[
                "id" => $this->getId(),
                "nombre" => $this->getNombre(),
                "numImagenes" => $this->getnumImagenes()
            ];
        }
    }

?>