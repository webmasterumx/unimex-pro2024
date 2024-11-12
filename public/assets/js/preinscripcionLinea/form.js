$("#formPreincripcion").validate({

    rules: {
        correo: {
            required: true,
            email: true,
            maxlength: 50,
        },
        telefono: {
            required: true,
            minlength: 10,
            maxlength: 10,
        }
    },
    messages: {
        correo: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato valido de correo.",
            maxlength: "El número de caracteres máximo es 50.",

        },
        telefono: {
            required: "Teléfono obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos.",
        }
    },
    submitHandler: function (form) {

        $("#validarCorreo").prop("disabled", true);
        $('#validarCorreo').html(`
        <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Validando Datos
        `);

        let formData = new FormData(form);
        let ruta = setUrlBase() + "validacion/preinscripcion";

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
            console.log(respuesta);

            if (respuesta.acceso == true) {
                $('#validarCorreo').html(`
                <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                Redirigiendo
                `);
                let redireccion = setUrlBase() + "form/datos_generales/preinscripcion";

                setTimeout(`location.href='${redireccion}'`, 2000);
            } else if (respuesta.acceso == false) {
                $('#validarCorreo').html(`
                    <i class="bi bi-box-arrow-right"></i>
                    Continuar
                `);
                $("#validarCorreo").prop("disabled", false);

                $("#correo").val("");
                $("#telefono").val("");


                $('#statictConfirmPreinscripcion').modal('show');
            } else if (respuesta.acceso = "Descartar") {
                $("#validarCorreo").prop("disabled", false);
                $('#validarCorreo').html(`
                <i class="bi bi-box-arrow-right"></i>
                Continuar
                `);

                Swal.fire({
                    icon: "error",
                    title: "Correo ya registrado",
                });
            }


        }).fail(function () {
            console.log("Algo salió mal");
        });


    }
});

$("#formPromoPreinscripcion").validate({
    rules: {
        nombreInscripcion: {
            required: true,
            maxlength: 50,
        },
        apellidoPatInscripcion: {
            required: true,
            maxlength: 30,
        },
        apellidoMatInscripcion: {
            required: true,
            maxlength: 30,
        },
        diaNacimiento: {
            required: true,
        },
        mesNacimiento: {
            required: true,
        },
        yearNacimiento: {
            required: true,
        },
        telefonoInscripcion: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        telefonoCelInscripcion: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        calleInscripcion: {
            required: true,
            maxlength: 50,
        },
        numeroInscripcion: {
            required: true,
            maxlength: 15,
        },
        coloniaInscripcion: {
            required: true,
            maxlength: 50,
        },
        estadoInscripcion: {
            required: true,
        },
        municipioInscripcion: {
            required: true,
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
        },
    },
    messages: {
        nombreInscripcion: {
            required: "Nombre(s) obligatorio(s)",
            maxlength: "El número de caracteres máximo es 50.",
        },
        apellidoPatInscripcion: {
            required: "Apellido paterno obligatorio.",
            maxlength: "El número de caracteres máximo es 30.",
        },
        apellidoMatInscripcion: {
            required: "Apellido materno obligatorio.",
            maxlength: "El número de caracteres máximo es 30.",
        },
        diaNacimiento: {
            required: "",
        },
        mesNacimiento: {
            required: "",
        },
        yearNacimiento: {
            required: "",
        },
        telefonoInscripcion: {
            required: "Número de teléfono obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        telefonoCelInscripcion: {
            required: "Número de celular obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 digitos.",
            maxlength: "El teléfono celular debe tener máximo 10 digitos."
        },
        calleInscripcion: {
            required: "Calle obligatoria.",
            maxlength: "El número de caracteres máximo es 50.",
        },
        numeroInscripcion: {
            required: "Número obligatorio.",
            maxlength: "El número de caracteres máximo es 15.",
        },
        coloniaInscripcion: {
            required: "Colonia obligatoria.",
            maxlength: "El número de caracteres máximo es 50.",
        },
        estadoInscripcion: {
            required: "",
        },
        municipioInscripcion: {
            required: "",
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

        $("#calcularPromo").prop("disabled", true);
        $('#calcularPromo').html(`
        <div class="spinner-border me-1" style="width: 20px; height: 20px;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Calculando Promoción
        `);

        let formData = new FormData(form);
        let ruta = setUrlBase() + "obtener/promo/preinscripcion";

        $.ajax({
            method: "POST",
            url: ruta,
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (data) {

            let nombreProspecto = $('#nombreInscripcion').val().replace(/ /g, "");
            let apellidoPatProspecto = $('#apellidoPatInscripcion').val().replace(/ /g, "");
            let apellidoMatProspecto = $('#apellidoMatInscripcion').val().replace(/ /g, "");
            let calleProspecto = $('#calleInscripcion').val().replace(/ /g, "");
            let numeroProspecto = $('#numeroInscripcion').val().replace(/ /g, "");
            let coloniaProspecto = $('#coloniaInscripcion').val().replace(/ /g, "");

            if (nombreProspecto == "") {
                Swal.fire({
                    icon: "error",
                    text: "El campo de nombre no puede estar vacío",
                });

                $("#calcularPromo").prop("disabled", false);
                $('#calcularPromo').html(`
                    Continuar
                `);
            }
            else if (apellidoPatProspecto == "") {
                Swal.fire({
                    icon: "error",
                    text: "El campo de apellido paterno no puede estar vacío",
                });

                $("#calcularPromo").prop("disabled", false);
                $('#calcularPromo').html(`
                    Continuar
                `);
            }
            else if (apellidoMatProspecto == "") {
                Swal.fire({
                    icon: "error",
                    text: "El campo de apellido materno no puede estar vacío",
                });

                $("#calcularPromo").prop("disabled", false);
                $('#calcularPromo').html(`
                    Continuar
                `);
            }
            else if (calleProspecto == "") {
                Swal.fire({
                    icon: "error",
                    text: "El campo de calle no puede estar vacío",
                });

                $("#calcularPromo").prop("disabled", false);
                $('#calcularPromo').html(`
                    Continuar
                `);
            }
            else if (numeroProspecto == "") {
                Swal.fire({
                    icon: "error",
                    text: "El campo de número no puede estar vacío",
                });

                $("#calcularPromo").prop("disabled", false);
                $('#calcularPromo').html(`
                    Continuar
                `);
            }
            else if (coloniaProspecto == "") {
                Swal.fire({
                    icon: "error",
                    text: "El campo de colonia no puede estar vacío",
                });

                $("#calcularPromo").prop("disabled", false);
                $('#calcularPromo').html(`
                    Continuar
                `);
            }
            else {
                $('#calcularPromo').html(`
                    <i class="bi bi-box-arrow-right"></i>
                    Continuar
                `);
                console.log(data);
                estadoCampos(true);

                let respuesta = JSON.parse(data);
                console.log(respuesta);

                $('#calcularPromo').addClass("d-none");

                if (respuesta.Success == true) {
                    $('#continuarProceso').removeClass('d-none');
                    $('#corregirDatos').removeClass('d-none');
                    $("#respuestaSuccess").removeClass('d-none');
                    $('#precioPromo').html("$" + respuesta.Importe);
                    $('#fechaLimitePromo').html(respuesta.FechaFinalPromocion);
                    $("#respuestaError").addClass('d-none');
                }
                else {
                    $("#respuestaError").removeClass('d-none');
                    $('#corregirDatos').removeClass('d-none');
                    $("#respuestaError").html(respuesta.MensajeDeError);
                }
            }



        }).fail(function () {
            console.log("Algo salió mal");
        });


    }
});

