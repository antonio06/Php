<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="styles.css">
        <title></title>
    </head>
    <body>
        <div id="principal">
            <div id="cabecera">
                <p>Tienda Online</p>
            </div>
            <div id="cuerpo">
                <form action="borradoSesion.php" method="post">
                    <span>¿ Quieres eliminar tu sesión ?</span>
                        <select name="opciones">
                        <optgroup label="si">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    <input id="boton" type="submit" value="Pulsar">
                </form>
            </div>
        </div>
    </body>
</html>