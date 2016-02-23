<?php

/**
 * Descripción de Actividad
 *
 * @author Antonio Contreras Román
 */
class Actividad {

    // Atributos de la clase Actividad
    private $codigo_actividad;
    private $titulo;
    private $estado;
    private $coordinador;
    private $ponente;
    private $ubicacion;
    private $fecha_inicio;
    private $fecha_fin;
    private $horario_inicio;
    private $horario_fin;
    private $n_Total_Horas;
    private $precio;
    private $IVA;
    private $descriptor;
    private $observaciones;

    // Contructor de la clase Actividad
    function __construct($codigo_actividad, $titulo, $estado, $coordinador, $ponente, $ubicacion, $fecha_inicio, $fecha_fin, $horario_inicio, $horario_fin, $n_Total_Horas, $precio, $IVA, $descriptor, $observaciones) {
        $this->codigo_actividad = $codigo_actividad;
        $this->titulo = $titulo;
        $this->estado = $estado;
        $this->coordinador = $coordinador;
        $this->ponente = $ponente;
        $this->ubicacion = $ubicacion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->horario_inicio = $horario_inicio;
        $this->horario_fin = $horario_fin;
        $this->n_Total_Horas = $n_Total_Horas;
        $this->precio = $precio;
        $this->IVA = $IVA;
        $this->descriptor = $descriptor;
        $this->observaciones = $observaciones;
    }

    // Getters y Setters
    function getCodigo_actividad() {
        return $this->codigo_actividad;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCoordinador() {
        return $this->coordinador;
    }

    function getPonente() {
        return $this->ponente;
    }

    function getUbicacion() {
        return $this->ubicacion;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function getHorario_inicio() {
        return $this->horario_inicio;
    }

    function getHorario_fin() {
        return $this->horario_fin;
    }

    function getn_Total_Horas() {
        return $this->n_Total_Horas;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIVA() {
        return $this->IVA;
    }

    function getDescriptor() {
        return $this->descriptor;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function setCodigo_actividad($codigo_actividad) {
        $this->codigo_actividad = $codigo_actividad;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCoordinador($coordinador) {
        $this->coordinador = $coordinador;
    }

    function setPonente($ponente) {
        $this->ponente = $ponente;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    function setHorario_inicio($horario_inicio) {
        $this->horario_inicio = $horario_inicio;
    }

    function setHorario_fin($horario_fin) {
        $this->horario_fin = $horario_fin;
    }

    function setN_Total_Horas($n_Total_Horas) {
        $this->n_Total_Horas = $n_Total_Horas;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIVA($IVA) {
        $this->IVA = $IVA;
    }

    function setDescriptor($descriptor) {
        $this->descriptor = $descriptor;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    // Métodos

    /**
     * Inserta una actividad en la base de datos.
     * @param number $codigo código numérico que identifica a la actividad.
     * @param string $titulo titulo de la actividad.
     * @param estado $estado estado en el que se encuentra la actividad.
     * @param string $coordinador nombre del coordinador de la actividad.
     * @param string $ponente nombre del ponente de la actividad
     * @param string $ubicacion dirección donde se realizará la actividad.
     * @param date $fecha_inicio fecha de inicio en la que se realizará la actividad.
     * @param date $fecha_fin fecha de fin en la que termina la actividad.
     * @param time $horario_inicio hora de inicio a la que se realizará la actividad.
     * @param time $horario_fin hora de fin a la que termina la actividad.
     * @param numbre $n_Total_Horas nº total de horas de la actividad.
     * @param numbre $precio precio de la actividad.
     * @param string $IVA indica si la actividad tiene IVA o no.
     * @param string $descriptor personas a la que va dirigida la actividad
     * @param string $observaciones observaciones que puede tener una actividad
     */
    public function insert() {
        $conexion = BinDb::connectDB();
        $inserta = "INSERT INTO codigo_actividad (codigo, titulo, estado, coordinador"
                . ", ponente, ubicacion, fecha_inicio, fecha_fin, horario_inicio"
                . ", horario_fin, n_Total_Horas, precio, IVA, descriptor, observaciones) "
                . "VALUES (\"" . $this->codigo_actividad . "\", \"" . $this->titulo .
                "\", \"" . $this->estado . "\" , \"" . $this->coordinador .
                "\", \"" . $this->ponente . "\", \"" . $this->ubicacion . "\", \"" . $this->fecha_inicio .
                "\", \"" . $this->fecha_fin . "\", \"" . $this->horario_inicio . "\", \"" . $this->horario_fin .
                "\", \"" . $this->n_Total_Horas . "\", \"" . $this->precio . "\", \"" . $this->IVA .
                "\", \"" . $this->descriptor . "\", \"" . $this->observaciones . "\")";
        return $conexion->exec($inserta);
    }

    /**
     * Borra una actividad de la base de datos.
     * @param numbre $codigo pasamos el código de la actividad.
     */
    public function delete() {
        $conexion = BinDb::connectDB();
        $borrar = "DELETE FROM actividad WHERE codigo=\"" . $this->codigo_actividad . "\"";
        return $conexion->exec($borrar);
    }

    /**
     * Modifica una actividad de la base de datos.
     * @param number $codigo código numérico que identifica a la actividad.
     * @param string $titulo titulo de la actividad.
     * @param string $estado estado en el que se encuentra la actividad.
     * @param string $coordinador nombre del coordinador de la actividad.
     * @param string $ponente nombre del ponente de la actividad
     * @param string $ubicacion dirección donde se realizará la actividad.
     * @param date $fecha_inicio fecha de inicio en la que se realizará la actividad.
     * @param date $fecha_fin fecha de fin en la que termina la actividad.
     * @param time $horario_inicio hora de inicio a la que se realizará la actividad.
     * @param time $horario_fin hora de fin a la que termina la actividad.
     * @param numbre $n_Total_Horas nº total de horas de la actividad.
     * @param numbre $precio precio de la actividad.
     * @param string $IVA indica si la actividad tiene IVA o no.
     * @param string $descriptor personas a la que va dirigida la actividad
     * @param string $observaciones observaciones que puede tener una actividad
     */
    public function update() {
        $conexion = ActividadesDB::connectDB();
        $modificar = "UPDATE actividad Set codigo_actividad=\"" . $this->codigo_actividad . "\", titulo=\"" .
                $this->titulo . "\", estado=\"" . $this->estado .
                "\", coordinador=\"" . $this->coordinador . "\", ponente=\"" .
                $this->ponente . "\" , ubicacion=\"" . $this->ubicacion . "\", fecha_inicio=\"" .
                $this->fecha_inicio . "\" , fecha_fin=\"" . $this->fecha_fin . "\", horario_inicio=\"" .
                $this->horario_inicio . "\", horario_fin=\"" . $this->horario_fin .
                "\", n_Total_Horas=\"" . $this->n_Total_Horas . "\", precio=\""
                . $this->precio . "\", IVA=\"" . $this->IVA . "\", descriptor=\""
                . $this->descriptor . "\", observaciones=\"" . $this->observaciones .
                "\" WHERE codigo=" . $this->codigo_actividad;
        return $conexion->exec($modificar);
    }

    /**
     * Selecciona el código de la actividad y devuelve FALSE si encuentra más 
     * de un registro de esa actividad y TRUE si no encuentra nada.
     * este método se aplicará siempre que se quiera comprobar si existe un objeto 
     * con ese código.
     * @param number $codigo.
     * @return boolean.
     */
    public static function existeCodigo($codigo_actividad) {
        $conexion = ActividadesDB::connectDB();
        $consulta = "SELECT codigo FROM actividad WHERE codigo_actividad=\"" . $codigo_actividad . "\"";
        $registro = $consulta->fetchObject();
        if ($registro->rowCount() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getActividades() {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT * FROM actividad";
        $consulta = $conexion->query($seleccion);

        $actividades = [];

        while ($registro = $consulta->fetchObject()) {
            $actividades[] = new Actividad($registro->codigo_actividad, $registro->titulo, $registro->estado
                    , $registro->coordinador, $registro->ponente, $registro->ubicacion
                    , $registro->fecha_inicio, $registro->fecha_fin, $registro->horario_inicio
                    , $registro->horario_fin, $registro->n_Total_Horas, $registro->precio,
                    $registro->IVA, $registro->descriptor, $registro->observaciones);
        }

        return $actividades;
    }

    
    /**
     * Selecciona los campos de la tabla según el codigo.
     * @param string $codigo codigo correspondiente a la actividad.
     * @return array devuelve un objetos que cumple la consulta.
     */
    public static function getActividadByCodigo($codigo_actividad) {
        $conexion = BinDb::connectDB();
        $selecciona = "SELECT codigo_actividad, titulo, estado, coordinador, ponente,"
                . "ubicacion, fecha_inicio, fecha_fin, horario_inicio, horario_fin,"
                . "n_Total_Horas, precio, IVA, descriptor, observaciones FROM actividad"
                . " WHERE codigo_actividad=\"" . $codigo_actividad . "\"";
        $consulta = $conexion->query($selecciona);
        $registro = $consulta->fetchObject();
        $actividad = new Actividad($registro->codigo_actividad, $registro->titulo
                , $registro->estado, $registro->coordinador, $registro->ponente
                , $registro->ubicacion, $registro->fecha_inicio, $registro->fecha_fin
                , $registro->horario_inicio, $registro->horario_fin
                , $registro->n_Total_Horas, $registro->precio, $registro->IVA, 
                $registro->descriptor, $registro->observaciones);

        return $actividad;
    }
}
