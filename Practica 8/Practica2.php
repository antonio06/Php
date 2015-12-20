<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="Animal/probandoAnimales.php" method="post" target="respuesta">
            <span>Hacer Comer al perro</span><br>
            <span>Pon su comida</span>
            <input type="text" name="comidaPerro"><br>
            <input type="hidden" name="accion" value="comerPerro">
            <input type="submit" value="Comer">
        </form>

        <form action="Animal/probandoAnimales.php" method="post" target="respuesta">
            <span>Hacer que hablen los animales</span><br>
            <input type="hidden" name="accion" value="hablar">
            <input type="submit" value="Hacer que hablar"><br>
        </form>

        <form action="Animal/probandoAnimales.php" method="post" target="respuesta">
            <span>Dos perros que se apareen</span><br>
            <input type="hidden" name="accion" value="aparearse">
            <input type="submit" value="Aparearse">
        </form><br>

        <form action="Animal/probandoAnimales.php" method="post" target="respuesta">
            <span>Hacer que dos animales distintos se apareen(perros lagartos)</span><br>
            <input type="hidden" name="accion" value="aparearseDistinto">
            <input type="submit" value="Hacer que liguen"><br>
        </form>

        <iframe style="float: right; margin-top: -265px;  margin-right: 349px" name="respuesta">
    </body>


</html>

