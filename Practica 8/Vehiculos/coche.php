<?php
include_once './Vehiculos.php';
class coche extends Vehiculos {

    private $motor = 0;

    
    public function __construct($motor) {
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
