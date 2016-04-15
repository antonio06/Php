/* 
 * Funciones con peticiones AJAX y jquery.
 */

// Función principal
$(function () {
    $("#paginacion > li").each(function (indice, elemento) {
        $(elemento).click(function (e) {
            e.preventDefault();
            $("#divMensaje").removeClass("correcto error").addClass("oculto").html("");
            paginar(indice + 1);
        });
    });
    $("#formularioActividad").submit(enviarFormulario);
    $('.datepicker').pickadate({
        selectMonths: true
    });

    $("#nuevaActividad").click(function () {
        $("#formularioActividad").trigger("submit", {url: "../../Controller/partePrivada/insertarActividad.php"});
    });
    $("#modificarActividad").click();
    $("#suscribirseActividad").click();

    $(document).on("click", "a[data-action='nuevo']", function (event) {
        event.preventDefault();
        mostrarModal({
            accion: "crear",
            id: $(this).attr("data-id")
        });
    });

    $(document).on("click", "a[data-action='detalles']", function (event) {
        event.preventDefault();
        mostrarModal({
            accion: "ver",
            id: $(this).attr("data-id")
        });
    });

    $(document).on("click", "a[data-action='editar']", function (event) {
        event.preventDefault();
        mostrarModal({
            accion: "modificar",
            id: $(this).attr("data-id")
        });
    });

    $(document).on("click", "a[data-action='borrar']", function (event) {
        event.preventDefault();
    });
});

function paginar(pagina) {
    $.ajax({
        url: '../../Controller/partePrivada/gestionActividades.php',
        method: 'GET',
        data: {
            pagina: pagina
        }, success: function (tabla, textStatus, jqXHR) {
            // Petición con éxito
            if (textStatus === "success") {
                $("#tablaActividades").remove();
                $("#paginaActual").remove();
                $(tabla).insertAfter($("#divMensaje"));
            }

        }, error: function (jqXHR, textStatus, errorThrown) {
            // La petición por algún motivo ha fallado
            $("#divMensaje").show().html("Ha habido un error al solicitar los datos, inténtalo más tarde.");
            console.log(textStatus, errorThrown);
        }
    });
}

function enviarFormulario(event, opciones) {
    event.preventDefault();
    var url;

    // Comprobamos que se pase el parámetro opciones siendo un objeto.
    if ($.isPlainObject(opciones) && opciones.url) {
        url = opciones.url;
    }

    // Si no conseguimos la url del controlador salimos de la función
    if (!url) {
        return false;
    }
//    console.log("URL:", url);
    var datos = $("#formularioActividad").serialize();
    var mensaje = $("#divMensaje");

    var formulario = $("#formularioActividad").get()[0];
    if (formulario.checkValidity()) {
        console.log("Enviando formulario al servidor...");
        $.ajax({
            url: opciones.url,
            method: 'POST',
            data: datos,
            dataType: "json",
            success: function (respuesta, textStatus, jqXHR) {
                if (respuesta.estado === "success") {
                    mensaje.html(respuesta.mensaje).removeClass("oculto error").addClass("correcto");
                    limpiarFormulario();
                    $("#modalActividad").closeModal();
                    paginar($("#paginaActual").val());

                    // Refrescar la tabla

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
}


function mostrarModal(opciones) {
    //console.log(opciones.id);
    $("#nuevaActividad").parent().hide();
    $("#modificarActividad").parent().hide();
    $("#suscribirseActividad").parent().hide();
    $("#contenedorDetallesActividad").hide();
    $("#contenedorFormularioActividad").hide();
    if (opciones.accion === "crear") {
        limpiarFormulario();
        $("#nuevaActividad").parent().show();
        $("#contenedorFormularioActividad").show();
    } else if (opciones.accion === "modificar") {
        $("#modificarActividad").parent().show();
        $("#contenedorFormularioActividad").show();
    } else if (opciones.accion === "ver") {
        $("#suscribirseActividad").parent().show();
        $("#contenedorDetallesActividad").show();
    }
    $("#modalActividad").openModal(); //.leanModal();
}

function limpiarFormulario() {
    $("#formularioActividad").trigger("reset");
}