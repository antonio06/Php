<?php
session_start();
$_POST['codigo'];
$_POST['descripcion'];
$_POST['precioCompra'];
$_POST['precioVenta'];
$_POST['stock'];

// Comprueba si conectado está creada
if (isset($_SESSION['conectado'])) {
    try {
        // Conectamos con la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    // Seleccionamos los datos que sean igual al dni enviado por formulario
    $consulta = $conexion->query("SELECT codigo FROM productos WHERE codigo =" . $_POST['codigo']);
    // Si la consulta devuelve algún resultado mayor a 0 es que existe el dni 
    if ($consulta->rowCount() > 0) {
        ?>
El codigo <?= $_POST['codigo'] ?> ya existe en la base de datos<a href="tienda.php">Intentar de nuevo</a>
        <?php
    } else {
        // En caso contrario lo inserta en la base de datos y reenvia a cliente
        $alta = "INSERT INTO productos (codigo, descripcion, precioCompra, precioVenta, stock) VALUES"
                . "('$_POST[codigo]', '$_POST[descripcion]', '$_POST[precioCompra]', '$_POST[precioVenta]', '$_POST[stock]')";
        $conexion->exec($alta);
        header('Location: tienda.php');
    }
}
?>