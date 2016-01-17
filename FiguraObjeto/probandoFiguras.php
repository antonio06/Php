
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './Rectangulo.php';
        include_once './Piramide.php';
        
        $rectangulo1 = new Rectangulo("*", 5, 4);
        $piramide1 = new Piramide("-", 5);
        echo "<pre>" . $rectangulo1 . "</pre>";
        echo  "<br>";
        echo "<pre>" . $piramide1 . "</pre>";
        ?>
    </body>
</html>
