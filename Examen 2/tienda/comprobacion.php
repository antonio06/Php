<?php

session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
try {
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
$consulta = $conexion->query("SELECT usuario, contrasena FROM usuarioscontrasena");
$resultado = $consulta->fetchObject();
if ((($resultado->usuario) == $usuario) && (($resultado->contrasena) == $contrasena)) {
    $_SESSION['conectado'] = TRUE;
    $_SESSION['usuario'] = $usuario;
    header('Location: tienda.php');
} else {
    header('Location: /Ex09acr2.php');
}