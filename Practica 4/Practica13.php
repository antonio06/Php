
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="estilo">
            Introduce números tanto positivos como negativos .
            <form action="cuenta.php" method="post">
                <input type="number" name="numero">
                <input type="hidden" name="cuentaPositivo" value="0">
                <input type="hidden" name="cuentaNegativo" value="0">
                <input type="hidden" name="contador" value="10">
                <input type="submit" value="Introducir">
            </form>
        </div>
    </body>
</html>
