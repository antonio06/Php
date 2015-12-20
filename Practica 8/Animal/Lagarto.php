<?php
include_once './Animal.php';
class Lagarto extends Animal{
    
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
        return parent::Hablar() . "Los lagartos zzzzzzz <br>";
    }
}

