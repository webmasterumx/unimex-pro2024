$("#form_calculadora").validate({
    wrapper: "span",
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
        },
        apellidosProspecto: {
            required: true,
        },
        telefonoProspecto: {
            required: true,
        },
        emailProspecto: {
            required: true,
            email: true,
        },
    },
    messages: {
        selectPlantel: {
            required: "selecciona un plantel",
        },
        selectPeriodo: {
            required: "selecciona un periodo",
        },
        selectNivel: {
            required: "selecciona un nivel",
        },
        nombreProspecto: {
            required: "ingresa tu cnombre",
        },
        apellidosProspecto: {
            required: "ingresa tus apellidos",
        },
        telefonoProspecto: {
            required: "ingresa tu telefono",
        },
        emailProspecto: {
            required: "ingresa tu correo",
            email: "formato de correo incorrecto",
        },
    },
    submitHandler: function (form) {
        $('#informacion').addClass('d-none');
        $('#cargador').removeClass('d-none');

        let formData = new FormData(form);
        let ruta = setUrlBase() + "insertar/prospecto/calculadora";

        $.ajax({
            method: "POST",
            url: ruta,
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (data) {
            let respuesta = JSON.parse(data);
            console.log(respuesta);

            let nombreProspecto = $('#nombreProspecto').val() + " " + $('#apellidosProspecto').val();
            let periodoProspecto = $('select[name="selectPeriodo"] option:selected').text();
            let nivelProspecto = $('select[name="selectNivel"] option:selected').text();

            $('#folioCrm').val('Folio: ' + respuesta.FolioCRM);
            $('#nombreCrm').val(nombreProspecto);
            $('#periodoCrm').val(periodoProspecto);
            $('#nivelCrm').val(nivelProspecto);

            getCarreras();

            $('#cargador').addClass('d-none');
            $('#calculadora').removeClass('d-none');

        }).fail(function () {
            console.log("Algo salió mal");
        }); 



    }
});