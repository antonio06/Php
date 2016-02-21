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

    /**
     * Inserta una persona en la base de datos.
     * @param number $codigo código numérico que identifica a la persona.
     * @param string $DNI DNI de la persona.
     * @param estado $nombre nombre de la persona.
     * @param string $apellido1 primer apellido de la persona.
     * @param string $apellido2 segundo apellido de la persona.
     * @param string $perfil perfil de la persona.
     * @param varchar $foto foto de la persona.
     * @param string $sexo sexo de la persona puede ser hombre o mujer.
     * @param date $fecha_nac fecha de nacimiento de la persona.
     * @param string $direccion direccion donde vive la persona.
     * @param string $municipio municipio donde vive la persona.
     * @param string $provincia provincia donde vive la persona.
     * @param string $pais país de donde es la persona.
     * @param date $fecha_alta fecha de alta de la persona.
     * @param date $fecha_baja fecha de baja de la persona.
     * @param number $n_Seguridad_Social número de la seguridad social de la persona.
     * @param number $n_Cuenta_Bancaria número de cuenta bancaria de la persona.
     * @param string $email email de la persona.
     * @param string $observaciones observaciones que podemos ponerle al perfil de la persona.
     */
    public function insert() {
        $conexion = BinDb::connectDB();
        $inserta = "INSERT INTO persona (codigo, DNI, nombre, apellido1"
                . ", apellido2, perfil, foto, sexo, fecha_nac"
                . ", direccion, municipio, provincia, pais, fecha_alta, fecha_baja"
                . "n_Seguridad_Social, n_Cuenta_Bancaria, email, observaciones) "
                . "VALUES (\"" . $this->codigo . "\", \"" . $this->DNI .
                "\", \"" . $this->nombre . "\" , \"" . $this->apellido1 .
                "\", \"" . $this->apellido2 . "\", \"" . $this->perfil . "\", \"" . $this->foto .
                "\", \"" . $this->sexo . "\", \"" . $this->fecha_nac . "\", \"" . $this->direccion .
                "\", \"" . $this->municipio . "\", \"" . $this->provincia . "\", \"" . $this->pais .
                "\", \"" . $this->fecha_alta . "\", \"" . $this->fecha_baja . 
                "\", \"" . $this->n_Seguridad_Social . "\", \"" . $this->n_Cuenta_Bancaria 
                . "\", \"" . $this->email . "\", \"" . $this->observaciones . "\")";
        return $conexion->exec($inserta);
    }

    /**
     * Borra una persona de la base de datos.
     * @param numbre $codigo pasamos el código de la persona.
     */
    public function delete() {
        $conexion = BinDb::connectDB();
        $borrar = "DELETE FROM persona WHERE codigo=\"" . $this->codigo . "\"";
        return $conexion->exec($borrar);
    }

    
    /**
     * Modifica una persona de la base de datos.
     * @param number $codigo código numérico que identifica a la persona.
     * @param string $DNI DNI de la persona.
     * @param estado $nombre nombre de la persona.
     * @param string $apellido1 primer apellido de la persona.
     * @param string $apellido2 segundo apellido de la persona.
     * @param string $perfil perfil de la persona.
     * @param varchar $foto foto de la persona.
     * @param string $sexo sexo de la persona puede ser hombre o mujer.
     * @param date $fecha_nac fecha de nacimiento de la persona.
     * @param string $direccion direccion donde vive la persona.
     * @param string $municipio municipio donde vive la persona.
     * @param string $provincia provincia donde vive la persona.
     * @param string $pais país de donde es la persona.
     * @param date $fecha_alta fecha de alta de la persona.
     * @param date $fecha_baja fecha de baja de la persona.
     * @param number $n_Seguridad_Social número de la seguridad social de la persona.
     * @param number $n_Cuenta_Bancaria número de cuenta bancaria de la persona.
     * @param string $email email de la persona.
     * @param string $observaciones observaciones que podemos ponerle al perfil de la persona.
     */
    public function update() {
        $conexion = ActividadesDB::connectDB();
        $modificar = "UPDATE actividad Set codigo=\"" . $this->codigo . "\", DNI=\"" .
                $this->DNI . "\", nombre=\"" . $this->nombre .
                "\", apellido1=\"" . $this->apellido1 . "\", apellido2=\"" .
                $this->apellido2 . "\" , perfil=\"" . $this->perfil . "\", foto=\"" .
                $this->foto . "\" , sexo=\"" . $this->sexo . "\", fecha_nac=\"" .
                $this->fecha_nac . "\", fireccion=\"" . $this->direccion .
                "\", municipio=\"" . $this->municipio . "\", provincia=\""
                . $this->provincia . "\", pais=\"" . $this->pais . "\", fecha_alta=\""
                . $this->fecha_alta . "\", fecha_baja=\"" . $this->fecha_baja .
                "\", n_Seguridad_Social=\"" . $this->n_Seguridad_Social . 
                "\", n_Cuenta_Bancaria=\"" . $this->n_Cuenta_Bancaria . 
                "\", email=\"" . $this->email . "\", observaciones=\"" . $this->observaciones .
                "\" WHERE codigo=" . $this->codigo;
        return $conexion->exec($modificar);
    }
    
    /**
     * Selecciona el código de la actividad y devuelve FALSE si encuentra más 
     * de un registro de esa persona y TRUE si no encuentra nada.
     * este método se aplicará siempre que se quiera comprobar si existe un objeto 
     * con ese código.
     * @param number $codigo.
     * @return boolean.
     */
    public static function getPersonadByCodigo($codigo) {
        $conexion = ActividadesDB::connectDB();
        $consulta = "SELECT codigo FROM persona WHERE codigo=\"" . $codigo . "\"";
        $registro = $consulta->fetchObject();
        if ($registro->rowCount() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
