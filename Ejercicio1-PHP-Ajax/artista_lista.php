<?php
include "conexion.php";
$consulta = "
SELECT idartista, nombre
FROM artista
ORDER BY nombre
";

			
$resultado = mysql_query($consulta,$conexion);

//echo $consulta;	
if (mysql_num_rows($resultado)>0){

	
?>
<table border="1" id="tabla_artista">
<tr>
<th>Nombre</th>
<th>Acciones</th>
</tr>
<?php
//RECORRIDO DE CLIENTES
while ($fila=mysql_fetch_array($resultado)){?>
<tr id="artista_<?php echo $fila["idartista"]?>" 
name="<?php echo $fila["idartista"]?>"
class="artistas">
<td class="nombre"><?php echo $fila["nombre"]?></td>
<td><img class="lupa" src="images/icon-lupa.png">
<img class="edit" src="images/edit.png"></td>
</tr>
<?php
}//while
?>
</table>
<?php
}//if
?>