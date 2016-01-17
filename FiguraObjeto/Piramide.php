<?php

class Piramide extends Figura {

    private $altura;

    public function __construct($caracter, $altura) {
        parent::__construct($caracter);
        $this->altura = $altura;
    }

    public function __toString() {
        $inprimir = "";

        $alturaReal = $this->altura - 2;
        $imagenes;
        $huecosDelante = $this->altura - 1;
        $huecosEnMedio = 1;

        for ($bucle1 = 0; $bucle1 < $huecosDelante; $bucle1++) {
            $inprimir .= "&nbsp;";
        }
        $inprimir .= $this->caracter;
        $inprimir .= "<br>";
        $huecosDelante--;


        for ($bucle2 = 0; $bucle2 < $alturaReal; $bucle2++) {
            for ($bucle3 = 0; $bucle3 < $huecosDelante; $bucle3++) {
                $inprimir .= "&nbsp;";
            }
            $inprimir .= $this->caracter; 
            for ($bucle4 = 0; $bucle4 < $huecosEnMedio; $bucle4++) {
                $inprimir .= "&nbsp;";
            }
            $inprimir .= $this->caracter;
           $inprimir .= "<br>";
            $huecosEnMedio = $huecosEnMedio + 2;
            $huecosDelante--;
        }

        $huecosEnMedio = $huecosEnMedio + 2;
        for ($bucle5 = 0; $bucle5 < $huecosEnMedio; $bucle5++) {
            $inprimir .= $this->caracter;
        }
        
        return $inprimir;
    }

}
