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
            <div id="cuerpo">
                <form action="modificarRegistro.php" method="post">
                    <?php 
                       $_GET['dni']; 
                       
                       if (isset($_SESSION['conectado'])){
                            try {
                                $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
                            } catch (PDOException $e) {
                                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                                die ("Error: " . $e->getMessage());
                              }
                                $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente WHERE dni =" . $_GET['dni']);
                                while($resultado = $consulta->fetchObject()){
                    ?>
                    <span>DNI</span>
                    <input id="formulario" type="text" name="dni"  value="<?= $resultado->dni?>"><br>
                    <span>Nombre</span>
                    <input id="formulario" type="text" name="nombre" value="<?= $resultado->nombre?>"><br>
                    <span>Dirección</span>
                    <input id="formulario" type="text" name="direccion" value="<?= $resultado->direccion?>"><br>
                    <span>Teléfono</span>
                    <input id="formulario" type="text" name="telefono" value="<?= $resultado->telefono?>"><br>
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