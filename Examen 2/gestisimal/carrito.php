<?php

session_start();
 echo $codigo = $_POST['codigo'];
$accion = $_POST['accion'];
echo $_POST['descripcion'];
echo $_POST['precioCompra'];
echo $_POST['precioVenta'];
echo $_POST['stock'];

if (isset($_SESSION['conectado'])) {
    try {
        // Nos conectamos a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    if ($accion == "comprar") {
        $_SESSION['carrito'][$codigo] ++;
        $stockFinal = $_POST['stock']-1;
        
    }
    if ($accion == "borrar") {
        $_SESSION['carrito'][$codigo] --;
        $stockFinal = $_POST['stock']+1;
       
    }
    $consulta = ("UPDATE productos Set codigo='$_POST[codigo]',"
                . "descripcion='$_POST[descripcion]', precioCompra='$_POST[precioCompra]', precioVenta='$_POST[precioVenta]', stock='$stockFinal'  WHERE codigo =" . $codigo);
    $conexion->exec($consulta);
    header('Location: vender.php');
}

