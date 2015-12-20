<?php

include "conexion.php";

$consulta = "
SELECT idalbum, nombre
FROM album
WHERE idartista=" . $_GET["idartista"] . "
ORDER BY nombre
";
//echo $consulta;


			
$resultado = mysql_query($consulta,$conexion);

	
if (mysql_num_rows($resultado)>0){

	
?>
<table border="1" id="tabla_albumes">
<tr>
<th>Nombre</th>
</tr>
<?php
//RECORRIDO DE CLIENTES
while ($fila=mysql_fetch_array($resultado)){?>
<tr id="album_<?php echo $fila["idalbum"]?>" name="<?php echo $fila["idalbum"]?>">
<td><?php echo $fila["nombre"]?></td>
</tr>
<?php
}//while
?>
</table>
<?php
}else{	
?>No tiene albumes
<?php }?>
