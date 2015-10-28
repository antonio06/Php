<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['contador'])){
            $_SESSION['totalImpares'] = 0;
            $_SESSION['contador'] = 0;
            $_SESSION['contadorImpares'] = 0;
            $_SESSION['mayorPares'] = 0;
        }
       
        if (($_POST['numero']>0)|| ($_SESSION['contador']==0)){
        ?>
        <form action="#" method="post">
            Introduce un número:<br>
            <input type="num" name="numero" autofocus=""><br>
            <input type="submit" value="Introducir">
        </form>
        <?php
        if ($_POST['numero']%2!=0){
            $_SESSION['totalImpares']+= $_POST['numero'];
            $_SESSION['contadorImpares']++;
        }else{
            if ($_SESSION['mayorPares']<$_POST['numero']){
                $_SESSION['mayorPares'] = $_POST['numero'];
            }
        }
        
        $_SESSION['contador']++;
        }else{
            $valorNegativo = $_POST['numero'];
            $_SESSION['contador'] --;//No cuenta el número negativo introducido
            echo "El total de números introducidos es " . $_SESSION['contador'] . "<br>";
            echo "La media de los impares es " . ($_SESSION['totalImpares']/$_SESSION['contadorImpares']) ."<br>";
            echo "El mayor de los números Pares introducido es " . $_SESSION['mayorPares'];
        }
        ?>
    </body>
</html>
