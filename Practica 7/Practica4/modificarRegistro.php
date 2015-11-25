<?php

session_start();
// En cada variable contiene los datos a modificar en el update 
$_POST['codigo'];
$_POST['descripcion'];
$_POST['precioCompra'];
$_POST['precioVenta'];
$_POST['stock'];

if (isset($_SESSION['conectado'])) {
    try {
        // Nos conectamos a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    // Modificamos el cliente con el nombre del cliente ue enviamos por el formulario
    $consulta = ("UPDATE productos Set codigo='$_POST[codigo]',"
            . "descripcion='$_POST[descripcion]', precioCompra='$_POST[precioCompra]', precioVenta='$_POST[precioVenta]', stock='$_POST[stock]'  WHERE codigo =" . $_POST[codigo]);
    $conexion->exec($consulta);
    header('Location: tienda.php');

}
?>