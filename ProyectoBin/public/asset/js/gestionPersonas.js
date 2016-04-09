/* 
 * Funciones con peticiones AJAX y jquery.
 */

$(function () {
    $("#paginacion > li").each(paginar);
    $('.datepicker').pickadate({
        selectMonths:true
    });
});


function paginar (indice, elemento) {
        $(elemento).click(function (e) {
            e.preventDefault();
            $("#divMensaje").hide();
            $.ajax({
                url: '../../Controller/partePrivada/gestionPersonas.php',
                method: 'GET',
                data: {
                    pagina: indice + 1
                }, success: function (tabla, textStatus, jqXHR) {
                    // Petición con éxito
                    if (textStatus === "success") {
                        $("#tablaPersonas").remove();
                        $(tabla).insertAfter($("#divMensaje"));
                    }

                }, error: function (jqXHR, textStatus, errorThrown) {
                    // La petición por algún motivo ha fallado
                    $("#divMensaje").show().html("Ha habido un error al solicitar los datos, inténtalo más tarde.");
                    console.log(textStatus, errorThrown);
                }
            });
        });
    }