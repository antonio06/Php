<?php
include_once './Mamifero.php';
class Gato extends Mamifero{

    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        parent::__construct($genero, $sexo, $peso, $alimentacion, $tipoSangre);
    }

    public function Comer($comida) {
        if ($comida == "pescado") {
            return parent::Comer() . " me encantaaa *o* ";
        } else {
            echo parent::Comer() . " puagggg que asco ";
        }
    }
    
    public function Hablar () {
        return parent::Hablar() . "Los gatos maullamos miauuuuuu <br>";
    }
}

