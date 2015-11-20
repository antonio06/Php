<?php
if(!isset($_COOKIE['colores'])){
    setcookie("color", "white");
    $colores = "white";
}else{
    $colores = $_COOKIE['colores'];
}

if (isset($_POST['opciones'])){
    $colores = $_POST['opciones'];
    setcookie("color", "opciones");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background: <?= $colores?>;">
            <form action="#" method="post">
            Elige El color para la página web<br>
            <select name="opciones">
                <optgroup label="red">
                <option value="red">Rojo</option>
                <option value="green">Verde</option>
                <option value="purple">Morado</option>
                <option value="yellow">Amarillo</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
