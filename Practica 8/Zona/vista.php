<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2: Venta de entradas</title>
        <style>
            form, div{
                float: left;
                display: inline-block;
                padding: 15px;
            }
            span{
                display: block;
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
        <form action="Practica3.php" method="post">
            <label>Número de entradas</label>
            <input type="number" name="entradas">
            <select name="zona">
                <option value="1">Zona Principal</option>
                <option value="2">Zona Compra-Venta</option>
                <option value="3">Zona VIP</option>
            </select>
            <input type="submit" name="vender" value="Vender">
        </form>
        <div class="resultado">
            <span>{{mensaje}}</span>
            <ul>
                <li>Entradas de la Zona Principal: {{entradasPrincipal}}</li>
                <li>Entradas de la Zona Compra-Venta: {{entradasCompraVenta}}</li>
                <li>Entradas de la Zona VIP: {{entradasVIP}}</li>
            </ul>

        </div>
    </body>
</html>