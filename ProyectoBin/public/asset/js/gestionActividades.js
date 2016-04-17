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
    $("#modificarActividad").click(function () {
        $("#formularioActividad").trigger("submit", {url: "../../Controller/partePrivada/modificarActividad.php"});
    });
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
        $.ajax({
            url: '../../Controller/partePrivada/modificarActividad.php',
            method: 'GET',
            dataType: "json",
            data: {
                codigo_actividad: $(event.currentTarget).attr("data-id")
            },
            success: function (actividad, textStatus, jqXHR) {

                // Almacenar la id de la actividad que se ha seleccionado en el formulario
                // Esto se hace para no usar input hidden
                $("#formularioActividad").data("idActividad", actividad["codigo_actividad"]);

                // Recogemos los elementos del formulario
                var controlesFormulario = $("#formularioActividad")[0].elements;
                mostrarModal({
                    accion: "modificar",
                    id: $(event.currentTarget).attr("data-id")
                });

                // Iteramos por cada elemento del formulario de fin a inicio
                $.each(controlesFormulario, function (index) {
                    var elemento = controlesFormulario[controlesFormulario.length - 1 - index];
                    var nombre = $(elemento).attr("name");

                    // Si el elemento tiene atributo name lo modificamos
                    // Esto lo hacemos para filtrar los elementos que no tengan name como los botones
                    // de submit
                    if (nombre) {
                        $(elemento).val(actividad[nombre]);

                        // Martillazo para que Materialize ponga los labels encima del input
                        $(elemento).trigger("focus");
                    }
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
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
//            console.log(textStatus, errorThrown);
        }
    });
}

function enviarFormulario(event, opciones) {
    event.preventDefault();
    var url;
    var mensaje = $("#divMensaje");

    // Comprobamos que se pase el parámetro opciones siendo un objeto.
    if ($.isPlainObject(opciones) && opciones.url) {
        url = opciones.url;
    }

    // Si no conseguimos la url del controlador salimos de la función
    if (!url) {
        return false;
    }
//    console.log("URL:", url);



    var formulario = $("#formularioActividad")[0];
    if (formulario.checkValidity()) {
        var datos = $("#formularioActividad").serialize();
        var id = $("#formularioActividad").data("idActividad");
        if (id) {
            datos += "&" + decodeURIComponent($.param({codigo_actividad: id}));
        }
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

                    // Refrescar la tabla
                    paginar($("#paginaActual").val());

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
