<?php

class Zona {

    private $entradas;

    public function __construct($entradas) {
        $this->entradas = $entradas;
    }

    
    public function comprobarEntradas($numeroEntradas) {
        if ($this->entradas >= $numeroEntradas) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Función "set" pública que se encarga de comprobar las entradas y actualizarlas.
     * 
     * @param integer $numeroEntradas Número de entradas que quieres vender.
     * @return string Indica si ha podido vender o no las entradas.
     */
    public function venderEntradas ($numeroEntradas){
        
        // Si al comprobar el número de entradas podemos vender, vendemos
        if ($this->comprobarEntradas($numeroEntradas)){
            $entradas = $this->getEntradas() - $numeroEntradas;
            $this->setEntradas($entradas);
            return "Entradas vendidas";
        }else{
            return "No quedan tantas entradas disponibles";
        }
    }
    
    public function getEntradas() {
        return $this->entradas;
    }
    
    // Hacemos el setEntradas privado que se encargará exclusivamente de modificar entradas
    private function setEntradas($numeroEntradas) {
        $this->entradas = $numeroEntradas;
    }
}
