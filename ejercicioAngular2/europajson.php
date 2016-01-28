<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include "conexion.php";
$consulta = "SELECT p.nombre as pais, c.nombre as ciudad, c.muestra
			 FROM pais p , ciudad c 
			 WHERE c.idpais = p.idpais 
			 ORDER BY c.idpais ";

$resultado = mysql_query($consulta);
$datosjson = "[";
while ($fila = mysql_fetch_array($resultado)) {
    if ($datosjson != "[") {
        $datosjson .= ",";
    }
    $datosjson .= '{"ciudad":"' . $fila["ciudad"] . '",';
    if ($fila["muestra"])
        $datosjson .= ' "muestra": true,';
    else
        $datosjson .= ' "muestra": false,';

    $datosjson .= ' "pais": "' . $fila["pais"] . '"}';
}//while

$datosjson .="]";

echo $datosjson;
?>