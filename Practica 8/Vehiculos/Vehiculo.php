<?php

abstract class Vehiculo {

    private static $kmTotales = 0;
    private static $totalVehiculos = 0;
    private $kilometrosRecorridos;
    private $ruedas;
    private $color;

    // ----- Constructor ----
    public function __construct($ruedas, $color) {
        $this->ruedas = $ruedas;
        $this->color = $color;
        Vehiculo::$totalVehiculos++;
    }

    // ----- Métodos -----
    public function andar($kilometros) {
        echo "Estoy andando";
        $this->kilometrosRecorridos += $kilometros;
        self::$kmTotales += $kilometros;
    }

    // -------- Getters y Setters -----------
    public static function getTotalVehiculos() {
        return self::$totalVehiculos;
    }
    
    public function getKilometros() {
        return $this->kilometrosRecorridos;
    }

    public static function getKmTotales() {
        return self::$kmTotales;
    }

    // Creo un setter donde recivo los kmTotales 
    // y los guardo en el atributo de clase
    // Si una variable es static significa que existe una única copia de ella en
    // todo el programa si no ponemos static significa que hay n copias de ella
    public static function setKmTotales($kmTotales) {
        return self::$kmTotales = $kmTotales;
    }
    
    public static function setTotalVehiculos($totalVehiculos) {
        return self::$totalVehiculos = $totalVehiculos;
    }

}
