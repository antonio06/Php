<?php

/**
 * Description of Actividades
 *
 * @author Antonio Contreras Román
 */
class Actividades {
    private $codigo;
    private $titulo;
    private $estado;
    private $cordinador;
    private $ubicacion;
    private $fecha;
    private $horarios;
    private $totalHoras;
    private $precioTotal;
    private $IVA;
    
    function __construct($codigo, $titulo, $estado, $cordinador, $ubicacion, $fecha, $horarios, $totalHoras, $precioTotal, $IVA) {
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->estado = $estado;
        $this->cordinador = $cordinador;
        $this->ubicacion = $ubicacion;
        $this->fecha = $fecha;
        $this->horarios = $horarios;
        $this->totalHoras = $totalHoras;
        $this->precioTotal = $precioTotal;
        $this->IVA = $IVA;
    }
    
    

}
