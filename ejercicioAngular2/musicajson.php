<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include "conexion.php";
$consulta = "SELECT idartista, nombre
			 FROM artista 
			 ORDER BY nombre ";		 

$resultado = mysql_query($consulta);
$datosjson="[";
while($fila=mysql_fetch_array($resultado)){ 
	 if ($datosjson != "[") {$datosjson .= ",";}
	$datosjson .= '{"nombre":"' . $fila["nombre"] . '",';
	
	$consulta2 = "SELECT idalbum, nombre
			 FROM album
			 WHERE idartista=" . $fila["idartista"] . " 
			 ORDER BY nombre ";	
//echo $consulta2;			 
	$datosjson .= '"discografia":';
	
	$resultado2 = mysql_query($consulta2);
	$datosjson2="[";
	while($fila2=mysql_fetch_array($resultado2)){ 
		if ($datosjson2 != "[") {$datosjson2 .= ",";}
		$datosjson2 .= '{"nombre":"' . $fila2["nombre"].'",';

					$consulta3 = "SELECT nombre,reproducciones
						 FROM cancion
						 WHERE idalbum=" . $fila2["idalbum"] . " 
						 ORDER BY nombre ";	
			//echo $consulta3;			 
				$datosjson2 .= '"canciones":';
				
				$resultado3 = mysql_query($consulta3);
				$datosjson3="[";
				while($fila3=mysql_fetch_array($resultado3)){
					if ($datosjson3 != "[") {$datosjson3 .= ",";}					
					$datosjson3 .= '{"nombre":"' . $fila3["nombre"].'"';

				
					$datosjson3 .='}';
				}//while
				$datosjson3 .="]";
				$datosjson2 .= $datosjson3;
		
		$datosjson2 .='}';	
	}//while
	$datosjson2 .="]";
	$datosjson .= $datosjson2;
	$datosjson .= '}';
}//while

$datosjson .="]";

echo $datosjson;
?>