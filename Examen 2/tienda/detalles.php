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
                </div>
                <div id="cuerpo">
                    <span id="titulo">Detalles</span>
                    <br>
                    <br>
                    <?php
                    $codigo = $_POST['codigo'];

                    try {
                        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    $consulta = $conexion->query("SELECT nombre, descripcion, precio, imagenes, codigo FROM productos WHERE codigo='" . $codigo . "'");
                    $resultado = $consulta->fetchObject();
                    ?>     
                    <div id="articulos">
                        <img src="<?= $resultado->imagenes ?>"><br>
                        <?= $resultado->nombre ?><br>
                        Precio: <?= $resultado->precio ?> €<br>
                        Detalles: <?= $resultado->descripcion ?><br>
                        <form action="carrito.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $resultado->codigo ?>"> 
                            <input type="hidden" name="accion" value="comprar">
                            <input id="boton" type="submit" value="Comprar">
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html