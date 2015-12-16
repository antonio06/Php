<?php
include "conexion.php";

$consulta = "SELECT idciudad,nombre
			 FROM ciudad
			 WHERE idpais=" . $_GET["idpais"];

$resultado = mysql_query($consulta);

while($fila=mysql_fetch_array($resultado)){?>
<option value="<?php echo $fila["idciudad"]?>">
<?php echo $fila["nombre"]?></option>
<?php }//while?>