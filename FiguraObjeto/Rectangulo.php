<?php

include_once './Figura.php';
class Rectangulo extends Figura {

    private $base;
    private $altura;
    public function __construct($caracter, $base, $altura) {
        parent::__construct($caracter);
        $this->base = $base;
        $this->altura = $altura;
    }

    public function __toString() {
        $inprimir = "";
        for ($i = 0; $i < $this->base; $i++) {
            $inprimir .= $this->caracter;
        }

        $inprimir .= "<br>";

        for ($b = 0; $b < ($this->altura) - 2; $b++) {
            $inprimir .= $this->caracter;
            for ($c = 0; $c <($this->base) - 2; $c++) {
                $inprimir .= " ";
            }
            $inprimir .= $this->caracter;
            $inprimir .= "<br>";
        }
        
        for ($i = 0; $i < $this->base; $i++) {
            $inprimir .= $this->caracter;
        }

        return $inprimir;
    }

}