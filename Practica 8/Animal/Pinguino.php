<?php
include_once './Ave.php';
class Pinguino extends Ave{

    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        parent::__construct($genero, $sexo, $peso, $alimentacion, $tipoSangre);
    }

    public function Comer($comida) {
        if ($comida == "pescado") {
            return parent::Comer() . " me encantaaa *o* ";
        } else {
            return parent::Comer() . " puagggg que asco ";
        }
    }
    
    public function Hablar () {
        return parent::Hablar() . "Los pinguinos (ni idea de lo que hacen) meggg meggg";
    }
}

