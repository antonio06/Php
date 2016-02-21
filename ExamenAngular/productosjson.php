<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include "conexion.php";
$consulta = "SELECT idcategoria, nombre
			 FROM categoria 
			 ORDER BY nombre ";		 

$resultado = mysql_query($consulta);
$datosjson="[";
while($fila=mysql_fetch_array($resultado)){ 
	 if ($datosjson != "[") {$datosjson .= ",";}
	$datosjson .= '{"nombre":"' . $fila["nombre"] . '",';
	
	$consulta2 = "SELECT idproducto, nombre
			 FROM producto
			 WHERE idcategoria=" . $fila["idcategoria"] . " 
			 ORDER BY nombre ";	
//echo $consulta2;			 
	$datosjson .= '"productos":';
	
	$resultado2 = mysql_query($consulta2);
	$datosjson2="[";
	while($fila2=mysql_fetch_array($resultado2)){ 
		if ($datosjson2 != "[") {$datosjson2 .= ",";}
		$datosjson2 .= '{"nombre":"' . $fila2["nombre"].'",';
		$datosjson2 .='}';	
	}//while
        $datosjson2 .='}';
	$datosjson2 .="]";
	$datosjson .= $datosjson2;
	$datosjson .= '}';
}//while

$datosjson .="]";

echo $datosjson;
?>