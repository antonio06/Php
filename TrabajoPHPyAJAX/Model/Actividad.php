<?php

/**
 * Description of Actividades
 *
 * @author Antonio Contreras Román
 */
class Actividad {

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

    function getCodigo() {
        return $this->codigo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCordinador() {
        return $this->cordinador;
    }

    function getUbicacion() {
        return $this->ubicacion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHorarios() {
        return $this->horarios;
    }

    function getTotalHoras() {
        return $this->totalHoras;
    }

    function getPrecioTotal() {
        return $this->precioTotal;
    }

    function getIVA() {
        return $this->IVA;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCordinador($cordinador) {
        $this->cordinador = $cordinador;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHorarios($horarios) {
        $this->horarios = $horarios;
    }

    function setTotalHoras($totalHoras) {
        $this->totalHoras = $totalHoras;
    }

    function setPrecioTotal($precioTotal) {
        $this->precioTotal = $precioTotal;
    }

    function setIVA($IVA) {
        $this->IVA = $IVA;
    }

    public function getActividades() {
        $conexion = ActividadesDB::connectDB();
        $seleccion = "SELECT * FROM actividad";
        $consulta = $conexion->query($seleccion);

        $actividades = [];

        while ($registro = $consulta->fetchObject()) {
            $actividades[] = new Actividad($registro->codigo, $registro->titulo, $registro->estado
                    , $registro->cordinador, $registro->ubicacion, $registro->fecha
                    , $registro->horarios, $registro->totalHoras, $registro->precioTotal
                    , $registro->IVA);
        }

        return $actividades;
    }

    /**
     * Inserta una actividad en la base de datos.
     * @param number $codigo código numérico que identifica a la actividad.
     * @param string $titulo titulo de la actividad.
     * @param estado $estado estado en el que se encuentra la actividad.
     * @param string $coordinador nombre del coordinador de la actividad.
     * @param string $ubicacion dirección donde se realizará la actividad.
     * @param date $fecha fecha en la que se realizará la actividad.
     * @param time $horarios hora a la que se realizará la actividad.
     * @param numbre $totalHoras total de horas de la actividad.
     * @param numbre $precioTotal precio total de la actividad.
     * @param string $IVA indica si la actividad tiene IVA o no.
     */
    public function insert() {
        $conexion = ActividadesDB::connectDB();
        $inserta = "INSERT INTO actividad (codigo, titulo, estado, cordinador"
                . ", ubicacion, fecha, horarios, totalHoras, precioTotal, IVA)"
                . "VALUES (\"" . $this->codigo . "\", \"" . $this-> titulo . 
                "\", \"" . $this->estado . "\" , \"" . $this->cordinador .
                "\", \"" . $this->ubicacion . "\", \"" . $this->fecha . 
                "\", \"" . $this->horarios . "\", \"" . $this->totalHoras .
                "\", \"" . $this->precioTotal . "\", \"" . $this->IVA . "\")";
        $conexion->exec($inserta);
    }

    /**
     * Borra una actividad de la base de datos.
     * @param numbre $codigo pasamos el código de la actividad.
     */
    public function delete() {
        $conexion = ActividadesDB::connectDB();
        $borrar = "DELETE FROM actividad WHERE codigo='" . $this->codigo . "'";
        $conexion->exec($borrar);
    }

    /**
     * Modifica una actividad de la base de datos.
     * @param string $codigo codigo nuevo introducido por el usuario
     * @param string $titulo titulo nuevo introducido por el usuario
     * @param string $estado estado nuevo introducido por el usuario
     * @param string $coordinador coordinador nuevo introducido por el usuario
     * @param string $ubicacion ubicacion nueva introducido por el usuario
     * @param date $fecha fecha nueva introducido por el usuario
     * @param time $horarios horario nuevo introducido por el usuario
     * @param integer $totalHoras total de horas nueva introducida por el usuario
     * @param integer $precioTotal precio total nuevo introducido por el usuario
     * @param string $IVA IVA nuevo introducido por el usuario
     */
    public function update($codigo, $titulo, $estado, $coordinador, $ubicacion, $fecha, $horarios, $totalHoras, $precioTotal, $IVA) {
        $conexion = ActividadesDB::connectDB();
        $modificar = "UPDATE actividades Set codigo='" . $codigo . "', "
                . "titulo='" . $titulo . "', estado='" . $estado . "'"
                . ", coordinador='" . $coordinador . "', ubicacion='"
                . $ubicacion . "', fecha='" . $fecha . "', horarios='"
                . $horarios . "', totalHoras='" . $totalHoras . "', precioTotal='"
                . $precioTotal . "', IVA='" . $IVA . "'";
        $conexion->exec($modificar);
    }

    /**
     * Selecciona los campos de la tabla según el campo y valor.
     * @param string $campo campo correspondiente a la base de datos.
     * @param string $valor valor correspondiente al campo.
     * @return array devuelve un array de objetos que cumplen la consulta.
     */
    public function getActividadesBy($campo, $valor) {
        $conexion = ActividadesDB::connectDB();
        $obtener = "SELECT codigo, titulo, estado, coordinador, ubicacion"
                . ", fecha, horarios, totalHoras, precioTotal, IVA FROM actividades"
                . "WHERE " . $campo . "= '$valor'";
        $consulta = $conexion->query($obtener);
        $actividades = [];

        while ($registro = $consulta->fetchObject()) {
            $actividades[] = new Actividad($registro->codigo, $registro->titulo, $registro->estado
                    , $registro->coordinador, $registro->ubicacion, $registro->fecha
                    , $registro->horarios, $registro->totalHoras, $registro->precioTotal
                    , $registro->IVA);
        }

        return $actividades;
    }

    /**
     * Selecciona los campos de la tabla según el codigo.
     * @param string $codigo codigo correspondiente a la actividad.
     * @return array devuelve un objetos que cumple la consulta.
     */
    public function getActividadByCodigo($codigo) {
        $conexion = ActividadesDB::connectDB();
        $selecciona = "SELECT codigo, titulo, estado, coordinador, ubicacion,"
                . "fecha, horarios, totalHoras, precioTotal, IVA FROM actividad"
                . " WHERE codigo='" . $codigo . "'";
        $consulta = $conexion->query($selecciona);
        $registro = $consulta->fetchObject();
        $actividad = new Actividad($codigo->codigo, $titulo->titulo, $estado->estado
                , $coordinador->coordinador, $ubicacion->ubicacion, $fecha->fecha
                , $horarios->horarios, $totalHoras->totalHoras, $precioTotal->precioTotal
                , $IVA->IVA);

        return $actividad;
    }

}
