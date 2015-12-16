<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <h1>Coche</h1>
            <span>Anda con el coche</span><br>
            <span>Pon los km que quieres andar</span>
            <input type="number" name="kilometrosCoche"><br>
            <input type="hidden" name="accion" value="andarCoche">
            <input type="submit" value="Andar">
        </form>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <span>Quema ruedas con el coche</span><br>
            <input type="hidden" name="accion" value="quemarRuedas">
            <input type="submit" value="Quemar Ruedas"><br>
        </form>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <span>Ver kilometraje del coche</span><br>
            <input type="hidden" name="accion" value="verKmCoche">
            <input type="submit" value="Ver Km">
        </form><br>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <h1>Bicicleta</h1>
            <span>Anda con la bicicleta</span><br>
            <span>Pon los km que quieres andar</span>
            <input type="number" name="kilometrosBicicleta"><br>
            <input type="hidden" name="accion" value="andarBicicleta" target="respuesta">
            <input type="submit" value="Andar">
        </form>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <span>Haz el caballito con la bicicleta</span><br>
            <input type="hidden" name="accion" value="caballito">
            <input type="submit" value="Hacer caballito"><br>
        </form>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <span>Ver kilometraje de la bicicleta</span><br>
            <input type="hidden" name="accion" value="verKmBicicleta">
            <input type="submit" value="Ver Km">
        </form><br>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <input type="hidden" name="accion" value="kmTotal">
            <input type="submit" value="Ver Km Totales">
        </form><br>

        <form action="Vehiculos/probandoClases.php" method="post" target="respuesta">
            <input type="hidden" name="accion" value="vehiculosTotales">
            <input type="submit" value="Ver Vehiculos Totales">
        </form><br>

        <iframe style="float: right; margin-top: -419px;  margin-right: 349px" name="respuesta">
    </body>
</html>
