<?php

abstract class Vehiculos {

    static $getVehiculosCreados;
    private static $kmTotales = 0;
    private $kilometrosRecorridos;
    private static $vehiculosCreados = 0;


    public function __construct($ruedas, $color) {
        $this->ruedas = $ruedas;
        $this->color = $color;
        Vehiculos::$vehiculosCreados++;
    }
    
    public function getVehiculosCreados() {
        return Vehiculos::$vehiculosCreados;
    }
    
    public function andar($kilometros) {
        echo "Estoy andando";
        $this->kilometrosRecorridos += $kilometros;
        self::$kmTotales += $kilometros;
    }
    
    public function getKilometros() {
        return $this->kilometrosRecorridos;
    }
    
    public static function getKmTotales () {
        return self::$kmTotales;
    }
    
}
