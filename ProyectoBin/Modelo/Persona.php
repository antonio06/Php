<?php


/**
 * Descripción de Persona
 *
 * @author Antonio Contreras Román
 */
class Persona {
    // Atributos de la clase Persona
    private $codigo;
    private $DNI;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $perfil;
    private $foto;
    private $sexo;
    private $fecha_nac;
    private $direccion;
    private $municipio;
    private $provincia;
    private $pais;
    private $fecha_alta;
    private $fecha_baja;
    private $n_Seguridad_Social;
    private $n_Cuenta_Bancaria;
    private $email;
    private $observaciones;

    // Contructor de la clase Persona
    function __construct($codigo, $DNI, $nombre, $apellido1, $apellido2, $perfil, $foto, $sexo, $fecha_nac, $direccion, $municipio, $provincia, $pais, $fecha_alta, $fecha_baja, $n_Seguridad_Social, $n_Cuenta_Bancaria, $email, $observaciones) {
        $this->codigo = $codigo;
        $this->DNI = $DNI;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->perfil = $perfil;
        $this->foto = $foto;
        $this->sexo = $sexo;
        $this->fecha_nac = $fecha_nac;
        $this->direccion = $direccion;
        $this->direccion = $direccion;
        $this->municipio = $municipio;
        $this->provincia = $provincia;
        $this->pais = $pais;
        $this->fecha_alta = $fecha_alta;
        $this->fecha_baja = $fecha_baja;
        $this->n_Seguridad_Social = $n_Seguridad_Social;
        $this->n_Cuenta_Bancaria = $n_Cuenta_Bancaria;
        $this->email = $email;
        $this->observaciones = $observaciones;
    }
    
    // Getters y Setters
    function getCodigo() {
        return $this->codigo;
    }

    function getDNI() {
        return $this->DNI;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellido2() {
        return $this->apellido2;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getFoto() {
        return $this->foto;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getPais() {
        return $this->pais;
    }

    function getFecha_alta() {
        return $this->fecha_alta;
    }

    function getFecha_baja() {
        return $this->fecha_baja;
    }

    function getN_Seguridad_Social() {
        return $this->n_Seguridad_Social;
    }

    function getN_Cuenta_Bancaria() {
        return $this->n_Cuenta_Bancaria;
    }

    function getEmail() {
        return $this->email;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    function setFecha_baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }

    function setN_Seguridad_Social($n_Seguridad_Social) {
        $this->n_Seguridad_Social = $n_Seguridad_Social;
    }

    function setN_Cuenta_Bancaria($n_Cuenta_Bancaria) {
        $this->n_Cuenta_Bancaria = $n_Cuenta_Bancaria;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    // Métodos

    

}
