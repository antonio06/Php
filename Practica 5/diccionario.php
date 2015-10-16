<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php

    $palabra = $_POST['palabra'];

    $diccionario = array("perro"=>"dog", "mamá"=>"mun", "papá"=>"dad", "caballo"=>"horse",
            "carta"=>"cart", "jefe"=>"boss", "cielo"=>"sky", "negro"=>"black",
            "televisión"=>"television", "ventana"=>"window",
            "teléfono"=>"phone", "luz"=>"light", "nube"=>"cloud", "sol"=>"sun",
            "flor"=>"flower", "sangre"=>"blood", "libro"=>"book", "cara"=>"face",
            "risa"=>"laugh", "llamada"=>"call");

    echo "La palabra " . $palabra . " en inglés es " . $diccionario[$palabra];
?>
    </body>
</html>