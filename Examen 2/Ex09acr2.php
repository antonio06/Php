<html>
    <head>
        <meta charset="UTF-8">
        <title>Tienda Online</title>
        <link type="text/css" rel="stylesheet" href="tienda/styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Tienda Online</p>
            </div>
            <div id="cuerpo">
                <form action="tienda/comprobacion.php" method="post">
                    <span>Usuario</span>
                    <input id="formulario" type="text" name="usuario"><br>
                    <span>Contraseña</span>
                    <input id="formulario" type="password" name="contrasena"><br>
                    <input id="boton" type="submit" value="Iniciar">
                </form>
            </div>
        </div>
    </body>
</html>