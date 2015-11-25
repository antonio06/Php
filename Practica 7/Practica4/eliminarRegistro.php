<?php
session_start();
$_POST['opciones'];
if (isset($_SESSION['conectado'])) {
    try {
        // Nos conectamos a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
// Con un switch miramos que opción a sido enviada por el formulario
    switch ($_POST['opciones']) {
        // Si es si hacemos un delete del dni que enviamos 
        case "si":
            $consulta = ("DELETE FROM  productos WHERE codigo ='" . $_SESSION[codigo] . "'");
            break;
        // En caso contrario nos devuelve a la página de clientes
        case "no":
            header('Location: tienda.php');
            break;
        default :
    }
    // Ejecutamos la consulta
    $conexion->exec($consulta);
    header('Location: tienda.php');
}
?>

