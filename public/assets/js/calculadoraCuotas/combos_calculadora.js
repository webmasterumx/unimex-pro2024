$(document).ready(function () {

    $.ajax({
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            $('#selectPlantel').append("<option value='" + value.clave + "'>" + value
                .descrip + "</option>");
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });

});

$("select[name=selectPlantel]").change(function () {

    //validar si ingresa al formulario desde cero o si ya tiene datos ingresados 
    console.log($('#folioCrm').val());
    if ($('#folioCrm').val() == "" || $('#folioCrm').val() == null) {
        console.log('es elprimer calculo');

        getPeriodos();
    }
    else {

        console.log('se hizo ya un calculo se requiere un recalculo');

        $('#grupoBotones').empty();
        $('#grupoInformacion').addClass('d-none');
        $("#selectCarrera").empty();
        $("#selectCarrera").append(`<option><div class="spinner-border" role="status"><span class="visually-hidden">Recalculando...</span></div></option>`);

        getVariablesCombosResguardadas();

    }

});

$("select[name=selectPeriodo]").change(function () {

    let nombrePeriodo = $('select[name="selectPeriodo"] option:selected').text();
    $('#periodoCrm').val(`${nombrePeriodo}`);

    //es la primera peticion o se limpio el combo de carreras

    if ($('#folioCrm').val() == "" || $('#folioCrm').val() == null) {
        console.log('es elprimer calculo, verificar si no hay variables de sesion para evitar perder la informacion');

        $.ajax({
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: setUrlBase() + "get/variables/calculadora",
        }).done(function (data) {
            console.log(data);
            if (data.nivel_calculadora != null) {
                $("#selectNivel").empty();
                $("#selectNivel").append(`<option>Recalculado...</option>`);

                let plantel = $('select[name=selectPlantel]').val();
                $.ajax({
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: setUrlBase() + "getNiveles",
                    data: {
                        plantel: plantel
                    }
                }).done(function (info) {

                    $("#selectNivel").empty();
                    $("#selectNivel").append(`<option>Seleccionar nivel</option>`);
                    console.log(info);
                    $.each(info, function (index, value) {
                        console.log(value.descrip);
                        console.log(data.nivel_calculadora);
                        if (value.descrip == data.nivel_calculadora) {
                            estado = "selected";
                            if (value.clave > 1) {
                                if ($("#selectEgresado").hasClass("d-none") === true) {
                                    $('#selectEgresado').removeClass('d-none');
                                }
                            }
                        } else {
                            estado = "";
                        }
                        $('#selectNivel').append("<option value='" + value.clave + "' " + estado + ">" + value
                            .descrip + "</option>");
                    });

                }).fail(function () {
                    console.log("Algo salió mal");
                });
            }
            else {
                getNiveles();
            }

        }).fail(function () {
            console.log("Algo salió mal");
        });
    }
    else {
        /* console.log('se hizo ya un calculo');
        let carreraResguardo = setCarreraSeleccionada();
        let nombreCarreraRes = setNombreCarrreraSaleccionada(); */
        $('#selectCarrera').empty();
        $('#selectCarrera').append(`<option><div class="spinner-border" role="status"><span class="visually-hidden">Recalculando...</span></div></option>`);
        $('#grupoBotones').empty();
        $('#grupoInformacion').addClass('d-none');

        getVariablesCombosResguardadas();
    }

});

$("select[name=selectNivel]").change(function () {
    
    establecerTextoComboCarrera();
    let nombreNivel = $('select[name="selectNivel"] option:selected').text();
    $('#nivelCrm').val(`${nombreNivel}`);

    console.log($('select[name=selectNivel]').val());

    if ($('select[name=selectNivel]').val() == 2 || $('select[name=selectNivel]').val() == 3) {
        if ($("#selectEgresado").hasClass("d-none") === true) {
            $('#selectEgresado').removeClass('d-none');
        }
    }
    else {
        if ($("#selectEgresado").hasClass("d-none") === false) {
            $('#selectEgresado').addClass('d-none');
        }
    }

    if ($('#folioCrm').val() == "" || $('#folioCrm').val() == null) {
        $('#selectCarrera').empty();
        $('#grupoBotones').empty();
        $('#grupoInformacion').addClass('d-none');


        getCarreras();
    }
    else {

        $('#selectCarrera').empty();
        $('#selectCarrera').append(`<option><div class="spinner-border" role="status"><span class="visually-hidden">Recalculando...</span></div></option>`);
        $('#grupoBotones').empty();
        $('#grupoInformacion').addClass('d-none');

        getVariablesCombosResguardadas();

    }



});

// detecta el cambio de carrera para mostrar horarios
$("select[name=selectCarrera]").change(function () {

    let carrera = $('select[name=selectCarrera]').val();
    let nombre = $('select[name="selectCarrera"] option:selected').text();

    setVariablesCombosReguardadas(carrera, nombre);

    $('#cargador_horarios').removeClass('d-none');
    $('#grupoBotones').empty();
    $('#grupoInformacion').addClass('d-none');

    obtenerHorariosBeca();
});

