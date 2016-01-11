<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['total'])) {
            $_SESSION['total'] = 0;
            $_SESSION['contador'] = 0;
            $_SESSION['max'] = 0;
            $_SESSION['min'] = 1000000;
            $_SESSION['contadorPrimos'] = 0;
            $_SESSION['TotalPrimos'] = 0;
        }
        // Declaración de variables
        $num = $_POST['numero'];
        $contador = 0;
        if (($num > 0) || ($_SESSION['contador'] == 0)) {
            ?>
            <form action="calcular.php" method="post">
                <span>Introduce numeros asta introducir uno negativo</span>
                <span>Número</span>
                <input type="num" autofocus="" name="numero"><br>
                <input type="submit" value="Intro">
            </form>
            <?php
            $_SESSION['total'] +=$num;
            $_SESSION['contador'] ++;

            // Calculo del máximo y minimo del número introducido
            if ($num > $_SESSION['max']) {
                $_SESSION['max'] = $num;
            } 
            
            if ($num < $_SESSION['min']) {
                $_SESSION['min'] = $num;
            }
            
            $_SESSION['contadorPrimos'] = 0;
            // Calculo para los números primos
            for ($i = 1; $i <= $num; $i++) {
                if ($num%$i==0) {
                    $_SESSION['contadorPrimos']++;
                }
            }

            if ($_SESSION['contadorPrimos'] <=2) {
               $_SESSION['TotalPrimos']++;
            }
            
            
        } else {
            $valorNegativo = $num;
            echo "La media de los números es " . $_SESSION['total'] / ($_SESSION['contador']) . "<br>";
            echo "El máximo número introducido es " . $_SESSION['max'] . "<br>";
            echo "El mínimo número introducido es " . $_SESSION['min'] . "<br>";
            echo "El total de números primos encontrados es " . $_SESSION['TotalPrimos'];
        }
        ?>
    </body>
</html>
