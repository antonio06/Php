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
     * 
     * @param number $codigo Código numérico que identifica a la actividad.
     * @param string $titulo Titulo de la actividad.
     * @param estado $estado Estado en el que se encuentra la actividad.
     * @param string $coordinador Nombre del coordinador de la actividad.
     * @param string $ponente Nombre del ponente de la actividad
     * @param string $ubicacion Dirección donde se realizará la actividad.
     * @param date $fecha_inicio Fecha de inicio en la que se realizará la actividad.
     * @param date $fecha_fin Fecha de fin en la que termina la actividad.
     * @param time $horario_inicio Hora de inicio a la que se realizará la actividad.
     * @param time $horario_fin hora De fin a la que termina la actividad.
     * @param numbre $n_Total_Horas Nº total de horas de la actividad.
     * @param numbre $precio Precio de la actividad.
     * @param string $IVA Indica si la actividad tiene IVA o no.
     * @param string $descriptor Personas a la que va dirigida la actividad.
     * @param string $observaciones Observaciones que puede tener una actividad.
     */
    public function insert() {
        $conexion = BinDb::connectDB();
        $inserta = "INSERT INTO actividad (codigo_actividad, titulo, estado, coordinador"
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
     * 
     * @param numbre $codigo_actividad El código de la actividad.
     */
    public static function delete($codigo_actividad) {
        $conexion = BinDb::connectDB();
        $borrar = "DELETE FROM actividad WHERE codigo_actividad=\"" . $codigo_actividad . "\"";
        return $conexion->exec($borrar);
    }

    /**
     * Modifica una actividad de la base de datos.
     * 
     * @param number $codigo Código numérico que identifica a la actividad.
     * @param string $titulo titulo de la actividad.
     * @param string $estado estado en el que se encuentra la actividad.
     * @param string $coordinador nombre del coordinador de la actividad.
     * @param string $ponente nombre del ponente de la actividad.
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
        $conexion = BinDb::connectDB();
        $modificar = "UPDATE actividad Set codigo_actividad=\"" . $this->codigo_actividad . "\", titulo=\"" .
                $this->titulo . "\", estado=\"" . $this->estado .
                "\", coordinador=\"" . $this->coordinador . "\", ponente=\"" .
                $this->ponente . "\" , ubicacion=\"" . $this->ubicacion . "\", fecha_inicio=\"" .
                $this->fecha_inicio . "\" , fecha_fin=\"" . $this->fecha_fin . "\", horario_inicio=\"" .
                $this->horario_inicio . "\", horario_fin=\"" . $this->horario_fin .
                "\", n_Total_Horas=\"" . $this->n_Total_Horas . "\", precio=\""
                . $this->precio . "\", IVA=\"" . $this->IVA . "\", descriptor=\""
                . $this->descriptor . "\", observaciones=\"" . $this->observaciones .
                "\" WHERE codigo_actividad=" . $this->codigo_actividad;
//        return $conexion->exec($modificar);
        $conexion->exec($modificar);
        return $modificar;
    }

    /**
     * Se le pasa como parámetro el código de la catividad
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

    /**
     * No se le pasan parámetros
     * Selecciona todos los datos de las actividades 
     * @return array de con las actividades
     */
    public function getActividades() {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT * FROM actividad";
        $consulta = $conexion->query($seleccion);

        $actividades = [];

        while ($registro = $consulta->fetchObject()) {
            $actividades[] = new Actividad($registro->codigo_actividad, $registro->titulo, $registro->estado
                    , $registro->coordinador, $registro->ponente, $registro->ubicacion
                    , $registro->fecha_inicio, $registro->fecha_fin, $registro->horario_inicio
                    , $registro->horario_fin, $registro->n_Total_Horas, $registro->precio, $registro->IVA, $registro->descriptor, $registro->observaciones);
        }
        return $actividades;
    }

    /**
     * se le pasa como parámetro el codigo de la actividad
     * Selecciona los campos de la tabla según el codigo.
     * @param string $codigo codigo correspondiente a la actividad.
     * @return array de la actividad
     */
    public static function getActividadByCodigo($codigo_actividad) {
        $conexion = BinDb::connectDB();
        $selecciona = "SELECT codigo_actividad, titulo, estado, coordinador, ponente," .
                "ubicacion, fecha_inicio, fecha_fin, horario_inicio, horario_fin," .
                "n_Total_Horas, precio, IVA, descriptor, observaciones FROM actividad" .
                " WHERE codigo_actividad=\"" . $codigo_actividad . "\"";
        $consulta = $conexion->query($selecciona);
        $registro = $consulta->fetchObject();
        if ($registro) {
            return new Actividad($registro->codigo_actividad, $registro->titulo, $registro->estado, $registro->coordinador, $registro->ponente, $registro->ubicacion, $registro->fecha_inicio, $registro->fecha_fin, $registro->horario_inicio, $registro->horario_fin, $registro->n_Total_Horas, $registro->precio, $registro->IVA, $registro->descriptor, $registro->observaciones);
        }
        return NULL;
    }

    /**
     * No se le pasan parámetros
     * Selecciona todos los descriptores de las actividades.
     * @return array con los descriptores de la actividad.
     */
    public static function getDescriptoresActividad() {
        $conexion = BinDb::connectDB();
        $seleccion = "SHOW COLUMNS FROM actividad WHERE field='descriptor'";
        $consulta = $conexion->query($seleccion);
        $descriptores = [];

        $registro = $consulta->fetchObject();
        $cadena = "";
        foreach ($registro as $key => $value) {
            if ($key == "Type") {
                $cadena = $cadena . $value;
            }
        }
        substr($cadena, 4, -1);
        $cadena = str_replace("'", "", $cadena);
        $cadena = substr($cadena, 4, -1);
        $descriptores = explode(",", $cadena);

        return $descriptores;
    }

    /**
     * No se le pasan parámetros
     * Selecciona todos los estados de las actividades.
     * @return array de los estados de la actividad.
     */
    public static function getEstadosActividad() {
        $conexion = BinDb::connectDB();
        $seleccion = "SHOW COLUMNS FROM actividad WHERE field='estado'";
        $consulta = $conexion->query($seleccion);
        $estados = [];

        $registro = $consulta->fetchObject();
        $cadena = "";
        foreach ($registro as $key => $value) {
            if ($key == "Type") {
                $cadena = $cadena . $value;
            }
        }
        substr($cadena, 4, -1);
        $cadena = str_replace("'", "", $cadena);
        $cadena = substr($cadena, 4, -1);
        $estados = explode(",", $cadena);

        return $estados;
    }

    /**
     * No se le pasan parámetros
     * Selecciona todos los IVA de las actividades.
     * @return array de los ivas de las actividades.
     */
    public static function getIvaActividad() {
        $conexion = BinDb::connectDB();
        $seleccion = "SHOW COLUMNS FROM actividad WHERE field='IVA'";
        $consulta = $conexion->query($seleccion);
        $IVA = [];

        $registro = $consulta->fetchObject();
        $cadena = "";
        foreach ($registro as $key => $value) {
            if ($key == "Type") {
                $cadena = $cadena . $value;
            }
        }
        substr($cadena, 4, -1);
        $cadena = str_replace("'", "", $cadena);
        $cadena = substr($cadena, 4, -1);
        $IVA = explode(",", $cadena);

        return $IVA;
    }

    /**
     * Devuelve el número total de páginas.
     * @param number $limite Cantidad de registros que queremos mostrar.
     * @returm number El número de páginas totales.
     */
    public static function getNumeroPaginas($limite) {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT * FROM actividad";
        $consulta = $conexion->query($seleccion);
        $totalRegistros = $consulta->rowCount();
        // ceil redondea por arriba la división
        return ceil($totalRegistros / $limite);
    }

    /* Se le pasa como parámetro la sesión de la página y el limite 
     * @returm array de los objetos actividades.
     */

    public static function getActividadesByLimit($sesionPagina, $limite) {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT codigo_actividad, titulo, estado, coordinador, ponente,"
                . "ubicacion, fecha_inicio, fecha_fin, horario_inicio, horario_fin,"
                . "n_Total_Horas, precio, IVA, descriptor, observaciones"
                . " FROM actividad ORDER BY codigo_actividad LIMIT $sesionPagina , $limite";
        $consulta = $conexion->query($seleccion);
        $actividades = [];

        while ($registro = $consulta->fetchObject()) {
            $actividades[] = new Actividad($registro->codigo_actividad, $registro->titulo, $registro->estado
                    , $registro->coordinador, $registro->ponente, $registro->ubicacion
                    , $registro->fecha_inicio, $registro->fecha_fin, $registro->horario_inicio
                    , $registro->horario_fin, $registro->n_Total_Horas, $registro->precio, $registro->IVA, $registro->descriptor, $registro->observaciones);
        }
        return $actividades;
    }

    /**
     * Selecciona el título de la actividad
     * @return array con los titulos  de las actividades
     */
    public static function getTituloActividad() {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT titulo FROM actividad";
        $consulta = $conexion->query($seleccion);
        $titulos = [];

        while ($registro = $consulta->fetchObject()) {
            $titulos[] = new Actividad("", $registro->titulo, "", "", "", "", "", "", "", "", "", "", "", "", "");
        }
        return $titulos;
    }

    /**
     * Acepta como parámetro el titulo de la actividad
     * Selecciona el código pasándole como parámetro el titulo de la actividad
     * @param String $titulo 
     * @return array con el codigo de la actividad
     */
    public static function getCodigoActividadByTitulo($titulo) {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT codigo_actividad FROM `actividad` WHERE titulo='$titulo'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $codigo = [];
        foreach ($registro as $key => $value) {
            if ($key == "codigo_actividad") {
                return $codigo[$key] = $value;
            }
        }
    }

    /**
     * Inserta dentro de participa los datos enviados como parámetros
     * @param Integer $perfil con el codigo de la persona 
     * @param Integer $nombre con el codigo de la actividad 
     * @param Integer $codigo con el codigo del perfil con el que ingresa en la actividad
     * @return objeto de la actividad
     */
    public function insertParticipantes($perfil, $nombre, $codigo) {
        $conexion = BinDb::connectDB();
        $inserta = "INSERT INTO participa (codigo_persona, codigo_actividad, codigo_perfil) "
                . "VALUES (\"" . $perfil . "\", \"" . $nombre . "\", \"" . $codigo . "\")";
        return $conexion->exec($inserta);
    }

    /**
     * Selecciona todos los participantes no acepta parámetros
     * @return array con todos los objetos de participa
     */
    public static function getParticipantes() {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT * FROM participa";
        $consulta = $conexion->query($seleccion);
        $participantes = [];

        foreach ($consulta as $key => $value) {
            $participantes[$key] = $value;
        }
        return $participantes;
    }

    /**
     * Modifica un objeto participa con los datos que se envian como parámetros
     * @param Integer $perfil codigo de la persona.
     * @param Integer $nombre codigo de la actividad.
     * @param Integer $codigo codigo del perfil de la persona
     * @param Integer $sesionCodigo codigo de participa que está guardada como sesión
     * @return devuelve un objeto participa
     */
    public static function updateParticipa($perfil, $nombre, $codigo, $sesionCodigo) {
        $conexion = BinDb::connectDB();
        $modificar = "UPDATE participa  SET codigo_persona=\"" . $perfil . "\", codigo_actividad=\"" .
                $nombre . "\", codigo_perfil=\"" . $codigo
                . "\" WHERE codigo_persona=" . $sesionCodigo;
        //print_r($modificar);
        return $conexion->exec($modificar);
    }

    /**
     * Borra un objeto participa pasándole como parámetro el codigo de participa que está 
     * almacenado como una sesión
     * @param Integer $sesionCodigo
     * @return Objeto participa
     */
    public static function deleteParticipa($sesionCodigo) {
        $conexion = BinDb::connectDB();
        $borrar = "DELETE FROM participa WHERE codigo_persona=\"" . $sesionCodigo . "\"";
        return $conexion->exec($borrar);
    }

    /**
     *  Devuelve el numero de páginas que hay en la tabla de participa
     * Se le pasa como parámetro el limite (la cantidad de registros que queremos mostrar)
     * @returm numeroPaginas 
     */
    public static function getNumeroPaginasParticipa($limite) {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT * FROM participa";
        $consulta = $conexion->query($seleccion);
        $totalRegistros = $consulta->rowCount();
        return ceil($totalRegistros / $limite);
    }

    /**
     * Se le pueden pasar parámetros 
     * la sesión de la página el límite y el código de la persona
     * @param  type Integer $sesionPagina página que está almacenada como sesión
     * @param  type Integer $limite cantidad de registros que queremos mostrar
     * @param  type Integer $codigo_persona codigo de la persona si su valor es null mostrará todos los 
     * registros  de la tabla si no mostrará los registros pertenecientes a dicho código 
     * @returm array de objetos 
     */
    public static function getParticipantesByLimit($sesionPagina, $limite, $codigo_persona) {
        $conexion = BinDb::connectDB();
        if ($codigo_persona != NULL) {
            $seleccion = "SELECT codigo_persona, codigo_actividad, codigo_perfil FROM participa "
                    . "WHERE codigo_persona=$codigo_persona ORDER BY codigo_persona LIMIT $sesionPagina , $limite";
        } else {
            $seleccion = "SELECT codigo_persona, codigo_actividad, codigo_perfil FROM participa "
                    . "ORDER BY codigo_persona LIMIT $sesionPagina , $limite";
        }
        $consulta = $conexion->query($seleccion);
        $participantes = [];

        foreach ($consulta as $key => $value) {
            $participantes[$key] = $value;
        }
        return $participantes;
    }

    /**
     * Selecciona el código del perfil perteneciente a la descripción de participante 
     * @return type Integer codigo del perfil  
     */
    public static function getCodigoParticipante() {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT codigo FROM perfil WHERE descripcion='participante'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        foreach ($registro as $key => $value) {
            $codigo_perfil = $value;
        }
        return $codigo_perfil;
    }

    /**
     * Devuelve una representación del objeto en formato JSON.
     * @return type String El objeto en formato JSON. 
     */
    public function toJSON() {
        $actividad = [
            "codigo_actividad" => $this->codigo_actividad,
            "titulo" => $this->titulo,
            "estado" => $this->estado,
            "coordinador" => $this->coordinador,
            "ponente" => $this->ponente,
            "ubicacion" => $this->ubicacion,
            "fecha_inicio" => $this->fecha_inicio,
            "fecha_fin" => $this->fecha_fin,
            "horario_inicio" => $this->horario_inicio,
            "horario_fin" => $this->horario_fin,
            "n_Total_Horas" => $this->n_Total_Horas,
            "precio" => $this->precio,
            "IVA" => $this->IVA,
            "descriptor" => $this->descriptor,
            "observaciones" => $this->observaciones
        ];
        return json_encode($actividad);
    }

}
