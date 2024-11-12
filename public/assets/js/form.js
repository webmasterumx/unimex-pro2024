
$("#servicio_alumnos").validate({
    wrapper: "span",
    rules: {
        name_service: {
            required: true,
        },
        email_service: {
            required: true,
            email: true,
        },
        phone_casa_service: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        movil_service: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        select_plantel: {
            required: true,
        },
        asunto_service: {
            required: true,
        },
        matricula_service: {
            required: true,
            minlength: 11,
            maxlength: 11
        },
        mensaje_service: {
            required: true
        },
        operacion_service: {
            required: true,
            maxlength: 2,
        }
    },
    messages: {
        name_service: {
            required: "Nombre obligatorio.",
        },
        email_service: {
            required: "Correo obligatorio.",
            email: "Ingrese una dirección de E-mail correcta.",
        },
        phone_casa_service: {
            required: "Teléfono obligatorio.",
            minlength: "Debes ingresar el número a 10 dígitos..",
            maxlength: "Debes ingresar el número a 10 dígitos."
        },
        movil_service: {
            required: "Celular obligatorio.",
            minlength: "Debes ingresar el número a 10 dígitos.",
            maxlength: "Debes ingresar el número a 10 dígitos."
        },
        select_plantel: {
            required: "",
        },
        asunto_service: {
            required: "Asunto obligatorio.",
        },
        matricula_service: {
            required: "Su matrícula es obligatoria.",
            minlength: "Su matrícula debe tener mínimo 11 dígitos.",
            maxlength: "Su matrícula debe tener máximo 11 dígitos."
        },
        mensaje_service: {
            required: "Mensaje obligatorio.",
        },
        operacion_service: {
            required: "Resultado de la operación obligatorio.",
            maxlength: "Solo se permiten resultados de dos dígitos.",
        }
    },
    submitHandler: function (form) {

        let name_service = $('#name_service').val().replace(/ /g, "");
        let asunto_service = $('#asunto_service').val().replace(/ /g, "");

        if (name_service == "") {
            Swal.fire({
                icon: "error",
                text: "El campo nombre no puede estar vacío",
            });
        }
        else if (asunto_service == "") {
            Swal.fire({
                icon: "error",
                text: "El campo asunto no puede estar vacío",
            });
        }
        else {
            //* cambiar estado del boton
            $('#enviarDatosServicio').prop("disabled", true);
            $('#enviarDatosServicio').html(`
                <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                &nbsp;Enviando Datos..
            `);

            //!validacion de operacion
            let operacion = Number($('#number1').val()) + Number($('#number2').val());
            let operacionUsuario = $('#operacion_service').val();
            let element = $("#deacuerdo_service");

            if (validarAvisoDePrivacidad(element) == true) {
                if (operacion == operacionUsuario) {
                    let ruta = setUrlBase() + "form/servicio/alumno";
                    let formData = new FormData(form);

                    $.ajax({
                        method: "POST",
                        url: ruta,
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                    }).done(function (data) {
                        console.log(data);

                        Swal.fire({
                            title: "¡REGISTRO EXITOSO!",
                            text: "Datos enviados correctamente",
                            icon: "success"
                        });

                        resetForms(1);

                        $('#enviarDatosServicio').prop("disabled", false);
                        $('#enviarDatosServicio').html(`
                            ENVIAR DATOS
                        `);

                    }).fail(function (e) {
                        console.log("Request: " + JSON.stringify(e));
                    });

                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Resultado de la operación es incorrecto!",
                        icon: "error"
                    });

                    $('#enviarDatosServicio').prop("disabled", false);
                    $('#enviarDatosServicio').html(`
                    ENVIAR DATOS
                    `);
                }
            } else {
                Swal.fire({
                    icon: "error",
                    text: "Debe aceptar el aviso de privacidad para poder continuar.",
                });

                $('#enviarDatosServicio').prop("disabled", false);
                $('#enviarDatosServicio').html(`
                ENVIAR DATOS
                 `);
            }
        }


    }
});

$("#form_contacto").validate({
    rules: {
        nombre_prospecto: {
            required: true,
            maxlength: 50
        },
        apellidos_prospecto: {
            required: true,
            maxlength: 60
        },
        mail_prospecto: {
            required: true,
            maxlength: 50
        },
        celular_prospecto: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        telefono_prospecto: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        plantelSelect: {
            required: true,
        },
        periodoSelect: {
            required: true,
        },
        nivelSelect: {
            required: true,
        },
        carreraSelect: {
            required: true,
        },
        horarioSelect: {
            required: true,
        }
    },
    messages: {
        nombre_prospecto: {
            required: "Nombre obligatorio.",
            maxlength: "El número de caracteres máximo es 50."
        },
        apellidos_prospecto: {
            required: "Apellidos obligatorios.",
            maxlength: "El número de caracteres máximo es 60."
        },
        mail_prospecto: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato valido de correo.",
            maxlength: "El número de caracteres máximo es 60."
        },
        celular_prospecto: {
            required: "Teléfono celular obligatorio.",
            minlength: "Número celular de 10 dig. mínimo.",
            maxlength: "Número celular de 10 dig. máximo."
        },
        telefono_prospecto: {
            required: "Teléfono de casa obligatorio.",
            minlength: "Número teléfonico de 10 dig. mínimo.",
            maxlength: "Número teléfonico de 10 dig. máximo."
        },
        plantelSelect: {
            required: "",
        },
        periodoSelect: {
            required: "",
        },
        nivelSelect: {
            required: "",
        },
        carreraSelect: {
            required: "",
        },
        horarioSelect: {
            required: "",
        }
    },
    submitHandler: function (form) {

        let nombreProspecto = $('#nombre_prospecto').val().replace(/ /g, "");
        let apellidosProspecto = $('#apellidos_prospecto').val().replace(/ /g, "");

        if (nombreProspecto == "") {
            Swal.fire({
                icon: "error",
                text: "El campo de nombre no puede estar vacío",
            });
        }
        else if (apellidosProspecto == "") {
            Swal.fire({
                icon: "error",
                text: "El campo de apellidos no puede estar vacío",
            });
        }
        else {

            $('#envio_contacto').prop("disabled", true);
            $('#envio_contacto').html(`
                 <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                     <span class="visually-hidden">Loading...</span>
                 </div>
                 &nbsp;Enviando Datos..
             `);

            //* creacion de variable form data para envio de datos
            let formData = new FormData(form);
            let ruta = setUrlBase() + "procesa/datos/form/contacto";

            //! se agregan valores de seleccion para la vista de exito
            let plantelSeleccion = $('select[name="plantelSelect"] option:selected').text();
            let nivelSeleccion = $('select[name="nivelSelect"] option:selected').text();
            let carreraSeleccion = $('select[name="carreraSelect"] option:selected').text();
            let periodoSeleccion = $('select[name="periodoSelect"] option:selected').text();
            let horarioSeleccion = $('select[name="horarioSelect"] option:selected').text();

            formData.append("plantelSeleccion", plantelSeleccion);
            formData.append("nivelSeleccion", nivelSeleccion);
            formData.append("carreraSeleccion", carreraSeleccion);
            formData.append("periodoSeleccion", periodoSeleccion);
            formData.append("horarioSeleccion", horarioSeleccion);

            $.ajax({
                method: "POST",
                url: ruta,
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
            }).done(function (data) {

                console.log(data);

                let respuesta = JSON.parse(data);

                let rutaRedireccion = setUrlBase() + respuesta.ruta;

                setTimeout("location.href='" + rutaRedireccion + "'", 2000);


            }).fail(function (e) {

                console.log(e.status);

                if (e.status == 500) {
                    console.log("Error en el servidor");
                } else {
                    console.log("Error desconocido");
                }

                console.log("Request: " + JSON.stringify(e.status));
            });

        }


    }
});

$("#form_trabaja").validate({
    wrapper: "span",
    rules: {
        nombre_trabajo: {
            required: true,
        },
        email_trabaja: {
            required: true,
            email: true,
        },
        telefono_casa_trabaja: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        telefono_movil_trabaja: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        plantel_trabaja: {
            required: true,
        },
        nivel_est_trabaja: {
            required: true,
        },
        cv_trabaja: {
            required: true,
        },
        puesto_interes: {
            required: true,
        },
        experiencia_trabaja: {
            required: true,
        },
        operacion_trabaja: {
            required: true,
            maxlength: 2,
        }
    },
    messages: {
        nombre_trabajo: {
            required: "Nombre obligatorio.",
        },
        email_trabaja: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato valido de correo."
        },
        telefono_casa_trabaja: {
            required: "Teléfono obligatorio.",
            minlength: "El teléfono debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono debe tener máximo 10 dígitos."
        },
        telefono_movil_trabaja: {
            required: "Teléfono celular obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono celular debe tener máximo 10 dígitos."
        },
        plantel_trabaja: {
            required: "",
        },
        nivel_est_trabaja: {
            required: "",
        },
        cv_trabaja: {
            required: "CV obligatorio.",
        },
        puesto_interes: {
            required: "Puesto de interés obligatorio.",
        },
        experiencia_trabaja: {
            required: "Experiencia laboral obligatoria.",
        },
        operacion_trabaja: {
            required: "Resultado de la operación obligatoria.",
            maxlength: "Solo se permiten resultados de dos dígitos.",
        }
    },
    submitHandler: function (form) {

        let nombre_trabajo = $('#nombre_trabajo').val().replace(/ /g, "");
        let puesto_interes = $('#puesto_interes').val().replace(/ /g, "");

        if (nombre_trabajo == "") {
            Swal.fire({
                icon: "error",
                text: "El campo nombre no puede estar vacío",
            });
        }
        else if (puesto_interes == "") {
            Swal.fire({
                icon: "error",
                text: "El campo asunto no puede estar vacío",
            });
        }
        else {
            //* cambiar estado del boton
            $('#enviarDatosTrabaja').prop("disabled", true);
            $('#enviarDatosTrabaja').html(`
                <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                &nbsp;Enviando Datos..
            `);


            //!validacion de operacion
            let operacion = Number($('#number3').val()) + Number($('#number4').val());
            let operacionUsuario = $('#operacion_trabaja').val();
            let element = $("#aceptar_trabajar");

            if (validarAvisoDePrivacidad(element) == true) {
                if (operacion == operacionUsuario) {
                    let ruta = setUrlBase() + "form/trabaja/unimex";
                    let formData = new FormData(form);

                    $.ajax({
                        method: "POST",
                        url: ruta,
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                    }).done(function (data) {
                        console.log(data);

                        Swal.fire({
                            title: "¡REGISTRO EXITOSO!",
                            text: "Datos enviados correctamente",
                            icon: "success"
                        });

                        resetForms(2);

                        $('#enviarDatosTrabaja').prop("disabled", false);
                        $('#enviarDatosTrabaja').html(`
                            ENVIAR DATOS
                        `);

                    }).fail(function (e) {
                        console.log("Request: " + JSON.stringify(e));
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Resultado de la operación es incorrecto!",
                        icon: "error"
                    });

                    $('#enviarDatosTrabaja').prop("disabled", false);
                    $('#enviarDatosTrabaja').html(`
                        ENVIAR DATOS
                    `);
                }
            } else {
                Swal.fire({
                    icon: "error",
                    text: "Debe aceptar el aviso de privacidad para poder continuar.",
                });

                $('#enviarDatosTrabaja').prop("disabled", false);
                $('#enviarDatosTrabaja').html(`
                    ENVIAR DATOS
                `);
            }
        }

    }
});

$("#form_quejaSugerencia").validate({
    wrapper: "span",
    rules: {
        nombre_qys: {
            required: true,
        },
        mail_qys: {
            required: true,
            email: true,
        },
        telefono_casa_qys: {
            required: true,
        },
        telefono_movil_qys: {
            required: true,
        },
        matricula_qys: {
            required: true,
            minlength: 11,
            maxlength: 11
        },
        asunto_qys: {
            required: true,
        },
        mensaje_qys: {
            required: true,
        },
        operacion_qys: {
            required: true,
            maxlength: 2,
        }
    },
    messages: {
        nombre_qys: {
            required: "Nombre obligatorio.",
        },
        mail_qys: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato valido de correo."
        },
        telefono_casa_qys: {
            required: "Teléfono obligatorio.",
            minlength: "El teléfono debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono debe tener máximo 10 dígitos."
        },
        telefono_movil_qys: {
            required: "Teléfono celular obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono celular debe tener máximo 10 dígitos."
        },
        matricula_qys: {
            required: "Matrícula obligatoria.",
            minlength: "Su matrícula debe tener mínimo 11 dígitos.",
            maxlength: "Su matrícula debe tener máximo 11 dígitos."
        },
        asunto_qys: {
            required: "Asunto obligatorio.",
        },
        mensaje_qys: {
            required: "Mensaje obligatorio.",
        },
        operacion_qys: {
            required: "Resultado de la operación obligatorio.",
            maxlength: "Solo se permiten resultados de dos dígitos.",
        }
    },
    submitHandler: function (form) {

        let nombre_qys = $('#nombre_qys').val().replace(/ /g, "");
        let asunto_qys = $('#asunto_qys').val().replace(/ /g, "");

        if (nombre_qys == "") {
            Swal.fire({
                icon: "error",
                text: "El campo nombre no puede estar vacío",
            });
        }
        else if (asunto_qys == "") {
            Swal.fire({
                icon: "error",
                text: "El campo asunto no puede estar vacío",
            });
        }
        else {
            //* cambiar estado del boton
            $('#enviarDatosAceptar').prop("disabled", true);
            $('#enviarDatosAceptar').html(`
                <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                &nbsp;Enviando Datos..
            `);

            //!validacion de operacion
            let operacion = Number($('#number5').val()) + Number($('#number6').val());
            let operacionUsuario = $('#operacion_qys').val();
            let element = $("#aceptar_qys");

            if (validarAvisoDePrivacidad(element) == true) {
                if (operacion == operacionUsuario) {
                    let ruta = setUrlBase() + "form/quejas/sugerencias";
                    let formData = new FormData(form);

                    $.ajax({
                        method: "POST",
                        url: ruta,
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                    }).done(function (data) {
                        console.log(data);

                        Swal.fire({
                            title: "¡REGISTRO EXITOSO!",
                            text: "Datos enviados correctamente",
                            icon: "success"
                        });

                        resetForms(3);

                        $('#enviarDatosAceptar').prop("disabled", false);
                        $('#enviarDatosAceptar').html(`
                            ENVIAR DATOS
                        `);

                    }).fail(function (e) {
                        console.log("Request: " + JSON.stringify(e));
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Resultado de la operación es incorrecto!",
                        icon: "error"
                    });

                    $('#enviarDatosAceptar').prop("disabled", false);
                    $('#enviarDatosAceptar').html(`
                        ENVIAR DATOS
                    `);
                }

            } else {
                Swal.fire({
                    text: "Debe aceptar el aviso de privacidad para poder continuar.",
                    icon: "error"
                });

                $('#enviarDatosAceptar').prop("disabled", false);
                $('#enviarDatosAceptar').html(`
                    ENVIAR DATOS
                `);
            }
        }

    }
});

$("#form_empresasOCC").validate({
    wrapper: "span",
    rules: {
        nombre_empresaOCC: {
            required: true,
        },
        contacto_empresaOCC: {
            required: true,
        },
        email_empresaOCC: {
            required: true,
            email: true,
        },
        telefono_empresaOCC: {
            required: true,
        },
        celular_empresaOCC: {
            required: true,
        },
        razon_empresaOCC: {
            required: true
        },
        rfc_empresaOCC: {
            required: true,
        },
        comentarios_empresaOCC: {
            required: true,
        },
        operacion_empresaOCC: {
            required: true,
            maxlength: 2,
        }
    },
    messages: {
        nombre_empresaOCC: {
            required: "El nombre de su empresa es obligatorio.",
        },
        contacto_empresaOCC: {
            required: "El nombre de su contacto es obligatorio.",
        },
        email_empresaOCC: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato valido de correo."
        },
        telefono_empresaOCC: {
            required: "Teléfono obligatorio.",
            minlength: "El teléfono debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono debe tener máximo 10 dígitos."
        },
        celular_empresaOCC: {
            required: "Teléfono celular obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono celular debe tener máximo 10 dígitos."
        },
        razon_empresaOCC: {
            required: "Razón social obligatoria."
        },
        rfc_empresaOCC: {
            required: "RFC obligatorio",
        },
        comentarios_empresaOCC: {
            required: "Comentarios obligatorios.",
        },
        operacion_empresaOCC: {
            required: "Resultado de la operación obligatorio.",
            maxlength: "Solo se permiten resultados de dos dígitos.",
        }
    },
    submitHandler: function (form) {

        let nombre_empresaOCC = $('#nombre_empresaOCC').val().replace(/ /g, "");
        let contacto_empresaOCC = $('#contacto_empresaOCC').val().replace(/ /g, "");
        let razon_empresaOCC = $('#razon_empresaOCC').val().replace(/ /g, "");
        let rfc_empresaOCC = $('#rfc_empresaOCC').val().replace(/ /g, "");

        if (nombre_empresaOCC == "") {
            Swal.fire({
                icon: "error",
                text: "El nombre de su empresa es obligatorio.",
            });
        }
        else if (contacto_empresaOCC == "") {
            Swal.fire({
                icon: "error",
                text: "El nombre de su contacto es obligatorio.",
            });
        }
        else if (razon_empresaOCC == "") {
            Swal.fire({
                icon: "error",
                text: "Razón social obligatoria.",
            });
        }
        else if (rfc_empresaOCC == "") {
            Swal.fire({
                icon: "error",
                text: "RFC obligatorio",
            });
        }
        else {
            //* cambiar estado del boton
            $('#enviarDatosEmpresasOCC').prop("disabled", true);
            $('#enviarDatosEmpresasOCC').html(`
                <div class="spinner-border" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                &nbsp;Enviando Datos..
            `);

            //!validacion de operacion
            let operacion = Number($('#number7').val()) + Number($('#number8').val());
            let operacionUsuario = $('#operacion_empresaOCC').val();
            let element = $("#aceptar_empresasocc");

            if (validarAvisoDePrivacidad(element) == true) {
                if (operacion == operacionUsuario) {
                    let ruta = setUrlBase() + "form/empresas/occ";
                    let formData = new FormData(form);

                    $.ajax({
                        method: "POST",
                        url: ruta,
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                    }).done(function (data) {
                        console.log(data);

                        Swal.fire({
                            title: "¡REGISTRO EXITOSO!",
                            text: "Datos enviados correctamente",
                            icon: "success"
                        });

                        resetForms(4);

                        $('#enviarDatosEmpresasOCC').prop("disabled", false);
                        $('#enviarDatosEmpresasOCC').html(`
                            ENVIAR DATOS
                        `);

                    }).fail(function (e) {
                        console.log("Request: " + JSON.stringify(e));
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Resultado de la operación es incorrecto!",
                        icon: "error"
                    });

                    $('#enviarDatosEmpresasOCC').prop("disabled", false);
                    $('#enviarDatosEmpresasOCC').html(`
                        ENVIAR DATOS
                    `);
                }
            } else {

                Swal.fire({
                    icon: "error",
                    text: "Debe aceptar el aviso de privacidad para poder continuar.",
                });

                $('#enviarDatosEmpresasOCC').prop("disabled", false);
                $('#enviarDatosEmpresasOCC').html(`
                    ENVIAR DATOS
                `);
            }
        }

    }
});

function validarAvisoDePrivacidad(element) {
    if ($(element).is(':checked')) {
        // el check de aviso de privacidad esta seleccionado
        return true;
    }
    else {
        // el check de aviso de privacidad no esta seleccionado
        return false;
    }
}