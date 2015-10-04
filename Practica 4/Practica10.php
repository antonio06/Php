
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="estilo">
            Introduce números positivos el programa parará al poner uno negativo.
            <form action="media.php" method="post">
                <input type="number" name="numero">
                <input type="hidden" name="contador" value="0">
                <input type="hidden" name="suma" value="0">
                <input type="submit" value="Introducir">
            </form>
        </div>
    </body>
</html>
