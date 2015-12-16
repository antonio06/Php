<?php

include_once './Vehiculos.php';

class bicicleta extends Vehiculos {

    private $pedales = 0;

// Setter parecido a hacer $color = "rojo";
// Getter como hacer un echo a la variable $color;
    
    public function __construct($pedales) {
        parent::__construct($ruedas, $color);
        $this->pedales = $pedales;
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
