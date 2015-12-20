<?php

include_once './Animal.php';
abstract class Mamifero extends Animal{
    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        parent::__construct($genero, $sexo, $peso, $alimentacion, $tipoSangre);
    }

    public function Comer () {
        return parent::Comer() . " lo que me has dado ";
    }
    
}
