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

function getPeriodos() {
    $("#selectPeriodo").empty();
    $("#selectPeriodo").append(`<option>¿Cuándo deseas iniciar?</option>`);

    let plantel = $('select[name=selectPlantel]').val();
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: setUrlBase() + "getPeriodos",
        data: {
            plantel: plantel
        }
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            let option = `<option value="${value.clave}">${value.descrip}</option>`;
            $('#selectPeriodo').append(option);
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function getNiveles() {

    $("#selectNivel").empty();
    $("#selectNivel").append(`<option>Selecciona el Nivel</option>`);

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
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            let option = `<option value="${value.clave}">${value.descrip}</option>`;
            $('#selectNivel').append(option);
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });
}

function getCarreras() {

    $("#selectCarrera").empty();
    $("#selectCarrera").append(`<option><div class="spinner-border" role="status"><span class="visually-hidden">Calculando...</span></div></option>`);

    let clavePlantel = $('select[name=selectPlantel]').val();
    let clavePeriodo = $('select[name=selectPeriodo]').val();
    let claveNivel = $('select[name=selectNivel]').val();

    let data = {
        "plantel": clavePlantel,
        "nivel": claveNivel,
        "periodo": clavePeriodo
    }
    console.log(data);

    let ruta = setUrlBase() + "getCarreras";

    $.ajax({
        method: "POST",
        url: ruta,
        dataType: "json",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (data) {
        console.log(data);
        $("#selectCarrera").empty();
        $("#selectCarrera").append(`<option class="text-center" value=""> - Selecciona una Carrera - </option>`);
        for (let index = 0; index < data.length; index++) { //recorrer el array de carreras
            const element = data[index]; // se establece un elemento por carrera optenida
            let option = `<option class="text-center" value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por carrera
            $("#selectCarrera").append(option); // se inserta la carrera de cada elemento
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });
}