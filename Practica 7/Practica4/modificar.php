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
                    // Nos conectamos a la base de datos
                    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                } catch (PDOException $e) {
                    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                    die("Error: " . $e->getMessage());
                }
                // Seleccioamos los datos del dni que queremos modificar
                $consulta = $conexion->query("SELECT usuario FROM usuarioscontrasena where usuario='" . $_SESSION['usuario'] . "'");
                $resultado = $consulta->fetchObject();
                ?>
                <div id="icono">
                    <?= $resultado->usuario ?> <a href="borrado.php"><i class="fa fa-user"></i></a> 
                </div>
                <div id="cuerpo">
                    <form action="modificarRegistro.php" method="post">
                        <?php
                        $_GET['codigo'];
                        try {
                            // Nos conectamos a la base de datos
                            $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                            die("Error: " . $e->getMessage());
                        }
                        // Selecionamos los datos del dni 
                        $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, categoria, stock FROM productos WHERE codigo =" . $_GET['codigo']);
                        // En cada iteración del bucle mostramos los datos del dni 
                        while ($resultado = $consulta->fetchObject()) {
                            ?>
                            <span>Codigo</span>
                            <input id="formulario" type="text" name="codigo"  readonly="codigo" value="<?= $resultado->codigo ?>"><br>
                            <span>Descripción</span>
                            <input id="formulario" type="text" name="descripcion" value="<?= $resultado->descripcion ?>"><br>
                            <span>Precio Compra</span>
                            <input id="formulario" type="text" name="precioCompra" value="<?= $resultado->precioCompra ?>"><br>
                            <span>Precio Venta</span>
                            <input id="formulario" type="text" name="precioVenta" value="<?= $resultado->precioVenta ?>"><br>
                            <span>Categoría</span>
                            <input id="formulario" type="text" name="categoria" value="<?= $resultado->categoria ?>"><br>
                            <span>Stock</span>
                            <input id="formulario" type="text" name="stock" value="<?= $resultado->stock ?>"><br>
                            <input id="boton" type="submit" value="Insertar">
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>