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
    $("#formularioPersona").submit(enviarFormulario);
    
    $('.datepicker').pickadate({
        selectMonths: true
    });
    
    $("#nuevaPersona").click(function () {
        $("#formularioPersona").trigger("submit", {
            url: "/Controller/partePrivada/personas/insertarPersona.php"
        });
    });
    $("#modificarPersona").click(function () {
        $("#formularioPersona").trigger("submit", {
            url: "/Controller/partePrivada/personas/modificarPersona.php"
        });
    });

    $("#cerrarModal").click(function () {
        $("#modalPersona").closeModal();
        $("#formularioPersona").data("idPersona", null);
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
            url: '/Controller/partePrivada/personas/detallesPersona.php',
            method: 'GET',
            dataType: 'json',
            data: {
                codigo_persona: $(event.currentTarget).attr("data-id")
            },
            success: function (respuesta, textStatus, jqXHR) {
                //$("#suscribirseActividad").parent().show();
                if (respuesta) {
                    var persona = $.parseJSON(respuesta.persona);

                    $("#contenedorDetallesPersona").find("div[data-persona]").each(function (indice, elemento) {
                        var dato = $(elemento).attr("data-persona");
                        if (persona[dato] !== "") {
                            $(elemento).text(persona[dato]);
                        } else {
                            $(elemento).text("-");
                        }
                    });
                    $("#modalPersona").data("codigo_persona", persona.codigo);
                }
                mostrarModal({
                    accion: "ver",
                    ///participa: respuesta.persona
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
            url: '/Controller/partePrivada/personas/detallespersona.php',
            method: 'GET',
            dataType: "json",
            data: {
                codigo_persona: $(event.currentTarget).attr("data-id")
            },
            success: function (respuesta, textStatus, jqXHR) {

                // Almacenar la id de la actividad que se ha seleccionado en el formulario
                // Esto se hace para no usar input hidden
                var persona = JSON.parse(respuesta.persona);
                $("#formularioPersona").data("idPersona", persona["codigo_persona"]);

                // Recogemos los elementos del formulario
                var controlesFormulario = $("#formularioPersona")[0].elements;
                mostrarModal({
                    accion: "modificar",
                    //id: $(event.currentTarget).attr("data-id")
                });

                // Iteramos por cada elemento del formulario de fin a inicio
                $.each(controlesFormulario, function (index) {
                    var elemento = controlesFormulario[controlesFormulario.length - 1 - index];
                    var nombre = $(elemento).attr("name");
                    // Si el elemento tiene atributo name lo modificamos
                    // Esto lo hacemos para filtrar los elementos que no tengan name como los botones
                    // de submit
                    if (nombre) {
                        $(elemento).val(persona[nombre]);
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
            url: '/Controller/partePrivada/personas/eliminarPersona.php',
            method: 'POST',
            dataType: "json",
            data: {
                codigo_persona: $(event.currentTarget).attr("data-id")
            },
            success: function (respuesta, textStatus, jqXHR) {
                if (respuesta.estado) {
                    $("#divMensaje").removeClass("oculto error").addClass("correcto").html("La Persona ha sido eliminada con exito");
                    setTimeout(function () {
                        $("#divMensaje").removeClass("correcto error").addClass("oculto");
                    }, 3000);
                    // Refrescar la tabla
                    paginar($("#paginacion").attr("data-pagina"));
                } else {
                    $("#divMensaje").removeClass("oculto correcto").addClass("error").html("Hubo un problema al borrar a la persona. Por favor inténtelo más tarde");
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
        url: '/Controller/partePrivada/personas/gestionPersonas.php',
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

    var formulario = $("#formularioPersona")[0];
    if (formulario.checkValidity()) {
        var datos = $("#formularioPersona").serializeArray();
        
        
        var persona = {};
        //iteramos sobre datos que es un array con todas las propiedades que tiene actividad.
        for (var a = 0; a < datos.length; a++) {
            // creamos una variable propiedad donde le decimos en posición x sacame name.
            var propiedad = datos[a].name;
            // creamos una variable valor donde le decimos en posición x sacame value.
            var valor = datos[a].value;
            // en actividad le añadimos una propiedad y le asignamos un valor.
            persona[propiedad] = valor;
        }
        // creamos una variable el cual coje la propiedad pickadate y obtenemos el valor con este formato
        var fecha_nac = $("#fecha_nac_persona").pickadate("picker").get("select", "yyyy-mm-dd");
        var fecha_alta = $("#fecha_alta_persona").pickadate("picker").get("select", "yyyy-mm-dd");
        var fecha_baja = $("#fecha_baja_persona").pickadate("picker").get("select", "yyyy-mm-dd");
        persona.fecha_nac = fecha_nac;
        persona.fecha_alta = fecha_alta;
        persona.fecha_baja = fecha_baja;
        
        var id = $("#formularioPersona").data("idPersona");
        if (id) {
//            datos += "&" + decodeURIComponent($.param({codigo_persona: id}));
              persona.codigo_persona = id;
        }
        
        console.log(persona);
//        $.ajax({
//            url: url,
//            method: 'POST',
//            data: datos,
//            dataType: "json",
//            success: function (respuesta, textStatus, jqXHR) {
//                if (respuesta.estado === "success") {
//                    mensaje.html(respuesta.mensaje).removeClass("oculto error").addClass("correcto");
//                    limpiarFormulario();
//                    $("#cerrarModal").trigger("click");
//
//                    // Refrescar la tabla
//                    paginar($("#paginacion").attr("data-pagina"));
//
//                } else {
//                    var errores = "<span>Ocurrieron los siguientes fallos:</span>";
//                    errores += "<ul class='lista'>";
//                    for (var i = 0; i < respuesta.errores.length; i++) {
//                        errores += "<li>" + respuesta.errores[i] + "</li>";
//                    }
//                    errores += "</ul>";
//                    mensaje.html(errores).removeClass("oculto").addClass("error");
//                }
//            },
//            error: function (jqXHR, textStatus, errorThrown) {
//                mensaje.html("Hubo un error al realizar la petición, por favor inténtelo más tarde.").removeClass("oculto").addClass("error");
//            }
//        });
    }
}

function mostrarModal(opciones) {
    $("#nuevaPersona").parent().hide();
    $("#modificarPersona").parent().hide();
    $("#contenedorDetallesPersona").hide();
    $("#contenedorFormularioPersona").hide();
    if (opciones.accion === "crear") {
        limpiarFormulario();
        $("#nuevaPersona").parent().show();
        $("#contenedorFormularioPersona").show();
    } else if (opciones.accion === "modificar") {
        $("#modificarPersona").parent().show();
        $("#contenedorFormularioPersona").show();
    }else if (opciones.accion === "ver") {
        
        $("#contenedorDetallesPersona").show();
    }
    $("#modalPersona").openModal();
}

function limpiarFormulario() {
    $("#formularioPersona").trigger("reset");
}