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

$suma = $numero+$suma ;
if ($suma>10000){
    $contador++ ;         
    ?>
        <div id="estilo">
            La suma de todos tus números es <?= $suma ?><br>
            Has introducido <?= $contador ?> números<br>
            La media de los números es <?php echo ($suma/$contador); ?>
        </div>
<?php

}else{
    $contador++;
    ?>
        <div id="estilo">
            Introduce números positivos.
            <form action="mayorDiezMil.php" method="post">
                <input type="number" name="numero">
                <input type="hidden" name="contador" value="<?= $contador ?>">
                <input type="hidden" name="suma" value="<?= $suma ?>">
                <input type="submit" value="Introducir">
            </form>
        </div>
        <?php
}
?>
  </body>
</html>

