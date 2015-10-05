<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<?php
$numero = $_POST['numero'];
$oportunidades = $_POST['oportunidades'];
$numeroSecreto=1306;

    if (($oportunidades==0) || ($oportunidades==1)){
        echo "Alto ladron!!!! <br>";
        echo " <img src='imagenes/policia.jpg'";
    }else{
        if ($numero==$numeroSecreto){
            echo "Enhorabuena!!!! abriste la caja fuerte coje todo el dinero<br>";
            echo "<img src='imagenes/500.jpg'>";
        }else{
            $oportunidades--;
            ?>
<!--Incluimos código html para seguir introduciendo números para la caja-->
        <div id="estilo">
            Intenta abrir la caja fuerte y coje todo el dinero.
            <form action="cajaFuerte.php" method="post">
                <input type="number" name="numero" min="1000" max="9999" >
                <input type="hidden" name="oportunidades" value="<?= $oportunidades ?>">
                <input type="submit" value="Introducir">
            </form>
            <img src="imagenes/cajaFuerte.jpg"><br>
            <br>
                Lo sentimos el número <?= $numero ?> no es el correcto<br>
                Te quedan <?= $oportunidades ?> oportunidades<br>
            <!-- Final de la parte de html -->
        </div>
<!--Final del código html-->
        <?php
        }
    }
?>
</body>
</html>