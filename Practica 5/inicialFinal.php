<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $numero = $_POST['numero'];
    $contador = $_POST['contador'];
    $texto = $_POST['texto'];
    
    if ($contador<10){
        ?>
        Introduce 10 números
        <form action="inicialFinal.php" method="post">
            <input type="number" name="numero" autofocus="">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="texto" value="<?= $texto . " " . $numero?>">
            <input type="submit" value="Introducir">
        </form>
<?php
    
    }else{
        
    $texto = $texto . " " . $numero;
    $texto = substr($texto, 2);
    $arrayNumero = explode(" ", $texto);
    
       
?>   
     Introduce un número Inicial
        <form action="inicialFinal2.php" method="post">
            <input type="number" max="9" min="0" name="inicial"><br>
            Introduce un número Final<br>
            <input type="number" max="9" min="0" name="final">
            <input type="submit" value="Introducir">
            <input type="hidden" name="numero">
<?php
    for ($a = 0; $a<count($arrayNumero); $a++){
?>
            <input type="hidden"  name="texto" value="<?= $texto = implode(" ", $arrayNumero)?>">
        <?php
    }
        ?>
        </form>       
<?php   
    }
?>
</body>
</html>

