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
                    <form action="tienda.php" method="post" style="margin-left: -719px">
                        <select name="opciones1">
                            <option value="codigo">Codigo</option>
                            <option value="stock">Stock</option>
                        </select>
                        <select name="opciones2">
                            <option value="movil">Movil</option>
                            <option value="tablet">Tablet</option>
                            <option value="portatil">Portatil</option>
                            <option value="sobremesa">Sobremesa</option>
                        </select>
                        <input id="boton" type="submit" value="Filtrar"> 
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
                            if (isset($_POST['opciones1']) && ($_POST['opciones2'])){
                                $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos WHERE categoria='". $_POST['opciones2'] ."' ORDER BY $_POST[opciones1]");
                            }else{
                            // Extraemos cada elemento con el bulce y los vamos mostrando uno a uno en la tabla
                            $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos ORDER BY codigo");
                            
                            }
                            while ($resultado = $consulta->fetchObject()) {
                                ?>
                                <tr>
                                    <td><?= $resultado->codigo ?></td>
                                    <td><?= $resultado->descripcion ?></td>
                                    <td><?= $resultado->precioCompra ?></td>
                                    <td><?= $resultado->precioVenta ?></td>
                                    <td><?= $resultado->categoria ?></td>
                                    <td><?= $resultado->stock ?></td>
                                    <td><a href="modificar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-pencil"></i></a><a href="eliminar.php?codigo=<?= $resultado->codigo ?>"><i class="fa fa-trash"></i></a></td>
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
