<?php include "conexion.php"?>
<?php

$consulta = "
UPDATE artista
SET nombre='" . $_POST["nombre"] . "'  
WHERE idartista=" . $_POST["idartista"] ;
echo $consulta;
$resultado = mysql_query($consulta,$conexion);
?>
