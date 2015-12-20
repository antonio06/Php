<?php

class DadoPoker {

    private $figura = ["As", "K", "Q", "J", "7", "8"];
    private $tirada;
    private static $tiradasTotales = 0;

    public function __construct() {
        
    }

    public function tirar() {
        $this->tirada = rand(0, 5);
        DadoPoker::$tiradasTotales++;
    }

    public function nombreFigura() {
        return $this->figura[$this->tirada];
    }

    public static function getTiradasTotales() {
        return DadoPoker::$tiradasTotales;
    }

}
