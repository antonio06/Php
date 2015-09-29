
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Introduce el día en que naciste(en número sin 0)<br>
        <form action="horoscopo.php" method="post" target="box">
            <input type="number" min="0" name="dia"/><br>
        Introduce el mes en que naciste(con letras)<br>
        <input type="text" name="mes"/><br>
            <input type="submit" value="Enviar">
        </form>
        <iframe name="box"/>
    </body>
</html>
