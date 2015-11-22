<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GESTISIMAL</title>
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>GESTISIMAL</p>
            </div>
            <?php
            if (isset($_SESSION['conectado'])) {
                try {
                    // Conectamos con la base de datos
                    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                } catch (PDOException $e) {
                    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                    die("Error: " . $e->getMessage());
                }
                // Seleccionamos el nombre con el usuario enviado 
                $consulta = $conexion->query("SELECT usuario FROM usuarioscontrasena where usuario='" . $_SESSION['usuario'] . "'");
                $resultado = $consulta->fetchObject();
                ?>
                <div id="icono">
                    <?= $resultado->usuario ?> <a href="borrado.php"><i class="fa fa-user"></i></a> 
                </div>
                <div id="cuerpo">
                    <!-- Creamos un formulario donde preguntamos si queremos eliminar dicho producto -->
                    <form action="eliminarRegistro.php" method="post">
                        <?php
                        // Dni se hace variable de sesión para manejarnos con ella cuando lo necesitemos
                        $_SESSION['codigo'] = $_GET['codigo'];
                        ?>
                        <span>¿ Quieres eleminar el registro ?</span><br>
                        <select name="opciones">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                        <input id="boton" type="submit" value="Enviar"> 
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>
