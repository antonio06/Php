<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
        <title></title>
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Tienda Online</p>
                <?php
                if (isset($_SESSION['conectado'])) {
                    try {
                        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    $consulta = $conexion->query("SELECT usuario FROM usuarioscontrasena where usuario='" . $_SESSION['usuario'] . "'");
                    $resultado = $consulta->fetchObject();
                    ?>
                    <div id="icono">
                        <?= $resultado->usuario ?> <a href="borrado.php"><i class="fa fa-user"></i></a> 
                    </div>

                    <form action="borrarCarrito.php" method="post">
                        <span class="borrarCarrito">Borrar Carrito</span>
                        <input id="boton" type="submit" value="Borrar Carrito">
                    </form>

                </div>
                <div id="cuerpo">
                    <span id="titulo">Productos de la tienda</span>
                    <br>
                    <br>
                    <?php
                    try {
                        // Conectamos con la base de datos
                        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    // Ejecutamos la query para obtener el nombre con el usuario introducido
                    $consulta = $conexion->query("SELECT DISTINCT categoria FROM productos");
                    // Obtenemos la siquiente fila y devuelve un objeto
                    ?>
                    <form action="tienda.php" method="post" style="margin-left: 179px;">
                        <select name="opciones1">
                            <option value="nombre">Nombre</option>
                            <option value="precio">Menor a Mayor</option>
                            <option value="precio desc">Mayor a Menor</option>
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
                    <?php
                    try {
                        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    if (isset($_POST['opciones1']) && ($_POST['opciones2'])) {
                        $consulta = $conexion->query("SELECT imagenes, nombre, precio, codigo FROM productos WHERE categoria='" . $_POST['opciones2'] . "' ORDER BY " . $_POST['opciones1'] . "");
                    } else {
                        // Extraemos cada elemento con el bulce y los vamos mostrando uno a uno en la tabla
                        $consulta = $conexion->query("SELECT imagenes, nombre, precio, codigo FROM productos ORDER BY nombre");
                    }
                    //$consulta = $conexion->query("SELECT nombre, descripcion, precio, imagenes, codigo FROM productos");
                    while ($resultado = $consulta->fetchObject()) {
                        ?>

                        <div id="articulos">
                            <form action="carrito.php" method="post">
                                <img src="<?= $resultado->imagenes ?>"><br>
                                <?= $resultado->nombre ?><br>
                                Precio: <?= $resultado->precio ?> €<br>
                                <input type="hidden" name="accion" value="comprar">
                                <input type="hidden" name="codigo" value="<?= $resultado->codigo ?>"> 
                                <input id="boton" type="submit" value="Comprar">
                            </form>
                            <br>
                            <form action="detalles.php" method="post">
                                <input type="hidden" name="codigo" value="<?= $resultado->codigo ?>"> 
                                <input id="boton" type="submit" value="Detalles">
                            </form>
                        </div>

                        <?php
                    }
                    ?>
                    <br>
                    <br>
                    <span id="titulo">Carrito</span>
                    <br>
                    <br>
                    <?php
                    $total = 0;
                    $where = "0";
                    if (!isset($_SESSION["carrito"])) {
                        ?>
                        <span>Carrito Vacío</span>
                        <?php
                    } else {
                        foreach ($_SESSION["carrito"] as $key => $value) {
                            if ($value > 0) {
                                $where .= " OR codigo ='" . $key . "'";
                            }
                        }
                        try {
                            $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                            die("Error: " . $e->getMessage());
                        }
                        $sql = "SELECT precio, imagenes, codigo FROM productos WHERE " . $where;
                        $consulta = $conexion->query($sql);
                        while ($resultado = $consulta->fetchObject()) {
                            if (isset($_SESSION['total'])) {
                                $_SESSION['total'] += $_SESSION['carrito'][$resultado->codigo] * $resultado->precio;
                                ?>

                                <div id="articulos">
                                    <form action="carrito.php" method="post">
                                        <img src="<?= $resultado->imagenes ?>"><br>
                                        Precio:<?= $resultado->precio ?> €<br>
                                        Unidad:<?= $_SESSION['carrito'][$resultado->codigo] ?><br>
                                        <input type="hidden" name="accion" value="borrar">
                                        <input type="hidden" name="codigo" value="<?= $resultado->codigo ?>">
                                        <input id="boton" type="submit" value="Borrar">
                                    </form>
                                </div>
                                <?php
                            } else {
                                $_SESSION['total'] = 0;
                            }
                            echo "<br>";
                            echo "Total " . $_SESSION['total'] . " €";
                            ?>
                            <form action="compraFinal.php" method="post">
                                <select name="opciones">
                                    <option value="espana">España</option>
                                    <option value="europa">Europa</option>
                                </select>
                                <input id="boton" type="submit" value="Detalles Compra">
                            </form>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>