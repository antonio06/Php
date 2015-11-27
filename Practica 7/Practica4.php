<html>
    <head>
        <meta charset="UTF-8">
        <title>GESTISMAL</title>
        <link type="text/css" rel="stylesheet" href="Practica4/styles.css">
        <link rel="stylesheet" rel="stylesheet" href="css/font-awesome.css">
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>GESTISIMAL</p>
            </div>
            <div id="cuerpo">
                <form action="Practica4/comprobacion.php" method="post">
                    <span>Usuario</span>
                    <input id="formulario" type="text" name="usuario"><br>
                    <span>Contraseña</span>
                    <input id="formulario" type="password" name="contrasena"><br>
                    <input id="boton" type="submit" value="Iniciar"><br>
                </form>
                
                <form action="Practica4/registrar.php" method="post">
                    <span>Si no estas registrado</span><br>
                    <span>Usuario</span>
                    <input id="formulario" type="text" name="usuario"><br>
                    <span>Contraseña</span>
                    <input id="formulario" type="password" name="contrasena"><br>
                    <input id="boton" type="submit" value="Registrar">
                </form>
            </div>
        </div>
    </body>
</html>