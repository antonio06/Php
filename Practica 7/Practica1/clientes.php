<?php session_start()?>
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
                        if (isset($_SESSION['conectado'])){
                        try {
                            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                          die ("Error: " . $e->getMessage());
                          }
                            $consulta = $conexion->query("SELECT nombre FROM empleado where dni='" . $_SESSION['usuario'] . "'");
                            $resultado = $consulta->fetchObject();
            ?>
                <div id="icono">
                   <?= $resultado->nombre?> <a href="off.php"><i class="fa fa-user"></i></a> 
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
                            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                          die ("Error: " . $e->getMessage());
                          }
                            $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente ORDER BY nombre");
                            while($resultado = $consulta->fetchObject()){
                    ?>
                    <tr>
                        <td><?= $resultado->dni?></td>
                        <td><?= $resultado->nombre?></td>
                        <td><?= $resultado->direccion?></td>
                        <td><?= $resultado->telefono?></td>
                        <td><a href="modificar.php?dni=<?= $resultado->dni?>"><i class="fa fa-pencil"></i></a><a href="eliminar.php?dni=<?= $resultado->dni?>""><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php 
                            }
                            try {
                            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
                        } catch (PDOException $e) {
                          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                          die ("Error: " . $e->getMessage());
                          }
                            $contar = ("SELECT COUNT(*) FROM cliente");
                            $conexion->exec($contar);
                            $total = $contar->Count($contar);
                            echo $total;
                        }
                    ?>
                </table>
                </form>
            </div>
        </div>
    </body>
</html>
