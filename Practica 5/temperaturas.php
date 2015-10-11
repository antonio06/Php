<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
    $temperaturas = $_POST['temperaturas'];
    $contador = $_POST['contador'];
    $texto = $_POST['texto'];
    
    if ($contador<12){
        ?>
        Introduce las temperaturas de este año (de enero a diciembre)
        <form action="temperaturas.php" method="post">
            <input type="number" name="temperaturas">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="texto" value="<?= $texto . " " . $temperaturas?>">
            <input type="submit" value="Introducir">
        </form>
<?php
    
    }else{
        $texto = $texto . " " . $temperaturas;
        $texto = substr($texto, 2);
        $arrayTemperaturas = explode(" ", $texto);
        
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Júnio", "Júlio",
            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        
        echo "<h1>" . "Estas son las Temperaturas del 2015 en Málaga" . "</h1>";
        for ($a = 0; $a<count($arrayTemperaturas); $a++){
            echo $meses[$a] . " " . $arrayTemperaturas[$a] . "<br>";
            for ($b = 0; $b<$arrayTemperaturas[$a]; $b++){
                echo "<img src='imagenes/morado.jpg'>";
            } 
            echo "<br>";
        }
    }
?>
</body>
</html>