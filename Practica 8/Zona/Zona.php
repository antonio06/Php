<?php

class Zona {

    private $entradas;

    public function __construct($entradas) {
        $this->entradas = $entradas;
    }

    public function comprobarEntradas($numeroEntradas) {
        if ($this->entradas >= $numeroEntradas) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function venderEntradas ($numeroEntradas){
        if ($this->comprobarEntradas($numeroEntradas)){
            return "Entradas vendidas";
        }else{
            return "No quedan tantas entradas disponibles";
        }
    }
    
    function getEntradas() {
        return $this->entradas;
    }

}
