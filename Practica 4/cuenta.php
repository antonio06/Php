<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            $numero = $_POST['numero'];
            $cuentaPositivo = $_POST['cuentaPositivo'];
            $cuentaNegativo = $_POST['cuentaNegativo'];
            $contador = $_POST['contador'];
            
            if ($contador>0){
                $contador--;
                if ($numero>0){
                $cuentaPositivo++;
                }else if ($numero<0){
                $cuentaNegativo++;
                }
                ?>
                
                <div id="estilo">
                Introduce números tanto positivos como negativos .
                    <form action="cuenta.php" method="post">
                        <input type="number" name="numero">
                        <input type="hidden" name="cuentaPositivo" value="<?= $cuentaPositivo ?>">
                        <input type="hidden" name="cuentaNegativo" value="<?= $cuentaNegativo ?>">
                        <input type="hidden" name="contador" value="<?= $contador ?>">
                        <input type="submit" value="Introducir">
                    </form>
                <br>
                Te quedan por introducir <?= $contador ?>
                </div>
        <?php
            }else{
        ?>
        <div id="estilo">
            Has introducido <?= $cuentaPositivo ?> números positivos<br>
            Has introducido <?= $cuentaNegativo ?> números negativos<br>
        </div>
        
        <?php
            }
        ?>
    </body>
</html>
