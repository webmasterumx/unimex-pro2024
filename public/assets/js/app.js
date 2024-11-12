
$("#celular_prospecto").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


$("#telefono_prospecto").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$("#celularFolleto").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$('#aceptar_contacto').on('click', function () {
    if ($(this).is(':checked')) {
        // Hacer algo si el checkbox ha sido seleccionado
        //console.log("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
        $('#envio_contacto').attr('disabled', false);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        //console.log("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
        $('#envio_contacto').attr('disabled', true);
    }
});

$("#telefono_casa_trabaja").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


$("#telefono_movil_trabaja").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$("#telefono_casa_qys").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


$("#telefono_movil_qys").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

function establecerTipoDeEmpresaOCC(type) {

    $('#type_empresaOCC').val(type);

    $('#number7').val(Math.floor(Math.random() * 10));
    $('#number8').val(Math.floor(Math.random() * 10));

    if (type == 1) //si tiene cuenta
    {
        $('#empresasOCCLabel').html('Empresas Registradas en OCC');
        $('#parrafoEmpresasOCC').html('Ingresa los datos de tu empresa para publicar tus vacantes.');
    }
    else // no tiene cuenta
    {
        $('#empresasOCCLabel').html('Registra tu Empresa en OCC');
        $('#parrafoEmpresasOCC').html('Ingresa los datos de tu empresa para publicar tus vacantes. Regístrate como empresa aquí.');
    }

}

$("#telefono_empresaOCC").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


$("#celular_empresaOCC").bind('keypress', function (event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

function resetForms(formulario) {
    switch (formulario) {
        case 1:
            $("#name_service").val("");
            $("#email_service").val("");
            $("#phone_casa_service").val("");
            $("#movil_service").val("");
            $("#asunto_service").val("");
            $("#matricula_service").val("");
            $("#mensaje_service").val("");
            $("#operacion_service").val("");

            $("#select_plantel").empty();
            $("#select_plantel").append(`<option value="" selected>Selecciona tu Plantel</option>`);
            $("#select_plantel").append(`<option value="IZCALLI">IZCALLI</option>`);
            $("#select_plantel").append(`<option value="SATÉLITE">SATÉLITE</option>`);
            $("#select_plantel").append(`<option value="POLANCO">POLANCO</option>`);
            $("#select_plantel").append(`<option value="VERACRUZ">VERACRUZ</option>`);

            $('#number1').val(Math.floor(Math.random() * 10));
            $('#number2').val(Math.floor(Math.random() * 10));
            break;

        case 2:
            $("#nombre_trabajo").val("");
            $("#email_trabaja").val("");
            $("#telefono_casa_trabaja").val("");
            $("#telefono_movil_trabaja").val("");
            $("#puesto_interes").val("");
            $("#experiencia_trabaja").val("");
            $("#cv_trabaja").val("");
            $("#operacion_trabaja").val("");

            $("#plantel_trabaja").empty();
            $("#plantel_trabaja").append(`<option value="" selected>Selecciona tu Plantel</option>`);
            $("#plantel_trabaja").append(`<option value="IZCALLI">IZCALLI</option>`);
            $("#plantel_trabaja").append(`<option value="SATÉLITE">SATÉLITE</option>`);
            $("#plantel_trabaja").append(`<option value="POLANCO">POLANCO</option>`);
            $("#plantel_trabaja").append(`<option value="VERACRUZ">VERACRUZ</option>`);

            $("#nivel_est_trabaja").empty();
            $("#nivel_est_trabaja").append(`<option value="" selected>Selecciona Nivel</option>`);
            $("#nivel_est_trabaja").append(`<option value="Secundaria">SECUNDARIA</option>`);
            $("#nivel_est_trabaja").append(`<option value="Preparatoria">PREPARATORIA</option>`);
            $("#nivel_est_trabaja").append(`<option value="Licenciatura Titulado">LICENCIATURA TITULADO</option>`);
            $("#nivel_est_trabaja").append(`<option value="Licenciatura Pasante">LICENCIATURA PASANTE</option>`);
            $("#nivel_est_trabaja").append(`<option value="Posgrado">POSGRADO</option>`);

            $("#number3").val(Math.floor(Math.random() * 10));
            $("#number4").val(Math.floor(Math.random() * 10));
            break;

        case 3:
            $("#nombre_qys").val("");
            $("#mail_qys").val("");
            $("#telefono_casa_qys").val("");
            $("#telefono_movil_qys").val("");
            $("#matricula_qys").val("");
            $("#asunto_qys").val("");
            $("#mensaje_qys").val("");
            $("#operacion_qys").val("");

            $("#number5").val(Math.floor(Math.random() * 10));
            $("#number6").val(Math.floor(Math.random() * 10));
            break;

        case 4:
            $("#nombre_empresaOCC").val("");
            $("#contacto_empresaOCC").val("");
            $("#email_empresaOCC").val("");
            $("#telefono_empresaOCC").val("");
            $("#celular_empresaOCC").val("");
            $("#razon_empresaOCC").val("");
            $("#rfc_empresaOCC").val("");
            $("#comentarios_empresaOCC").val("");
            $("#operacion_empresaOCC").val("");

            $("#number7").val(Math.floor(Math.random() * 10));
            $("#number8").val(Math.floor(Math.random() * 10));
            break;
        default:
            break;
    }
}

function cambioImagen(posicion, element) {

    if (posicion == 1) {

        $("#opacity_1").addClass('d-none');
        $("#testimonio_1").removeClass('d-none');

        $("#opacity_2").removeClass('d-none');
        $("#testimonio_2").addClass('d-none');

        $("#opacity_3").removeClass('d-none');
        $("#testimonio_3").addClass('d-none');

    }
    else if (posicion == 2) {

        $("#opacity_1").removeClass('d-none');
        $("#testimonio_1").addClass('d-none');

        $("#opacity_2").addClass('d-none');
        $("#testimonio_2").removeClass('d-none');

        $("#opacity_3").removeClass('d-none');
        $("#testimonio_3").addClass('d-none');

    }
    else if (posicion == 3) {
        $("#opacity_1").removeClass('d-none');
        $("#testimonio_1").addClass('d-none');

        $("#opacity_2").removeClass('d-none');
        $("#testimonio_2").addClass('d-none');

        $("#opacity_3").addClass('d-none');
        $("#testimonio_3").removeClass('d-none');
    }


}

function limitarInputLetras(element) {

    let elemento = "#" + element;

    $(elemento).keypress(function (tecla) {
        if ((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 45) && (tecla.charCode != 32) && (tecla.charCode != 241)) return false;
    });
}