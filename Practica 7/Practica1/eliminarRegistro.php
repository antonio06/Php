<?php

session_start();
$_POST['opciones'];
if (isset($_SESSION['conectado'])) {
    try {
        // Nos conectamos a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
// Con u switch miramos que opción a sido enviada por el formulario
    switch ($_POST['opciones']) {
        // Si es si hacemos un delete del dni que enviamos 
        case "si":
            $consulta = ("DELETE FROM  cliente WHERE dni ='" . $_SESSION[dni] . "'");
            break;
        // En caso contrario nos devuelve a la página de clientes
        case "no":
            header('Location: clientes.php');
            break;
        default :
    }
    // Ejecutamos la consulta
    $conexion->exec($consulta);
    header('Location: clientes.php');
}
?>

