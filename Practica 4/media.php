<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<?php
$numero = $_POST['numero'];
$suma = $_POST['suma'];
$contador = $_POST['contador'];

if ($numero>0){
    $suma = $numero+$suma ;
    $contador++ ;
                 
    ?>
        <div id="estilo">
            Introduce números positivos el programa parará al poner uno negativo.
            <form action="media.php" method="post">
                <input type="number" name="numero">
                <input type="hidden" name="contador" value="<?= $contador ?>">
                <input type="hidden" name="suma" value="<?= $suma ?>">
                <input type="submit" value="Introducir">
            </form>
        </div>
<?php

}else{
    ?>
        <div id="estilo">
            La media de los números es <?php echo ($suma/$contador); ?>
        </div>
        <?php
}
?>
  </body>
</html>
