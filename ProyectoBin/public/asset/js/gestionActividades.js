/* 
 * Funciones con peticiones AJAX y jquery.
 */

// Función principal
$(function () {
    $("#paginacion > li").each(paginar);
    $("#formularioNuevaActividad").submit(enviarFormulario);
    $('.datepicker').pickadate({
        selectMonths: true
    });

    $("a[data-action='nuevo']").click(function (event) {
        event.preventDefault();
        mostrarDetallesActividad({
            accion: "crear",
            id: $(this).attr("data-id")
        });
    });

    $("a[data-action='detalles']").click(function (event) {
        event.preventDefault();
        mostrarDetallesActividad({
            id: $(this).attr("data-id")
        });
    });

    $("a[data-action='editar']").click(function (event) {
        event.preventDefault();
        mostrarDetallesActividad({
            accion: "modificar",
            id: $(this).attr("data-id")
        });
    });

    $("a[data-action='borrar']").click(function (event) {
        event.preventDefault();
    });
});

function paginar(indice, elemento) {
    $(elemento).click(function (e) {
        e.preventDefault();
        $("#divMensaje").hide();
        $.ajax({
            url: '../../Controller/partePrivada/gestionActividades.php',
            method: 'GET',
            data: {
                pagina: indice + 1
            }, success: function (tabla, textStatus, jqXHR) {
                // Petición con éxito
                if (textStatus === "success") {
                    $("#tablaActividades").remove();
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

function enviarFormulario(event) {
    event.preventDefault();
    var datos = $(this).serialize();
    console.log(datos);
    var mensaje = $("#divMensaje");

    $.ajax({
        url: "../../Controller/partePrivada/insertarActividad.php",
        method: 'POST',
        data: datos,
        dataType: "json",
        success: function (respuesta, textStatus, jqXHR) {
            console.log(respuesta);
            if (respuesta.estado === "success") {
                mensaje.html(respuesta.mensaje).removeClass("oculto error").addClass("correcto");
                window.location.href = "../../Controller/partePrivada/gestionActividades.php";
            } else {
                var errores = "<span>Ocurrieron los siguientes fallos:</span>";
                errores += "<ul class='lista'>";
                for (var i = 0; i < respuesta.errores.length; i++) {
                    errores += "<li>" + respuesta.errores[i] + "</li>";
                }
                errores += "</ul>";
                mensaje.html(errores).removeClass("oculto").addClass("error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            mensaje.html("Hubo un error al realizar la petición, por favor inténtelo más tarde.").removeClass("oculto").addClass("error");
        }
    });
}


function mostrarDetallesActividad(opciones) {
    //console.log(opciones.id);
    $("#nuevaActividad").parent().hide();
    $("#modificarActividad").parent().hide();
    if (opciones.accion === "crear") {
        $("#nuevaActividad").parent().show();
    } else if (opciones.accion === "modificar") {
        $("#modificarActividad").parent().show();
    }
    $("#modalActividad").openModal(); //.leanModal();
}