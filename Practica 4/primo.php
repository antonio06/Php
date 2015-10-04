<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<?php
$numero = $_POST['numero'];
$contador =0;
for ($i=1; $i<=$numero; $i++){
    if ($numero%$i==0){
        $contador++;
    }
}
?>

<div id="estilo">
    <?php
    if ($contador>2){
        echo "El número " . $numero . " no es primo";
    }else{
        echo "El número " . $numero . " es primo";
    }
    ?>
</div>
</body>
</html>
