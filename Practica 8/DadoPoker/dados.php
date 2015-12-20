<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1: Dados Póker</title>
        <style>
            form, div{
                float: left;
                display: inline-block;
                padding: 15px;
            }
            form label{
                margin-right: 10px;
            }
            div{
                margin-left: 100px;
            }
            
            ul{
                list-style: none;
            }
        </style>
    </head>
    <body>
        <form action="Practica1.php" method="post">
            <label>¡Tira los dados!</label>
            <input type="submit" name="tirar" value="Lanzar Dados">
        </form>
        <div class="resultado">
            {{resultado}}
        </div>
    </body>
</html>
