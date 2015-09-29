
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="estilos.css" >
    </head>
    <body>
        <div id="principal">
        <div id="cabecera">
         <h1>Examen del Curso</h1>
        </div>
        <div id="cuerpo">
        <form method="post" action="resultado.php">
         
             1 ¿Como se pone el operador lógigo y ?<br>
             <input type="radio" name="numero1" value="1"/>&&<br>
             <input type="radio" name="numero1" value="0"/>||<br>
             <input type="radio" name="numero1" value="0"/>ninguna de las dos<br>
             <br>
         
         <p>
             2 ¿Como se pone el operador lógigo o ?<br>
             <input type="radio" name="numero2" value="0"/>&&<br>
             <input type="radio" name="numero2" value="1"/>||<br>
             <input type="radio" name="numero2" value="0"/>ninguna de las dos<br>
             <br>
         </p>
         <p>
             3 ¿Como mostramos mensajes por pantalla en php ?<br>
             <input type="radio" name="numero3" value="1"/>echo<br>
             <input type="radio" name="numero3" value="0"/>mostrar<br>
             <input type="radio" name="numero3" value="0"/>System.out.println<br>
             <br>
         </p>
         <p>
             4 ¿Como ponemos que una variable es idéntica a algo ?<br>
             <input type="radio" name="numero4" value="1"/>$a==$b<br>
             <input type="radio" name="numero4" value="0"/>$a=$b<br>
             <input type="radio" name="numero4" value="0"/>ninguna de las dos<br>
             <br>
         </p>
         <p>
             5 ¿ Php es un lenguaje ?<br>
             <input type="radio" name="numero5" value="0"/>fuertemente tipado<br>
             <input type="radio" name="numero5" value="1"/>poco tipado<br>
             <input type="radio" name="numero5" value="0"/>ninguna de las dos<br>
             <br>
         </p>
         <p>
             6 ¿Que significa $a > $b ?<br>
             <input type="radio" name="numero6" value="1"/>a es mayor que b<br> 
             <input type="radio" name="numero6" value="0"/>a es menor que b<br>
             <input type="radio" name="numero6" value="0"/>no significa nada<br>
             <br>
         </p>
         <p>
             7 ¿ En html como hacemos para dar estilos a nuestra web ?<br>
             <input type="radio" name="numero7" value="1"/>Con una hoja de estilos css<br>
             <input type="radio" name="numero7" value="0"/>html trae incluido los estilos no tenemos que hacerlo nosotros<br>
             <input type="radio" name="numero7" value="0"/>las páginas web no permiten tener estilos<br>
             <br>
         </p>
         <p>
             8 ¿ En cualquier lenguaje de programación que tres tipos de bucles hay ?<br>
             <input type="radio" name="numero8" value="1"/>el bucle for, while, do while<br>
             <input type="radio" name="numero8" value="0"/>bucle for, if y else<br>
             <input type="radio" name="numero8" value="0"/>no existen bucles en programación<br>
             <br>
         </p>
         <p>
             9 ¿Que IDE usamos para programar en php ?<br>
             <input type="radio" name="numero9" value="1"/>netbeans<br>
             <input type="radio" name="numero9" value="0"/>eclipse<br>
             <input type="radio" name="numero9" value="0"/>el bloc de notas<br>
             <br>
         </p>
         <p>
             10 ¿como se incrementa en uno una bariable  ?<br>
             <input type="radio" name="numero10" value="1"/>$bariable++<br>
             <input type="radio" name="numero10" value="0"/>++$bariable<br>
             <input type="radio" name="numero10" value="0"/>no se puede incrementar una bariable <br>
             <br>
         </p>
         <br>
         <input type="submit" value="Enviar para Evaluar">
         </form>
        </div> 
     </div>
    </body>
</html>
