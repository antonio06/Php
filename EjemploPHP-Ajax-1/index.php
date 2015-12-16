<?php include "conexion.php"?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){
	$("#paises").change(function(){
		$.get("ciudades.php?idpais=" + $(this).val(),function(data,status){
			$("#ciudades").html(data);
		});//get
		
	});
	
});//ready
</script>
</head>

<body>
País:<select id="paises">
<?php
$consulta = "SELECT idpais,nombre
			 FROM pais
			 ORDER BY nombre";

$resultado = mysql_query($consulta);

while ($fila=mysql_fetch_array($resultado)){?>
<option value="<?php echo $fila['idpais']?>"><?php echo $fila["nombre"]?></option>
<?php
}//while
?>
</select><br>
Ciudades:<select id="ciudades"></select>
</body>
</html>