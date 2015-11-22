<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Base de Datos Clientes</title>
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Clientes</p>
            </div>
            <?php
            // Comprobamos si esiste la variable de sesion conectado
            if (isset($_SESSION['conectado'])) {
                try {
                    // Conectamos con la base de datos
                    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
                } catch (PDOException $e) {
                    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                    die("Error: " . $e->getMessage());
                }
                // Ejecutamos la query para obtener el nombre con el usuario introducido
                $consulta = $conexion->query("SELECT nombre FROM empleado where dni='" . $_SESSION['usuario'] . "'");
                // Obtenemos la siquiente fila y devuelve un objeto
                $resultado = $consulta->fetchObject();
                ?>
                <div id="icono">
                    <?= $resultado->nombre ?> <a href="borrado.php"><i class="fa fa-user"></i></a> 
                </div>
                <div id="cuerpo">
                    <form action="alta.php" method="post">
                        <table>
                            <tr>
                                <th>Dni</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><input id="formulario" type="number" name="dni"></td>
                                <td><input id="formulario" type="text" name="nombre"></td>
                                <td><input id="formulario" type="text" name="direccion"></td>
                                <td><input id="formulario" type="number" name="telefono"></td>
                                <td><i class="fa fa-check"><input type="submit" id="boton"></i></td> 
                            </tr>
                            <?php
                            try {
                                // Establecemos conexión y seleccionamos los campos y los ordenamos por nombre
                                $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
                            } catch (PDOException $e) {
                                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                                die("Error: " . $e->getMessage());
                            }
                            // Extraemos cada elemento con el bulce y los vamos mostrando uno a uno en la tabla
                            $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente ORDER BY nombre");
                            while ($resultado = $consulta->fetchObject()) {
                                ?>
                                <tr>
                                    <td><?= $resultado->dni ?></td>
                                    <td><?= $resultado->nombre ?></td>
                                    <td><?= $resultado->direccion ?></td>
                                    <td><?= $resultado->telefono ?></td>
                                    <td><a href="modificar.php?dni=<?= $resultado->dni ?>"><i class="fa fa-pencil"></i></a><a href="eliminar.php?dni=<?= $resultado->dni ?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
