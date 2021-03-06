<?php

session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
try {
    // Conectamos con la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
// Seleccionamos los datos 
$consulta = $conexion->query("SELECT usuario, contrasena FROM usuarioscontrasena");
$resultado = $consulta->fetchObject();
// Y comprobamos que los datos introducidos por el formulario son iguales a los que hay en la base de datos
if ((($resultado->usuario) == $usuario) && (($resultado->contrasena) == $contrasena)) {
    // Si existe conectado se vuelve true y creamos una varible de sesión de usuario para poder tenerla siempre que queramos
    $_SESSION['conectado'] = TRUE;
    $_SESSION['usuario'] = $usuario;
    header('Location: clientes.php');
} else {
    header('Location: /Practica1.php');
}