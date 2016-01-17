<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'Campero.php';
        
        if (!isset($_SESSION['campero'])){
            $_SESSION['campero'] = array();
        }
        
        $tamano = $_POST['opcion1'];
        $tipo = $_POST['opcion2'];


        $campero = serialize(new Campero($tamano, $tipo));
        
        $_SESSION['campero'][] = $campero;
        
        
        echo "pedidos: " . Campero::getTotalPedidos() . "<br>";
        foreach ($_SESSION['campero'] as $camperoAuxi1) {
            $camperoAuxi2 = unserialize($camperoAuxi1);
            $camperoAuxi2->sirve();
            echo "servidos: " . Campero::getTotalServidos() . "<br>";
            
        }
        
        foreach ($_SESSION['campero'] as $camperoAuxi1) {
            $camperoAuxi2 = unserialize($camperoAuxi1);
            echo $camperoAuxi2 . "<br>";
        }
        ?>
    </body>
</html>
