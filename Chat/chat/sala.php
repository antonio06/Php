<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat OffLine</title>
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Chat OffLine</p>
            </div>
            <?php
            // Comprobamos si esiste la variable de sesion conectado
            if (isset($_SESSION['conectado'])) {
                try {
                    // Conectamos con la base de datos
                    $conexion = new PDO("mysql:host=localhost;dbname=chat;charset=utf8", "root", "root");
                } catch (PDOException $e) {
                    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                    die("Error: " . $e->getMessage());
                }
                // Ejecutamos la query para obtener el nombre con el usuario introducido
                $consulta = $conexion->query("SELECT usuario FROM usuarioscontrasena where usuario='" . $_SESSION['usuario'] . "'");
                // Obtenemos la siquiente fila y devuelve un objeto
                $resultado = $consulta->fetchObject();
                ?>
                <div id="icono">
                    <?= $resultado->usuario ?> <a href="desconectar.php"><i class="fa fa-user"></i></a> 
                </div>
                <div id="cuerpo">
                    <?php
                    try {
                        // Conectamos con la base de datos
                        $conexion = new PDO("mysql:host=localhost;dbname=chat;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    $consulta = $conexion->query("SELECT * FROM sala");
                    if ($consulta->rowCount() > 0) {
                        ?>
                    <span>No hay mensajes</span>
                        <?php
                    }
                    ?>
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <form action="comentar.php" method="post">
                        <input type="text" id="cajaComentarios">
                        <input type="submit" id="boton" value="Enviar">
                    </form>
                    <?php
                }
                ?>

            </div>
        </div>
    </body>
</html>