<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $palabra = $_POST['palabra'];
        $texto = $_POST['texto'];
        $texto2 = $_POST['texto2'];
        $contador = $_POST['contador'];
        
        $diccionario = array("perro"=>"dog", "mamá"=>"mun", "papá"=>"dad", "caballo"=>"horse",
            "carta"=>"cart", "jefe"=>"boss", "cielo"=>"sky", "negro"=>"black",
            "televisión"=>"television", "ventana"=>"window",
            "teléfono"=>"phone", "luz"=>"light", "nube"=>"cloud", "sol"=>"sun",
            "flor"=>"flower", "sangre"=>"blood", "libro"=>"book", "cara"=>"face",
            "risa"=>"laugh", "llamada"=>"call");
        
        $diccionarioAuxi = ["perro", "mamá", "papá", "caballo", "carta", "jefe",
            "cielo", "negro", "televisión", "ventana", "teléfono", "luz", "nube",
            "sol", "flor", "sangre", "libro", "cara", "risa", "llamada"];
        
        
        if ($contador<5){
        ?>
        Introduce la traducción en ingles de la palabra <?= $auxi = $diccionarioAuxi [rand(0, 19)]?>
        <form action="diccionario2.php" method="post">
            <input type="text" name="palabra">
            <input type="hidden" name="contador" value="<?= ++$contador ?>">
            <input type="hidden" name="texto" value="<?= $texto . " " . $palabra?>">
            <input type="hidden" name="texto2" value="<?= $texto2 . " " . $auxi?>">
            <input type="submit" value="Introducir">
        </form>
        <?php
        }else{
        $texto = $texto . " " . $palabra;
        $texto2 = $texto2 . " " . $auxi;
        $texto = substr($texto, 2);
        $texto2 = substr($texto2, 1);
        $arrayIngles = explode(" ", $texto);
        $arrayEspanol = explode(" ", $texto2);
        $bien = 0;
        $mal = 0;
        
        for ($a = 0; $a<count($arrayEspanol); $a++){
            echo $arrayEspanol[$a] . " " . $arrayIngles[$a] . "<br>" ;
        }
        
        echo "<br>";
        for($a = 0; $a<count($arrayIngles); $a++){
            if ($arrayIngles[$a]==$diccionario[$arrayEspanol[$a]]){
                $bien++;
        }else{
            $mal++;
        }
            }
            
            echo "Plabras correctas " . $bien . "<br>";
            echo "Plabras erroneas " . $mal . "<br>";
        }
        ?>
    </body>
</html>
