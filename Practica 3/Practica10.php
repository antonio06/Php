
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Introduce el día en que naciste(en número sin 0)<br>
        <form action="horoscopo.php" method="post" target="box">
            <input type="number" min="1" name="dia"/><br>
        Mes en el que naciste<br>
        <select name="mes">
            <optgroup label="Enero">
            <option value="enero">Enero</option>
            <option value="febrero">Febrero</option>
            <option value="marzo">Marzo</option>
            <option value="abril">Abril</option>
            <option value="mayo">Mayo</option>
            <option value="junio">Junio</option>
            <option value="julio">Julio</option>
            <option value="agosto">Agosto</option>
            <option value="septiembre">Septiembre</option>
            <option value="octubre">Octubre</option>
            <option value="noviembre">Noviembre</option>
            <option value="diciembre">Diciembre</option>
        </select>
            <input type="submit" value="Enviar">
        </form>
        <iframe name="box"/>
    </body>
</html>
