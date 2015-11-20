<?php
session_start();
$_POST['dni'];
$_POST['nombre'];
$_POST['direccion'];
$_POST['telefono'];

if (isset($_SESSION['conectado'])){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
       $consulta = ("UPDATE cliente Set nombre='$_POST[nombre]',"
               . "direccion='$_POST[direccion]', telefono='$_POST[telefono]'  WHERE dni ='" . $_POST['dni'] . "'");
             $conexion->exec($consulta);
             header('Location: clientes.php');
}
?>