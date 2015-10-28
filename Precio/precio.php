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
        <form action="precio.php" method="post">
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
     <form action="precio2.php" method="post">
            <input type="number"name="descuento"><br>
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

