<?php

include_once 'Animal.php';

abstract class Ave extends Animal {

    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        parent::__construct($genero, $sexo, $peso, $alimentacion, $tipoSangre);
    }

    public function Comer() {
        return parent::Comer() . " soy un Ave lo que me has dado ";
    }

}
