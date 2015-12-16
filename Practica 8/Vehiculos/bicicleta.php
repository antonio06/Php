<?php

include_once './Vehiculo.php';

class Bicicleta extends Vehiculo {

    private $pinones = 0;
   

// Setter parecido a hacer $color = "rojo";
// Getter como hacer un echo a la variable $color;

    public function __construct($ruedas, $color, $pinones) {
        parent::__construct($ruedas, $color);
        $this->pinones = $pinones;
    }

    public function getRuedas($ruedas) {
        return $this->ruedas = $ruedas;
    }

    public function getColor($color) {
        return $this->color = $color;
    }

    public function setRuedas($ruedas) {
        return $this->ruedas = $ruedas;
    }

    public function setColor($color) {
        return $this->color = $color;
    }

    public function hacerCaballito() {
        echo "Estoy haciendo el Caballito ";
    }

}
