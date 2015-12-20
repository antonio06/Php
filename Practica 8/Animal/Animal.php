<?php

abstract class Animal {

    private $genero;
    private $sexo;
    private $peso;
    private $alimentacion;
    private $tipoSangre;

    function __construct($genero, $sexo, $peso, $alimentacion, $tipoSangre) {
        $this->genero = $genero;
        $this->sexo = $sexo;
        $this->peso = $peso;
        $this->alimentacion = $alimentacion;
        $this->tipoSangre = $tipoSangre;
    }

    public function Comer() {
        return "Comida ? woooooo con el hambre que tengo <br>";
    }

    public function Hablar() {
        return "Venga a ver que sabeis decir <br>";
    }

    // Con this comparamos al objeto que ejecuta la acción y con perro2 el objeto 
    // pasado por parámetro
    public function Aparear($perro2) {
            if (($this->getGenero() == $perro2->getGenero())) {
                if ($this->getSexo() == "macho" && $perro2->getSexo() == "hembra"){
                    return "Hola guapa ";
                } elseif ($this->getSexo() == "hembra" && $perro2->getSexo() == "macho"){
                    return "Hola guapo ";
                } else{
                    return "Quita bichooo ";
                }
            } else{
                return "Lo siento yo solo me apareo con las de mi especie ";
            }
    }

    function getGenero() {
        return $this->genero;
    }

    function getSexo() {
        return $this->sexo;
    }

}
