
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Introduce la altura de la pirámide<br>
        <form action="piramide.php" method="post" target="box">
            <input type="number" min="2" name="altura"/><br>
        Elige la imagen para hacer la pirámide<br>
        <select name="opciones">
            <optgroup label="Almohada">
            <option value="almohada">Almohada</option>
            <option value="camisetas">Camisetas</option>
            <option value="cubos">Cubos</option>
            <option value="gatoloco">Gato Loco</option>
        </select>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
