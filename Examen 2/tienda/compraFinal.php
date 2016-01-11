<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda Online</title>
        <link type="text/css" rel="stylesheet" href="styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Tienda Online</p>
            </div>
            <div id="cuerpo">
                <?php 
                    if ($_SESSION['total'] >100){
                        echo "<span>Por pasar de los 100 € no tienes que pagar gastos de envío</span>";
                    }else{
                        $pais = $_POST['opciones'];
                        try {
                        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
                    } catch (PDOException $e) {
                        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                        die("Error: " . $e->getMessage());
                    }
                    $consulta = $conexion->query("SELECT pais, coste FROM gatos_envio WHERE pais '" . $pais ."'");
                    $resultado = $consulta->fetchObject();
                    
                    echo "<span> Los gastos correspondientes a " . $pais . " son " . $resultado->coste .
                            " El total de la factura es ". ($_SESSION['total']+$resultado->coste) . "</span>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>