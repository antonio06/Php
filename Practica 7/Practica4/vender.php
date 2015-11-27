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
                    <form action="vender.php" method="post">
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
                        <input id="boton" type="submit" value="Ordenar"> 
                    </form>
                    <span>Productos</span>
                    <!--<form action="carrito.php" method="post">-->
                    <table style="margin-left: 51px">
                        <tr>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Categoría</th>
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
                        if (isset($_POST['opciones1']) && ($_POST['opciones2'])) {
                            $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos WHERE categoria='" . $_POST['opciones2'] . "' ORDER BY $_POST[opciones1]");
                        } else {
                            // Extraemos cada elemento con el bulce y los vamos mostrando uno a uno en la tabla
                            $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos WHERE stock > 0 OR stock = 0");
                        }
                        while ($resultado = $consulta->fetchObject()) {
                            if ($resultado->stock == 0) {
                                ?>

                                <tr style="color: red">
                                    <td><?= $resultado->codigo ?></td>
                                    <td><?= $resultado->descripcion ?></td>
                                    <td><?= $resultado->precioCompra ?></td>
                                    <td><?= $resultado->precioVenta ?></td>
                                    <td><?= $resultado->categoria ?></td>
                                    <td><?= $resultado->stock ?></td>
                                <input type="hidden" name="accion" value="comprar">
                                <td><button id="boton" type="submit" style="background-color: red">Vender</button></td>
                                </tr>

                                <?php
                            } elseif ($resultado->stock == 1) {
                                ?>
                                <form action="carrito.php" method="post">
                                    <tr style="color: orange">
                                        <td><?= $resultado->codigo ?></td>
                                        <td><?= $resultado->descripcion ?></td>
                                        <td><?= $resultado->precioCompra ?></td>
                                        <td><?= $resultado->precioVenta ?></td>
                                        <td><?= $resultado->categoria ?></td>
                                        <td><?= $resultado->stock ?></td>
                                    <input type="hidden" name="accion" value="comprar">
                                    <input type="hidden" name="descripcion" value="<?= $resultado->descripcion ?>">
                                    <input type="hidden" name="precioCompra" value="<?= $resultado->precioCompra ?>">
                                    <input type="hidden" name="precioVenta" value="<?= $resultado->precioVenta ?>">
                                    <input type="hidden" name="categoria" value="<?= $resultado->categoria ?>">
                                    <input type="hidden" name="stock" value="<?= $resultado->stock ?>">
                                    <td><button id="boton" type="submit" style="background-color: orange" value="<?= $resultado->codigo ?>" name="codigo">Vender</button></td>
                                    </tr>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form action="carrito.php" method="post">
                                    <tr>
                                        <td><?= $resultado->codigo ?></td>
                                        <td><?= $resultado->descripcion ?></td>
                                        <td><?= $resultado->precioCompra ?></td>
                                        <td><?= $resultado->precioVenta ?></td>
                                        <td><?= $resultado->categoria ?></td>
                                        <td><?= $resultado->stock ?></td>
                                    <input type="hidden" name="accion" value="comprar">
                                    <input type="hidden" name="descripcion" value="<?= $resultado->descripcion ?>">
                                    <input type="hidden" name="precioCompra" value="<?= $resultado->precioCompra ?>">
                                    <input type="hidden" name="precioVenta" value="<?= $resultado->precioVenta ?>">
                                    <input type="hidden" name="precioVenta" value="<?= $resultado->categoria ?>">
                                    <input type="hidden" name="stock" value="<?= $resultado->stock ?>">
                                    <td><button id="boton" type="submit" value="<?= $resultado->codigo ?>" name="codigo">Vender</button></td>
                                    </tr>
                                </form>
                                <?php
                            }
                        }
                        ?>

                    </table>
                    <!-- </form>-->
                    <span>Carrito</span><br>
                    <?php
                    $total = 0;
                    $where = "0";
                    if (!isset($_SESSION["carrito"])) {
                        ?>
                        <span>Carrito Vacío</span><br>
                        <?php
                    } else {
                        foreach ($_SESSION["carrito"] as $key => $value) {
                            if ($value > 0) {
                                $where .= " OR codigo ='" . $key . "'";
                            }
                        }
                        try {
                            $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                            die("Error: " . $e->getMessage());
                        }
                        $sql = "SELECT precioVenta, precioCompra, descripcion, codigo, categoria, stock FROM productos WHERE " . $where;
                        $consulta = $conexion->query($sql);

                        while ($resultado = $consulta->fetchObject()) {
                            $total += $_SESSION['carrito'][$resultado->codigo] * $resultado->precioVenta;
                            ?>
                            <div id="articulos">
                                <form action="carrito.php" method="post">
                                    Codigo: <?= $resultado->codigo ?><br>
                                    Descripción: <?= $resultado->descripcion ?><br>
                                    Categoría: <?= $resultado->categoria ?><br>
                                    Precio:<?= $resultado->precioVenta ?> €<br>
                                    Unidad:<?= $_SESSION['carrito'][$resultado->codigo] ?><br>
                                    <input type="hidden" name="accion" value="borrar">
                                    <input type="hidden" name="descripcion" value="<?= $resultado->descripcion ?>">
                                    <input type="hidden" name="precioCompra" value="<?= $resultado->precioCompra ?>">
                                    <input type="hidden" name="precioVenta" value="<?= $resultado->precioVenta ?>">
                                    <input type="hidden" name="stock" value="<?= $resultado->stock ?>">
                                    <input type="hidden" name="categoria" value="<?= $resultado->categoria ?>">
                                    <input type="hidden" name="codigo" value="<?= $resultado->codigo ?>">
                                    <input id="boton" type="submit" value="Borrar">
                                </form>
                            </div>
                            <?php
                        }
                    }
                    echo "<br>";
                    echo "Precio sin IVA " . $total . " € <br>";
                    echo "IVA del 21% <br>";
                    echo "Precio Total " . ((($total * 21) / 100) + $total);
                }
                ?>
            </div>
        </div>
    </body>
</html>