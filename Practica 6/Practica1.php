<?php
session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['total'])){
            $_SESSION['total'] = 0;
            $_SESSION['contador'] = 0;
        }
       
        if (($_POST['numero']>0)|| ($_SESSION['contador']==0)){
        ?>
        <form action="#" method="post">
            Introduce un número:<br>
            <input type="num" name="numero" autofocus=""><br>
            <input type="submit" value="Introducir">
        </form>
        <?php
        $_SESSION['total'] +=$_POST['numero'];
        $_SESSION['contador']++;
        }else{
            $valorNegativo = $_POST['numero'];
            $_SESSION['contador'] --;//No cuenta el número negativo introducido
            echo "La suma de todos los números es " . $_SESSION['total'] . "<br>";
            echo "La media de los números es " . $_SESSION['total']/ ($_SESSION['contador']);
        }
        ?>
    </body>
</html>
