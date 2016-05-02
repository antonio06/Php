/* 
 * Funciones con peticiones AJAX y jquery.
 */

// Función principal
$(function () {
    $(document).on("click", "#paginacion > li", function (event) {
        event.preventDefault();
        $("#divMensaje").removeClass("correcto error").addClass("oculto").html("");

        // Si estoy en la misma página que el número del botón que no haga nada.
        var paginaBoton = parseInt($(event.currentTarget).attr("data-pagina"));
        if (parseInt($("#paginacion").attr("data-pagina")) !== paginaBoton) {
            paginar(paginaBoton);
        }

    });
    $("#formularioActividad").submit(enviarFormulario);
    $('.datepicker').pickadate({
        selectMonths: true
    });

    $("#nuevaActividad").click(function () {
        $("#formularioActividad").trigger("submit", {
            url: "/Controller/partePrivada/actividades/insertarActividad.php"
        });
    });
    $("#modificarActividad").click(function () {
        $("#formularioActividad").trigger("submit", {
            url: "/Controller/partePrivada/actividades/modificarActividad.php"
        });
    });

    $("#cerrarModal").click(function () {
        $("#modalActividad").closeModal();
        $("#formularioActividad").data("idActividad", null);
    });

    $("#suscribirseActividad").click(function () {
        $.ajax({
            url: '/Controller/partePrivada/actividades/miNuevaActividad.php',
            method: 'POST',
            dataType: 'json',
            data: {
                codigo_actividad: $("#modalActividad").data("codigo_actividad"),
            },
            success: function (respuesta, textStatus, jqXHR) {
                if (respuesta.estado) {
                    $("#divMensaje").removeClass("oculto error").addClass("correcto").html("Suscripción realizada con éxito.");
                    setTimeout(function () {
                        $("#divMensaje").removeClass("correcto error").addClass("oculto");
                    }, 3000);
                } else {
                    $("#divMensaje").removeClass("oculto correcto").addClass("error").html("Hubo un error al realizar la suscripción.");
                    setTimeout(function () {
                        $("#divMensaje").removeClass("correcto error").addClass("oculto");
                    }, 3000);
                }

                $("#modalActividad").closeModal();
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        })
    });

    $(document).on("click", "a[data-action='nuevo']", function (event) {
        event.preventDefault();
        mostrarModal({
            accion: "crear"
        });
    });

    $(document).on("click", "a[data-action='detalles']", function (event) {
        event.preventDefault();
        $.ajax({
            url: '/Controller/partePrivada/actividades/detallesActividad.php',
            method: 'GET',
            dataType: 'json',
            data: {
                codigo_actividad: $(event.currentTarget).attr("data-id")
            },
            success: function (respuesta, textStatus, jqXHR) {
                $("#suscribirseActividad").parent().show();
                if (respuesta) {
                    var actividad = $.parseJSON(respuesta.actividad);
                    console.log(actividad);
                    $("#contenedorDetallesActividad").find("div[data-actividad]").each(function (indice, elemento) {
                        var dato = $(elemento).attr("data-actividad");
                        if (actividad[dato] !== "") {
                            $(elemento).text(actividad[dato]);
                        } else {
                            $(elemento).text("-");
                        }
                    });
                    $("#modalActividad").data("codigo_actividad", actividad.codigo_actividad);
                }
                mostrarModal({
                    accion: "ver",
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            },
        })
    });

    $(document).on("click", "a[data-action='editar']", function (event) {
        event.preventDefault();
        $.ajax({
            url: '/Controller/partePrivada/actividades/detallesActividad.php',
            method: 'GET',
            dataType: "json",
            data: {
                codigo_actividad: $(event.currentTarget).attr("data-id")
            },
            success: function (respuesta, textStatus, jqXHR) {

                // Almacenar la id de la actividad que se ha seleccionado en el formulario
                // Esto se hace para no usar input hidden
                var actividad = JSON.parse(respuesta.actividad);
                $("#formularioActividad").data("idActividad", actividad["codigo_actividad"]);

                // Recogemos los elementos del formulario
                var controlesFormulario = $("#formularioActividad")[0].elements;
                mostrarModal({
                    accion: "modificar"
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
        $.ajax({
            url: '/Controller/partePrivada/actividades/eliminarActividad.php',
            method: 'POST',
            dataType: "json",
            data: {
                codigo_actividad: $(event.currentTarget).attr("data-id")
            },
            success: function (respuesta, textStatus, jqXHR) {
                if (respuesta.estado) {
                    $("#divMensaje").removeClass("oculto error").addClass("correcto").html("La actividad ha sido eliminada con exito");
                    setTimeout(function () {
                        $("#divMensaje").removeClass("correcto error").addClass("oculto");
                    }, 3000);
                    // Refrescar la tabla
                    paginar($("#paginacion").attr("data-pagina"));
                } else {
                    $("#divMensaje").removeClass("oculto correcto").addClass("error").html("Hubo un problema al borrar la actividad. Por favor inténtelo más tarde");
                    setTimeout(function () {
                        $("#divMensaje").removeClass("correcto error").addClass("oculto");
                    }, 3000);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
});

function paginar(pagina) {
    $.ajax({
        url: '/Controller/partePrivada/actividades/gestionActividades.php',
        method: 'GET',
        data: {
            pagina: pagina
        }, success: function (tabla, textStatus, jqXHR) {
            // Petición con éxito
            if (textStatus === "success") {
                $("#contenedorTabla").html(tabla);
            }

        }, error: function (jqXHR, textStatus, errorThrown) {
            // La petición por algún motivo ha fallado
            $("#divMensaje").show().html("Ha habido un error al solicitar los datos, inténtalo más tarde.");
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

    var formulario = $("#formularioActividad")[0];
    if (formulario.checkValidity()) {
        var datos = $("#formularioActividad").serialize();
        var id = $("#formularioActividad").data("idActividad");
        if (id) {
            datos += "&" + decodeURIComponent($.param({codigo_actividad: id}));
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: datos,
            dataType: "json",
            success: function (respuesta, textStatus, jqXHR) {
                if (respuesta.estado === "success") {
                    mensaje.html(respuesta.mensaje).removeClass("oculto error").addClass("correcto");
                    setTimeout(function () {
                        $("#divMensaje").removeClass("correcto error").addClass("oculto");
                    }, 3000);
                    limpiarFormulario();

                    $("#cerrarModal").trigger("click");

                    // Refrescar la tabla
                    paginar($("#paginacion").attr("data-pagina"));

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
        if (opciones.participa) {
            $("#suscribirseActividad").parent().hide();
        } else {
            $("#suscribirseActividad").parent().show();
        }
        $("#contenedorDetallesActividad").show();
    }
    $("#modalActividad").openModal();
}

function limpiarFormulario() {
    $("#formularioActividad").trigger("reset");
}
