<?php

include_once './Vehiculo.php';

class Coche extends Vehiculo {

    private $motor = 0;
    private $ruedas, $color;

    public function __construct($ruedas, $color, $motor) {
        parent::__construct($ruedas, $color);
        $this->motor = $motor;
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

    public function quemarRuedas() {
        echo "Estoy quemando las ruedas";
    }

}
