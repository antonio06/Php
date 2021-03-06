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
                // Permiso es un campo int 1-> para usuarios normales 2-> para admin
                $consulta = $conexion->query("SELECT usuario, permiso FROM usuarioscontrasena where usuario='" . $_SESSION['usuario'] . "'");
                // Obtenemos la siquiente fila y devuelve un objeto
                $resultado = $consulta->fetchObject();
                // guardo el resultado en una variable
                $permiso = $resultado->permiso;
                ?>
                <div id="icono">
                    <?= $resultado->usuario ?> <a href="borrado.php"><i class="fa fa-user"></i></a> 
                </div>
                <div id="cuerpo">
                    <?php
                    try {
                        // Conectamos con la base de datos
                        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    // Ejecutamos la query para obtener el nombre con el usuario introducido
                    $consulta = $conexion->query("SELECT DISTINCT categoria FROM productos");
                    // Obtenemos la siquiente fila y devuelve un objeto
                    ?>
                    <form action="tienda.php" method="post" style="margin-left: -719px">
                        <select name="opciones1">
                            <option value="codigo">Codigo</option>
                            <option value="stock">Stock</option>
                        </select>
                        <select name="opciones2">
                            <?php
                            while ($resultado = $consulta->fetchObject()) {
                                ?>
                                <option value="<?= $resultado->categoria ?>"><?= $resultado->categoria ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input id="boton" type="submit" value="Filtrar"> 
                    </form>
                    <form action="tienda.php" method="post">
                        <span>Introduce el umbral</span>
                        <input type="num" name="umbral">
                        <input type="submit" value="Introducir">
                    </form>

                    <div class="compraVenta"><span><a href="comprar.php">Comprar <i class="fa fa-cart-arrow-down"></i></a>
                            <a href="vender.php">Vender <i class="fa fa-credit-card"></i></a></span></div>
                    <form action="alta.php" method="post">
                        <table>
                            <tr>
                                <th>Codigo</th>
                                <th>Descripción</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><input id="formulario" type="number" name="codigo"></td>
                                <td><input id="formulario" type="text" name="descripcion"></td>
                                <td><input id="formulario" type="numbre" name="precioCompra"></td>
                                <td><input id="formulario" type="number" name="precioVenta"></td>
                                <td><input id="formulario" type="text" name="categoria"></td>
                                <td><input id="formulario" type="number" name="stock"></td>
                                <td><i class="fa fa-check"><input type="submit" id="boton"></i></td> 
                            </tr>
                            <?php
                            try {
                                // Establecemos conexión y seleccionamos los campos y los ordenamos por nombre
                                $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                            } catch (PDOException $e) {
                                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                                die("Error: " . $e->getMessage());
                            }
                            if (isset($_POST['opciones1']) && ($_POST['opciones2'])) {
                                $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos WHERE categoria='" . $_POST['opciones2'] . "' ORDER BY $_POST[opciones1]");
                            } else {
                                // Extraemos cada elemento con el bulce y los vamos mostrando uno a uno en la tabla
                                $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos ORDER BY codigo");
                            }
                            while ($resultado = $consulta->fetchObject()) {
                                // Si umbral no está creada por defecto será de 10
                                if (!isset($_POST['umbral'])) {
                                    $_POST['umbral'] = 10;
                                }
                                // Si el umbral es menor a la cantidad indicada cada fila de la tabla se pintara de rojo
                                // En caso contrario es decir que el umbral sea mayor o igual al número indicado 
                                // la fila estara con el color por defecto
                                if (($resultado->stock < $_POST['umbral'])) {
                                    ?>
                                    <tr style="color: red">
                                        <td><?= $resultado->codigo ?></td>
                                        <td><?= $resultado->descripcion ?></td>
                                        <td><?= $resultado->precioCompra ?></td>
                                        <td><?= $resultado->precioVenta ?></td>
                                        <td><?= $resultado->categoria ?></td>
                                        <td><?= $resultado->stock ?></td>
                                        <?php
                                        if ($permiso == 2) {
                                            ?>
                                            <td><a href="modificar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-pencil"></i></a><a href="eliminar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-trash"></i></a></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a><i class="fa fa-pencil"></i></a><a href="eliminar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-trash"></i></a></td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                        <td><?= $resultado->codigo ?></td>
                                        <td><?= $resultado->descripcion ?></td>
                                        <td><?= $resultado->precioCompra ?></td>
                                        <td><?= $resultado->precioVenta ?></td>
                                        <td><?= $resultado->categoria ?></td>
                                        <td><?= $resultado->stock ?></td>
                                        <?php
                                        if ($permiso == 2) {
                                            ?>
                                            <td><a href="modificar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-pencil"></i></a><a href="eliminar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-trash"></i></a></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><a><i class="fa fa-pencil"></i></a><a href="eliminar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-trash"></i></a></td>
                                                    <?php
                                                }
                                            }
                                            ?>
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
