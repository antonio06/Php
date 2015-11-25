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
            // Comprobamos si esiste la variable de sesion conectado
            if (isset($_SESSION['conectado'])) {
                try {
                    // Conectamos con la base de datos
                    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
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
                    <?= $resultado->usuario ?> <a href="borrado.php"><i class="fa fa-user"></i></a> 
                </div>
                <div id="cuerpo">
                    <span>Productos</span>
                    <table>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Stock</th>
                            <th></th>
                        </tr>
                        <?php
                        try {
                            // Establecemos conexión y seleccionamos los campos y los ordenamos por nombre
                            $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                            die("Error: " . $e->getMessage());
                        }
                        // Extraemos cada elemento con el bulce y los vamos mostrando uno a uno en la tabla
                        $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM productos");
                        while ($resultado = $consulta->fetchObject()) {
                            ?>
                            <tr>
                                <td><?= $resultado->codigo ?></td>
                                <td><?= $resultado->descripcion ?></td>
                                <td><?= $resultado->precioCompra ?></td>
                                <td><?= $resultado->precioVenta ?></td>
                                <td><?= $resultado->stock ?></td>
                                <td><a href="comprarProducto.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-cart-arrow-down"></i></a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>