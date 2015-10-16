<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        $figuras = ["Oro", "Bastos", "Espadas", "Copa"];
        $numero = ["As", "Dos", "Tres", "Cuatro", "Cinco", "Seis", "Siete",
            "Sota", "Caballo", "Rey"];
        $auxi = new SplFixedArray(5);
        $puntos = array("As"=>11, "Tres"=>10, "Rey"=>4, "Caballo"=>3,
            "Sota"=>2, "Dos"=>0, "Cuatro"=>0, "Cinco"=>0, "Seis"=>0, "Siete"=>0);
        $i = 0;
        $total = 0;
        $auxi = array ();
        while ($i<10){
            $valorFigura = $figuras[rand(0,3)];
            $valorNoRepe = $numero[rand(0,9)];
            $nombreCarta = $valorNoRepe . " de " . $valorFigura . " = ";
            if (!in_array($nombreCarta, $auxi)){
                $auxi []= $nombreCarta;
                $total+=$puntos[$valorNoRepe];
                echo $nombreCarta . $puntos[$valorNoRepe] ."<br>";
            }
            $i++;
        }
        echo "<br> Total de puntos " . $total;
        ?>
    </body>
</html>
