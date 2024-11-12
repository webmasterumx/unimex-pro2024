$("#form_calculadora").validate({
    // wrapper: "span",
    rules: {
        selectPlantel: {
            required: true,
        },
        selectPeriodo: {
            required: true,
        },
        selectNivel: {
            required: true,
        },
        nombreProspecto: {
            required: true,
            maxlength: 50
        },
        apellidosProspecto: {
            required: true,
            maxlength: 60
        },
        telefonoProspecto: {
            required: true,
        },
        emailProspecto: {
            required: true,
            email: true,
            maxlength: 50
        },
    },
    messages: {
        selectPlantel: {
            required: "",
        },
        selectPeriodo: {
            required: "",
        },
        selectNivel: {
            required: "",
        },
        nombreProspecto: {
            required: "Nombre obligatorio.",
            maxlength: "El número de caracteres máximo es 50."
        },
        apellidosProspecto: {
            required: "Apellidos obligatorios.",
            maxlength: "El número de caracteres máximo es 60."
        },
        telefonoProspecto: {
            required: "Teléfono obligatorio.",
            minlength: "El teléfono celular debe tener mínimo 10 dígitos.",
            maxlength: "El teléfono celular debe tener máximo 10 dígitos."
        },
        emailProspecto: {
            required: "Correo obligatorio.",
            email: "Ingresa un formato válido de correo.",
            maxlength: "El número de caracteres máximo es 50."
        },
    },
    submitHandler: function (form) {

        let nombreProspecto = $('#nombreProspecto').val().replace(/ /g, "");
        let apellidosProspecto = $('#apellidosProspecto').val().replace(/ /g, "");

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

            let selectNivelComp = $('select[name=selectNivel]').val();

            if (selectNivelComp > 1) {
                if ($('input:radio[name=typeProspecto]:checked').val() == undefined) {
                    Swal.fire({
                        icon: "error",
                        title: "Campo obligatorio",
                        text: "Por favor indica si eres egresado o no.",
                        showConfirmButton: true,
                    });
                } else {
                    envioFormularioCalculadora(form);
                }
            } else {
                if ($('input:radio[name=typeTelefono]:checked').val() == undefined) {
                    Swal.fire({
                        icon: "error",
                        title: "Campo obligatorio",
                        text: "Por favor indica de qué tipo es tu teléfono",
                        showConfirmButton: true,
                    });
                } else {
                    envioFormularioCalculadora(form);
                }
            }
        }


    }
});