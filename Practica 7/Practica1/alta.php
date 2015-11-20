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
       $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni =" . $_POST['dni']);
       if ($consulta->rowCount() > 0){
?>
    El dni <?=$_POST['dni'] ?> ya existe en la base de datos<a href="clientes.php">Intentar de nuevo</a>
        <?php
        }else{
             $alta = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES"
                     . "('$_POST[dni]', '$_POST[nombre]', '$_POST[direccion]', '$_POST[telefono]')";
             //echo $alta;
             $conexion->exec($alta);
             header('Location: clientes.php');
        }
}
        ?>