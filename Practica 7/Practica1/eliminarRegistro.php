<?php
session_start();
$_POST['opciones'];
if (isset($_SESSION['conectado'])){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
      }
      
      switch ($_POST['opciones']){
          case "si": 
              $consulta = ("DELETE FROM  cliente WHERE dni ='" . $_SESSION[dni] . "'");
          break;
      
          case "no":
              header('Location: clientes.php');
          break;
          default :
      }
             $conexion->exec($consulta);
             header('Location: clientes.php');
}
?>

