//! Archivo de configuración de combos para el formulario de informes para páginas que no sean Oferta Académica

// Inicializar con todos los combos del formulario - Contacto 
$(document).ready(function () {

    // Desabilitados excepto el de Plantel
    $("select[name=nivelSelect]").prop("disabled", true);
    $("select[name=periodoSelect]").prop("disabled", true);
    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);

    /** 
     * Obtiene los planteles para el formulario de contacto.
     * @page - Inicio -
     * @page - Pagina de Contacto -
     */
    $.ajax({
        method: "GET",
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        $.each(data, function (index, value) {
            let option = `<option value="${value.clave}">${value.descrip}</option>`;
            $('#plantelSelect').append(option);
        });

    }).fail(function (jqXHR, textStatus, errorThrown) {

        errorPeticionesCombos(jqXHR, textStatus)

    });

});

/**
 * 
 * Se activa al cambiar de plantel y se muestran los niveles
 * @param element - Id del siguiente elemento directamente afectado por el cambio de este combo.
 * @param ruta - Url de la petición para obtener la informacion que se mostrara en el siguiente combo.
 * @param data - Información que se enviara en la petición.
 * @param listaCombos - Array con los nombres de los elementos html de los combos posteriores.
 * @param listaNombres - Array con los nombres que se deben imprimir en los combos posteriores.
 * 
 */
$("select[name=plantelSelect]").change(function () {

    let element = 'nivelSelect';

    limpiarComboParaCalculo(element)

    let ruta = setUrlBase() + "getNiveles";
    let plantel = $('select[name=plantelSelect]').val();
    let data = {
        plantel: plantel
    }

    let listaCombos = ["nivelSelect", "periodoSelect", "carreraSelect", "horarioSelect"];
    let listaNombres = ["nivel", "periodo", "carrera", "horario"];

    peticionInfoCamboPosterior(element, ruta, data, listaCombos, listaNombres);

});

$("select[name=nivelSelect]").change(function () {

    let element = 'periodoSelect';

    limpiarComboParaCalculo(element)

    let plantel = $('select[name=plantelSelect]').val();
    let ruta = setUrlBase() + "getPeriodos";
    let data = {
        plantel: plantel
    };

    let listaCombos = ["periodoSelect", "carreraSelect", "horarioSelect"];
    let listaNombres = ["periodo", "carrera", "horario"];

    peticionInfoCamboPosterior(element, ruta, data, listaCombos, listaNombres);

});

$("select[name=periodoSelect]").change(function () {

    let element = 'carreraSelect';

    limpiarComboParaCalculo(element);

    let plantel = $('select[name=plantelSelect]').val();
    let nivel = $('select[name=nivelSelect]').val();
    let periodo = $('select[name=periodoSelect]').val();

    let ruta = setUrlBase() + "getCarreras";
    let data = {
        plantel: plantel,
        nivel: nivel,
        periodo: periodo
    };

    let listaCombos = ["carreraSelect", "horarioSelect"];
    let listaNombres = ["carrera", "horario"];

    peticionInfoCamboPosterior(element, ruta, data, listaCombos, listaNombres);

});

$("select[name=carreraSelect]").change(function () {

    let element = 'horarioSelect';

    limpiarComboParaCalculo(element);

    let plantel = $('select[name=plantelSelect]').val();
    let nivel = $('select[name=nivelSelect]').val();
    let periodo = $('select[name=periodoSelect]').val();
    let carrera = $('select[name=carreraSelect]').val();

    let ruta = setUrlBase() + "getHorarios";
    let data = {
        plantel: plantel,
        nivel: nivel,
        periodo: periodo,
        carrera: carrera
    };

    let listaCombos = ["horarioSelect"];
    let listaNombres = ["horario"];

    peticionInfoCamboPosterior(element, ruta, data, listaCombos, listaNombres);

});


function peticionInfoCamboPosterior(element, ruta, data, listaCombos, listaNombres) {
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {

        limpiarCombos(listaCombos, listaNombres);

        if (data.error == undefined || data.error == null) {
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(`#` + element).append(option);
                });
            } else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(`#` + element).append(option);
            }
        }

        $(`select[name=${element}]`).prop("disabled", false);

    }).fail(function (jqXHR, textStatus, errorThrown) {

        errorPeticionesCombos(jqXHR, textStatus)

    });
}

function limpiarComboParaCalculo(element) {
    $(`#` + element).empty();
    $(`#` + element).append(`<option value="" selected disabled> Calculando.. </option>`);
}

function limpiarCombos(listaCombos = [], listaNombres = []) {

    for (let index = 0; index < listaCombos.length; index++) {

        const element = listaCombos[index];
        const nombre = listaNombres[index];

        const value = $(`select[name=${element}]`).val();

        if (value != "" || value != null || value != undefined) {
            $('#' + element).empty();
            $('#' + element).append(`<option value="" selected disabled> - Seleccionar ${nombre} -</option>`);
            //$(`select[name=${element}]`).prop("disabled", true);
        }

    }
}

function errorPeticionesCombos(jqXHR, textStatus) {
    let mensaje = "";
    let typeAlert = "";

    if (jqXHR.status === 0) {

        mensaje = `No tienes conexión a internet.`;
        typeAlert = "warning";

    } else if (jqXHR.status == 404) {

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.`;
        typeAlert = "danger";

    } else if (jqXHR.status == 500) {

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.`;
        typeAlert = "danger";

    }
    else if (jqXHR.status == 503) {

        mensaje = `Sitio en mantenimiento intenta mas tarde.`;
        typeAlert = "info";

    }
    else if (textStatus === 'parsererror') {

        console.log('Requested JSON parse failed.');

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.`;
        typeAlert = "danger";

    } else if (textStatus === 'timeout') {

        console.log('Time out error.');

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.`;
        typeAlert = "danger";

    } else if (textStatus === 'abort') {

        console.log('Ajax request aborted.');

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.`;
        typeAlert = "danger";

    } else {

        console.log('Uncaught Error: ' + jqXHR.responseText);

        mensaje = `Ups! <br> Ocurrio un error en el servidor! <br> Intenta de nuevo recargando la pagina.`;
        typeAlert = "danger";

    }

    let alerta = `
        <div class="alert alert-${typeAlert} alert-dismissible fade show mt-2" role="alert">
            ${mensaje}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    `;

    $("#alertasErrorCombos").append(alerta);
    $("#contenedorAlerta").removeClass("d-none");
}