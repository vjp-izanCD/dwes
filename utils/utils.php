<?php
namespace proyecto\utils;

    function existeOpcionMenuActivaEnArray($opciones) {
        foreach ($opciones as $opcion) {
            if (esOpcionMenuActiva($opcion)) {
                return true;
            }
        }
        return false;
    }

    function esOpcionMenuActiva($pagina) {
        return strpos($_SERVER["REQUEST_URI"], $pagina) !== false;
    }

    function obtenerTresAleatorios($partners) {
        shuffle($partners);
        return array_slice($partners, 0, 3);
    }
?>