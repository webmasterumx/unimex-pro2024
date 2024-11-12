$("#telefono").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$("#telefonoInscripcion").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$("#telefonoCelInscripcion").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

function estadoCampos(estado) {
    //disable campos 
    $("#nombreInscripcion").prop("disabled", estado);
    $("#apellidoPatInscripcion").prop("disabled", estado);
    $("#apellidoMatInscripcion").prop("disabled", estado);
    $("#telefonoInscripcion").prop("disabled", estado);
    $("#telefonoCelInscripcion").prop("disabled", estado);
    $("#calleInscripcion").prop("disabled", estado);
    $("#numeroInscripcion").prop("disabled", estado);
    $("#coloniaInscripcion").prop("disabled", estado);
    $("#estadoInscripcion").prop("disabled", estado);
    $("#municipioInscripcion").prop("disabled", estado);
    $("#plantelSelect").prop("disabled", estado);
    $("#periodoSelect").prop("disabled", estado);
    $("#nivelSelect").prop("disabled", estado);
    $("#carreraSelect").prop("disabled", estado);
    $("#horarioSelect").prop("disabled", estado);
    $("#diaNacimiento").prop("disabled", estado);
    $("#mesNacimiento").prop("disabled", estado);
    $("#yearNacimiento").prop("disabled", estado);
}

function agregarProspecto() {

    let ruta = setUrlBase() + "registrar/prospecto/preinscripcion/linea";
    let fechaNacimiento = $('select[name=diaNacimiento]').val() + '-' + $('select[name=mesNacimiento]').val() + '-' + $('select[name=yearNacimiento]').val();

    let data = {
        Email: $('#correoInscripcion').val(),
        Nombre: $('#nombreInscripcion').val(),
        ApPaterno: $('#apellidoPatInscripcion').val(),
        ApMaterno: $('#apellidoMatInscripcion').val(),
        Telefono: $('#telefonoInscripcion').val(),
        Celular: $('#telefonoCelInscripcion').val(),
        Calle: $('#calleInscripcion').val(),
        NumeroCalle: $('#numeroInscripcion').val(),
        Colonia: $('#coloniaInscripcion').val(),
        EstadoID: $('select[name=estadoInscripcion]').val(),
        MunicipioID: $('select[name=municipioInscripcion]').val(),
        PlantelID: $('select[name=plantelSelect]').val(),
        ClavePeriodo: $('select[name=periodoSelect]').val(),
        ClaveNivel: $('select[name=nivelSelect]').val(),
        ClaveCarrera: $('select[name=carreraSelect]').val(),
        ClaveTurno: $('select[name=horarioSelect]').val(),
        UtpSource: "",
        DescripCampPublicidad: "",
        CampaignMedium: "",
        CampaignTerm: "",
        CampaignContent: "",
        WebSiteURL: "https://unimex.edu.mx",
        FechaDeNacimiento: fechaNacimiento,
    };

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        console.log(data);

    }).fail(function () {
        console.log("Algo salió mal");
    });

}

function correccionDatos() {
    estadoCampos(false);

    $("#calcularPromo").prop("disabled", false);
    $('#continuarProceso').addClass('d-none');
    $('#corregirDatos').addClass('d-none');
    $("#respuestaSuccess").addClass('d-none');
    $('#calcularPromo').removeClass('d-none');
}

function setVariablesPrecargadas() {

    $.ajax({
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "get/variables/preinscripcion",
    }).done(function (data) {
        console.log(data);
        if (data.carrera_preinscripcion != null) {
            console.log('hay variable de session para este modulo');

            carreraFinal = data.carrera_preinscripcion.replaceAll("_", " ");

            $("#nivelSelect").empty();
            $('#nivelSelect').append("<option selected value=''>" + data.nivel_preinscripcion + "</option>");

            $("#carreraSelect").empty();
            $('#carreraSelect').append("<option selected value=''>" + carreraFinal + "</option>");
        }
        else {
            $("#nivelSelect").empty();
            $('#nivelSelect').append(`<option value="" selected disabled>Seleccionar nivel</option>`);

            $("#carreraSelect").empty();
            $('#carreraSelect').append(`<option value="" selected disabled>Seleccionar carrera</option>`);
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function recalculoDeComboNivel(ruta, data, element, info) {
    //! iniciamos los combos de nivel y carrera

    //! realizamos la peticion correspondiente para obtener los niveles
    //! y hacer la comparacion con la variable precargada

    $('#nivelSelect').empty();
    $("#nivelSelect").append(`<option value="" selected>Recalculando..</option>`);

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        console.log(data);
        $('#nivelSelect').empty();
        $("#nivelSelect").append(`<option value="" disabled>Seleccionar nivel</option>`);
        $('#carreraSelect').empty();
        $("#carreraSelect").append(`<option value="" selected disabled>${info.carrera_preinscripcion.replaceAll("_", " ")}</option>`);
        $.each(data, function (index, value) {
            if (info.nivel_preinscripcion == value.descrip) {
                option = `<option value="${value.clave}" selected>${value.descrip}</option>`;
            } else {
                option = `<option value="${value.clave}">${value.descrip}</option>`;
            }
            $(element).append(option);
        });

        //! terminada la peticion calculamos las carreras y se hace la comparacion la variable precargada
        let plantel = $('select[name=plantelSelect]').val();
        let nivel = $('select[name=nivelSelect]').val();
        let periodo = $('select[name=periodoSelect]').val();

        let rutaGetCarreras = setUrlBase() + "getCarreras";

        let dataCarreras = {
            plantel: plantel,
            nivel: nivel,
            periodo: periodo
        };
        let elementCarreras = '#carreraSelect';

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: rutaGetCarreras,
            data: dataCarreras
        }).done(function (result) {

            $('#carreraSelect').empty();
            $("#carreraSelect").append(`<option value="" selected disabled>Seleccionar carrera</option>`);

            console.log(result);

            if (result.error == undefined || result.error == null) {
                $.each(result, function (index, value) {

                    if (info.carrera_preinscripcion.replaceAll('_', " ") == value.descrip) {
                        option = `<option value="${value.clave}" selected>${value.descrip}</option>`;
                    } else {
                        option = `<option value="${value.clave}">${value.descrip}</option>`;
                    }

                    $(elementCarreras).append(option);
                });
            } else {

            }

            $("select[name=carreraSelect]").prop("disabled", false);

            //! calculo de lista de horarios 

            let carrera = $('select[name=carreraSelect]').val();

            let rutaCarrera = setUrlBase() + "getHorarios";
            let dataCarrera = {
                plantel: plantel,
                nivel: nivel,
                periodo: periodo,
                carrera: carrera
            };
            let elementCarrera = '#horarioSelect';

            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: rutaCarrera,
                data: dataCarrera
            }).done(function (list) {
                console.log(list);
                $.each(list, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(elementCarrera).append(option);
                });

                $("select[name=horarioSelect]").prop("disabled", false);

            }).fail(function () {
                console.log("Algo salió mal");
            });

        }).fail(function () {
            console.log("Algo salió mal");
        });



    }).fail(function () {
        console.log("Algo salió mal");
    });
}

/**
 * este metodo se colocora despues del segundo click a continuar para el registro de la bitacora 
 * de actividades 
 * 
 * comnetar cada cosa en nuestro diario de notas
 * no perder detalle
 * 
 */
function guardarBitacora() {
    let folioCRM = "";
    let actRealizada = "";
    let estatusDetalle = "";
    let tipoContacto = "";
    let fechaAgenda = "";
    let idRangoHr = "";
    let asistioPlantel = "";
    let actividad = "";
    let claveUsuario = "";

    let ruta = setUrlBase() + "guardar/bitacora/preinscripcion";

    let data = {
        folioCRM: folioCRM,
        actRealizada: actRealizada,
        estatusDetalle: estatusDetalle,
        tipoContacto: tipoContacto,
        fechaAgenda: fechaAgenda,
        idRangoHr: idRangoHr,
        asistioPlantel: asistioPlantel,
        actividad: actividad,
        claveUsuario: claveUsuario
    };

    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        console.log(data);

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function aceptoAgendar() {

    $("#aceptarActividad").prop("disabled", true);
    $('#aceptarActividad').html(`
        <div style="width: 20px !important; height: 20px !important;"
        class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Agendando Llamada
    `);

    let ruta = setUrlBase() + "agendar/actividad/preinscripcion";

    $.ajax({
        method: "GET",
        url: ruta,
        dataType: "html",
    }).done(function (data) {
        console.log(data);

        $("#aceptarActividad").prop("disabled", false);
        $('#aceptarActividad').html(`
            Si
        `);

        $('#redireccionPEL').html(`
            Preinscripción en Linea
        `);

        $('#statictConfirmPreinscripcion').modal('hide');

        Swal.fire("Llamada agendada, más tarde uno de nuestros asesores se comunicara contigo.", "", "success");

    }).fail(function () {
        console.log("Algo salió mal");
    });


}

function rechazoAgendar() {

    $('#redireccionPEL').html(`
        Preinscripción en Linea
    `);

    $('#statictConfirmPreinscripcion').modal('hide');

    Swal.fire("¡Proceso Terminado!", "", "error");

}

function registrarProspectoPreinscripcionEnLinea() {

    $("#corregirDatos").prop("disabled", true);
    $("#continuarProceso").prop("disabled", true);
    $('#continuarProceso').html(`
        <div style="width: 20px !important; height: 20px !important;"
        class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        Registrando datos
    `);

    let ruta = setUrlBase() + "registrar/prospecto/preinscripcion/linea";

    $.ajax({
        method: "GET",
        url: ruta,
        dataType: "html",
    }).done(function (data) {

        console.log(data);

        let response = JSON.parse(data);

        console.log(response);

        if (response.estado == true) {

            Swal.fire({
                icon: "success",
                title: "Registro exitoso",
                text: response.mensaje,
            });

            let redireccionamiento = setUrlBase() + "preinscripcionEnLinea/forma_de_pago";

            setTimeout(function () {
                window.location.href = redireccionamiento;
            }, 3000);

        } else {
            Swal.fire({
                icon: "error",
                title: "Registro invalido",
                text: response.mensaje,
            });

            $("#continuarProceso").prop("disabled", false);
            $('#continuarProceso').html(`
                Continuar
            `);
        }



    }).fail(function () {
        console.log("Algo salió mal");
    });
}
