<?php

class Campero {
    private $tamano;
    private $tipo;
    private $estado;
    static private $totalPedidos;
    static private $totalServidos;
    
    public function __construct($tamano, $tipo) {
        $this->tamano = $tamano;
        $this->tipo = $tipo;
        $this->estado = "pedido";
        Campero::$totalPedidos++;
    }
    
    public function sirve(){
        $this->estado = "servido";
        Campero::$totalServidos++;
    }

    static function getTotalPedidos() {
        return self::$totalPedidos;
    }

    static function getTotalServidos() {
        return self::$totalServidos;
    }

    public function __toString() {
        return "Campero " . $this->tamano . " " . $this->tipo . " " . $this->estado;
    }

}
