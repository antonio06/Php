
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="estilo">
            Intenta abrir la caja fuerte y coje todo el dinero.
            <form action="cajaFuerte.php" method="post">
                <input type="number" name="numero" min="1000" max="9999">
                <input type="hidden" name="oportunidades" value="4">
                <input type="submit" value="Introducir">
            </form>
            <img src="imagenes/cajaFuerte.jpg">
        </div>
        
    </body>
</html>
