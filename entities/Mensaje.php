<?php
namespace proyecto\entities;

    class Mensaje implements database\IEntity {
        private $id;
        private $nombre;
        private $apellidos;
        private $asunto;
        private $email;
        private $texto;
        private $fecha;

        public function __construct($nombre = "", $apellidos = "", $asunto = "", $email = "", $texto = "", $fecha ="0000-00-00 00:00:00") {
            $this->id = null;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->asunto = $asunto;
            $this->email = $email;
            $this->texto = $texto;
            $this->fecha = $fecha;
        }

        public function getId(){
            return $this->id;
        }
        
        public function getNombre(){
            return $this->nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }

        public function getAsunto(){
            return $this->asunto;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getTexto(){
            return $this->texto;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }

        public function setAsunto($asunto){
            $this->asunto = $asunto;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setTexto($texto){
            $this->texto = $texto;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function toArray():array{
            return [
                "id"=>$this->getId(),
                "nombre"=>$this->getNombre(),
                "apellidos"=>$this->getApellidos(),
                "asunto"=>$this->getAsunto(),
                "email"=>$this->getEmail(),
                "texto"=>$this->getTexto(),
                "fecha"=>$this->getFecha()
            ];
        }

    }
?>