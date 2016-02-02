<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin tÃ­tulo</title>
        <script type="text/javascript" src="jquery.js"></script>
        <script>
            $(document).ready(function () {

            });//ready	   
        </script>

        <style type="text/css">
            #contenedor{
                position: absolute;
                width: 750px;
            }
            #artistas_capa{
                background-color: LightSlateGrey ;	
                width: 200px;
                float: left;	
            }
            #albumes_capa{
                background-color: LightSteelBlue;
                width: 450px;
                float: left;
            }	
            #tabla_artista{
                width: 200px;
            }
            #tabla_albumes{
                width: 450px;
            }


        </style>


    </head>


    <body>

        <div id="contenedor">
            <div id="artistas_capa"><?php include "artista_lista.php" ?></div>
            <div id="albumes_capa"></div>
        </div>



    </body>
</html>