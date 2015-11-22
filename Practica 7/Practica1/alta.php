<?php
session_start();
$_POST['dni'];
$_POST['nombre'];
$_POST['direccion'];
$_POST['telefono'];

// Comprueba si conectado está creada
if (isset($_SESSION['conectado'])) {
    try {
        // Conectamos con la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    // Seleccionamos los datos que sean igual al dni enviado por formulario
    $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni =" . $_POST['dni']);
    // Si la consulta devuelve algún resultado mayor a 0 es que existe el dni 
    if ($consulta->rowCount() > 0) {
        ?>
        El dni <?= $_POST['dni'] ?> ya existe en la base de datos<a href="clientes.php">Intentar de nuevo</a>
        <?php
    } else {
        // En caso contrario lo inserta en la base de datos y reenvia a cliente
        $alta = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES"
                . "('$_POST[dni]', '$_POST[nombre]', '$_POST[direccion]', '$_POST[telefono]')";
        $conexion->exec($alta);
        header('Location: clientes.php');
    }
}
?>