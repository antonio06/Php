<?php

include_once './Mamifero.php';

class Perro extends Mamifero {

    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        parent::__construct($genero, $sexo, $peso, $alimentacion, $tipoSangre);
    }

    public function Comer($comida) {
        if ($comida == "carne") {
            return parent::Comer() . " me encantaaa *o* ";
        } else {
            return parent::Comer() . " puagggg que asco ";
        }
    }
    
    public function Hablar () {
        return parent::Hablar() . "Los perros ladramos guauuu guauuu <br>";
    }
}