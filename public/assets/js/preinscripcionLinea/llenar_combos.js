function llenaComboPlantel(clavePlantel) {
    $('#textCargaPreinscripcion').html('Obteniendo oferta académica..');

    let ruta = setUrlBase() + 'getPlanteles';

    $.ajax({
        url: ruta,
        method: "GET",
        dataType: 'json',
    }).done(function (data) {
        $("#plantelSelect").empty();
        const plateles = data;
        let option_default = `<option value="" disabled>Selecionar plantel</option>`;
        if (plateles != undefined) {
            $("#plantelSelect").append(option_default); //se establece el plantel por defecto
            for (let index = 0; index < plateles.length; index++) { //recorrer el array de planteles
                const element = plateles[index]; // se establece un elemento por plantel optenida
                let option = `<option value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por campaña
                $("#plantelSelect").append(option); // se inserta la platel de cada elemento
            }
        }
        else {
            $("#plantelSelect").append(option_default);
        }
        $("#plantelSelect option[value=" + clavePlantel + "]").attr("selected", true);

    }).fail(function (e) {
        console.log("Request: " + JSON.stringify(e));
    });
}

function llenarComboCampañas(claveCampana, clavePlantel) {
    let ruta = setUrlBase() + 'getPeriodos';

    data = {
        plantel: clavePlantel
    }

    $.ajax({
        url: ruta,
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        data: data,
    }).done(function (data) {
        $("#periodoSelect").empty();
        const campañas = data;
        console.log(campañas);
        let option_default = `<option value="" disabled>Seleccionar periodo</option>`;
        if (campañas != undefined) {
            console.log(campañas.clave);

            if (campañas.clave == undefined || campañas.clave == null) {

                $("#periodoSelect").append(option_default); //se establece la campaña por defecto
                for (let index = 0; index < campañas.length; index++) { //recorrer el array de campañas
                    const element = campañas[index]; // se establece un elemento por campaña optenida
                    let option = `<option value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por campaña
                    $("#periodoSelect").append(option); // se inserta la campaña de cada elemen  to
                }

            } else {
                
                let option = `<option value="${campañas.clave}">${campañas.descrip}</option>`; //se establece la opcion por campaña
                $("#periodoSelect").append(option); // se inserta la campaña de cada elemen  to
                
            }


        }
        else {
            $("#periodoSelect").append(option_default);
        }

        $("#periodoSelect option[value=" + claveCampana + "]").attr("selected", true);

    }).fail(function (e) {
        console.log("Request: " + JSON.stringify(e));
    });

}

function llenarComboNivel(clavePlantel, claveNivel) {
    let ruta = setUrlBase() + "getNiveles";

    let data = {
        plantel: clavePlantel,
    }

    $.ajax({
        url: ruta,
        method: "POST",
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data
    }).done(function (data) {
        const niveles = data;
        let option_default = `<option value="" disabled>Selecionar nivel</option>`;
        if (niveles != undefined) {
            $("#nivelSelect").empty();
            $("#nivelSelect").append(option_default); //se establece la campaña por defecto
            for (let index = 0; index < niveles.length; index++) { //recorrer el array de campañas
                const element = niveles[index]; // se establece un elemento por campaña optenida
                let option = `<option value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por campaña
                $("#nivelSelect").append(option); // se inserta la campaña de cada elemen  to
            }
        }
        else {
            $("#nivelSelect").append(option_default);
        }

        $("#nivelSelect option[value=" + claveNivel + "]").attr("selected", true);

    }).fail(function (e) {
        console.log("Request: " + JSON.stringify(e));
    });
}

function llenarCombosCarrera(claveCampana, clavePlantel, claveNivel, claveCarrera) {
    let ruta = setUrlBase() + 'preinscripcion/get/carreras';

    let data = {
        plantel: clavePlantel,
        nivel: claveNivel,
        periodo: claveCampana
    }
    console.log(data);
    $.ajax({
        url: ruta,
        method: "POST",
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data
    }).done(function (data) {
        $("#carreraSelect").empty();
        const carreras = data.CarerrasDTO;
        console.log(carreras);
        let option_default = `<option value="" disabled>Selecionar carrera</option>`;
        if (carreras != undefined) {
            $("#carreraSelect").append(option_default); //se establece la campaña por defecto
            for (let index = 0; index < carreras.length; index++) { //recorrer el array de campañas
                const element = carreras[index]; // se establece un elemento por campaña optenida
                let option = `<option value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por campaña
                $("#carreraSelect").append(option); // se inserta la campaña de cada elemen  to
            }
        }
        else {
            $("#carreraSelect").append(option_default);
        }

        $("#carreraSelect option[value=" + claveCarrera + "]").attr("selected", true);

    }).fail(function (e) {
        console.log("Request: " + JSON.stringify(e));
    });
}

function llenarComboHorarios(claveCampana, clavePlantel, claveNivel, claveCarrera, claveHorario) {

    let ruta = setUrlBase() + "getHorarios";

    let data = {
        plantel: clavePlantel,
        nivel: claveNivel,
        periodo: claveCampana,
        carrera: claveCarrera,
    }
    console.log(data);

    $.ajax({
        url: ruta,
        method: "POST",
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data
    }).done(function (data) {
        $("#horarioSelect").empty();
        const horarios = data;
        console.log(data);
        let option_default = `<option value="" disabled>Selecionar horario</option>`;
        if (horarios != undefined) {
            $("#horarioSelect").append(option_default); //se establece la campaña por defecto
            for (let index = 0; index < horarios.length; index++) { //recorrer el array de campañas
                const element = horarios[index]; // se establece un elemento por campaña optenida
                let option = `<option value="${element.clave}">${element.descrip}</option>`; //se establece la opcion por campaña
                $("#horarioSelect").append(option); // se inserta la campaña de cada elemen  to
            }
        }
        else {
            $("#horarioSelect").append(option_default);
        }
        $("#horarioSelect option[value=" + claveHorario + "]").attr("selected", true);

        $('#modalCarga').modal('hide');

    }).fail(function (e) {
        console.log("Request: " + JSON.stringify(e));
    });
}