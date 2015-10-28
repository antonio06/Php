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
            if (!isset($_SESSION['total'])){
            $_SESSION['total'] = 0;
            $_SESSION['contador'] = 0;
        }
        $_SESSION['total']+= $_POST['numero'];
        if ($_SESSION['total']>10000){
            $_SESSION['contador']++;
            $masDiezMil = $_POST['numero'];
            $_SESSION['contador']--;
            echo "El total de números introducidos es " . $_SESSION['contador'] . "<br>";
            echo "El total de todos los números es " . $_SESSION['total'] . "<br>";
            echo "La media de los números introducidos" . ($_SESSION['total']/$_SESSION['contador']) ."<br>";
        
        }else{
            $_SESSION['contador']++;
        ?>
        
        <form action="#" method="post">
            Introduce un número:<br>
            <input type="num" name="numero" autofocus=""><br>
            <input type="submit" value="Introducir">
        </form>
        <?php
        }
        ?>
    </body>
</html>