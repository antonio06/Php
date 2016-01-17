<?php

abstract class Figura {
    protected $caracter;
    
    public function __construct($caracter) {
        $this->caracter = $caracter;
    }
    
    function getCaracter() {
        return $this->caracter;
    }

    function setCaracter($caracter) {
        $this->caracter = $caracter;
    }


}
