<?php
$_POST['usuario'];
$_POST['contrasena'];
$_POST['contrasenaRep'];
try {
    // Conectamos con la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}
// Seleccionamos los datos que sean igual al dni enviado por formulario
$consulta = $conexion->query("SELECT usuario FROM usuarioscontrasena WHERE usuario ='" . $_POST['usuario'] . "'");
// Si la consulta devuelve algún resultado mayor a 0 es que existe el usuario
if ($_POST['usuario'] == "") {
    ?>
    Necesitas rellenar el campo Usuario <a href="/Practica4.php">Intentar de nuevo</a>
    <?php
} else {
    if ($_POST['contrasena'] == $_POST['contrasenaRep']) {

        if ($consulta->rowCount() > 0) {
            ?>
            El usuario <?= $_POST['usuario'] ?> ya existe en la base de datos<a href="/Practica4.php">Intentar de nuevo</a>
            <?php
        } else {
            // En caso contrario lo inserta en la base de datos y reenvia a cliente
            $alta = "INSERT INTO usuarioscontrasena (usuario, contrasena) VALUES"
                    . "('$_POST[usuario]', '$_POST[contrasena]')";
            $conexion->exec($alta);
            header('Location: /Practica4.php');
        }
    } else {
        ?>
        La contrasena introducida no es la misma <a href="/Practica4.php">Intentar de nuevo</a>
        <?php
    }
}
?>

