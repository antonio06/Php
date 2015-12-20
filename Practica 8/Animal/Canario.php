<?php
include_once './Ave.php';
class Canario extends Ave{
    
    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        parent::__construct($genero, $sexo, $peso, $alimentacion, $tipoSangre);
    }

    public function Comer($comida) {
        if ($comida == "semillas") {
            return parent::Comer() . " me encantaaa *o* ";
        } else {
            echo parent::Comer() . " puagggg que asco ";
        }
    }
    
    public function Hablar () {
        return parent::Hablar() . "Los canarios piamos piooo pioooo <br>";
    }
}

