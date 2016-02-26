<?php

/**
 * Description of UsuariosContrasena
 *
 * @author Antonio Contreras Román
 */
class UsuariosContrasena {

    private $codigo_persona;
    private $user;
    private $password;
    private $perfil;

    // Constructor 

    function __construct($codigo_persona, $user, $password, $perfil) {
        $this->codigo_persona = $codigo_persona;
        $this->user = $user;
        $this->password = $password;
        $this->perfil = $perfil;
    }

    // Getters y Setters

    function getCodigo_persona() {
        return $this->codigo_persona;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setCodigo_persona($codigo_persona) {
        $this->codigo_persona = $codigo_persona;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    // Métodos 

    /**
     * Selecciona el código de la actividad y devuelve FALSE si encuentra más 
     * de un registro de esa persona y TRUE si no encuentra nada.
     * este método se aplicará siempre que se quiera comprobar si existe un objeto 
     * con ese código.
     * @param number $codigo.
     * @return boolean.
     */
    public static function getUsuarioContrasenaByCodigo($codigo_persona) {
        $conexion = BinDb::connectDB();
        $consulta = $conexion->query("SELECT codigo_persona FROM usuarioscontrasena WHERE codigo_persona=\"" . $codigo_persona . "\"");

        if ($consulta->rowCount() > 0) {
            $resultado = TRUE;
        }else {
            $resultado = FALSE;
        }
        return $resultado;
    }

    /**
     * Inserta un usuario y una contraseña para la persona en la base de datos.
     * @param number $codigo código numérico que identifica a la persona.
     * @param string $user usuario de la persona.
     * @param string $password contraseña de la persona se lanzara a la bbdd de manera encriptada.
     * @param string $perfil perfil de la persona puede ser Administrador Limitado y Usuario.
     */
    public function insert() {
        $conexion = BinDb::connectDB();
        $inserta = "INSERT INTO usuarioscontrasena (codigo_persona, user, password, perfil)"
                . "VALUES (\"" . $this->codigo_persona . "\", \"" . $this->user .
                "\", \"" . $this->password . "\" , \"" . $this->perfil . "\")";
        return $conexion->exec($inserta);
    }

    /**
     * Selecciona los usuarios y las contraseñas de las persona.
     * @return array.
     */
    public function getUsuariosContrasenas() {
        $conexion = BinDb::connectDB();
        $seleccion = "SELECT * FROM usuarioscontrasena";
        $consulta = $conexion->query($seleccion);

        $usuariosContrasena = [];

        while ($registro = $consulta->fetchObject()) {
            $usuariosContrasena[] = new UsuariosContrasena($registro->codigo_persona, 
                    $registro->user, $registro->password, $registro->perfil);
        }

        return $usuariosContrasena;
    }

    /**
     * Modifica una persona de la base de datos.
     * @param number $codigo código numérico que identifica a la persona.
     * @param string $user usuario de la persona.
     * @param string $password contraseña de la persona.
     * @param string $perfil perfil de la persona puede ser Administrador, Limitado, Usuario.
     */
    public function update() {
        $conexion = BinDb::connectDB();
        $modificar = "UPDATE usuarioscontrasena Set codigo_persona=\"" . $this->codigo_persona . "\", user=\"" .
                $this->user . "\", password=\"" . $this->password ."\", perfil=\"" . $this->perfil . 
                "\" WHERE codigo_persona=" . $this->codigo_persona;
        return $conexion->exec($modificar);
    }
    
    /**
     * Borra un usuario y la contraseña de la base de datos.
     * @param numbre $codigo pasamos el código de la persona.
     */
    public function delete() {
        $conexion = BinDb::connectDB();
        $borrar = "DELETE FROM usuarioscontrasena WHERE codigo_persona=\"" . $this->codigo_persona . "\"";
        return $conexion->exec($borrar);
    }
}
