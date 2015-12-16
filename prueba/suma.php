<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $numero = $_POST['numero'];

        if ((!isset($_SESSION['suma'])) && (!isset($_SESSION['contador']))) {
            $_SESSION['suma'] = 0;
            $_SESSION['contador'] = 1;
        }

        if ($_SESSION['contador'] < 5) {
            ?>
            <form action="suma.php" method="post">
                <span>Número</span>
                <input type="num" name="numero"><br>
                <input type="submit" value="Intro">
            </form>
            <?php
            $_SESSION['contador'] ++;
            $_SESSION['suma'] += $numero;
        } else {
            echo "La suma de los números es " . $_SESSION['suma'] . "<br>";
            echo "La meda de los números es " . ($_SESSION['suma'] / $_SESSION['contador']);
        }
        ?>
</body>
</html>