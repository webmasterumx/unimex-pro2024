$(document).ready(function () {

    // Inicializar con todos los combos del formulario - Contacto -
    // Desabilitados excepto el de Plantel
    $("select[name=nivelSelect]").prop("disabled", true);
    $("select[name=periodoSelect]").prop("disabled", true);
    $("select[name=carreraSelect]").prop("disabled", true);
    $("select[name=horarioSelect]").prop("disabled", true);

    //! llamamos a a la funcion que precarga el nombre de la carrera en posicion
    //! guaradandola en una variable de session de javascript
    setCarreraInicial();

    /*
     * obtiene los planteles para el formulario de contacto.
     * Paginas :
     * - Inicio -
     * - Todas las pagina de Licenciatura, Licenciatura SUA y Postgrado -
     * - Pagina de Contacto -
     */
    $.ajax({
        method: "GET",
        url: setUrlBase() + "getPlanteles",
    }).done(function (data) {
        console.log(data);
        $.each(data, function (index, value) {
            let option = `<option value="${value.clave}">${value.descrip}</option>`;
            $('#plantelSelect').append(option);
        });

    }).fail(function () {
        console.log("Algo salió mal");
    });



    // Detecta el cambio de opcion en un select para actuar en otro
    /*
     * se activa al cambiar de plantel 
     * y se muestran los niveles
     */
    $("select[name=plantelSelect]").change(function () {
        $('#nivelSelect').empty();
        $("#nivelSelect").append(`<option value="" selected disabled>Recalculado..</option>`);

        let nivelInicalSelect = nivelPosicionado;

        console.log(nivelInicalSelect);

        let nivel = $('select[name=nivelSelect]').val();
        let ruta = setUrlBase() + "getNiveles";
        let plantel = $('select[name=plantelSelect]').val();
        let data = {
            plantel: plantel
        }
        let element = '#nivelSelect';

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ruta,
            data: data
        }).done(function (data) {

            $('#nivelSelect').empty();
            $("#nivelSelect").append(`<option value="" selected disabled>Seleccionar nivel</option>`);
            $('#periodoSelect').empty();
            $("#periodoSelect").append(`<option value="" selected disabled>Seleccionar periodo</option>`);
            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);
            $("select[name=horarioSelect]").prop("disabled", true);
            $("select[name=carreraSelect]").prop("disabled", true);

            console.log(data);
            $.each(data, function (index, value) {

                if (nivelInicalSelect == value.descrip) {
                    option = `<option value="${value.clave}" selected>${value.descrip}</option>`;
                    let plantel = $('select[name=plantelSelect]').val();
                    let ruta = setUrlBase() + "getPeriodos";
                    let data = {
                        plantel: plantel
                    };
                    let element = '#periodoSelect';

                    $.ajax({
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: ruta,
                        data: data
                    }).done(function (data) {
                        console.log(data);
                        if (data.clave == undefined || data.clave == null) {
                            $.each(data, function (index, value) {
                                let option = `<option value="${value.clave}">${value.descrip}</option>`;
                                $(element).append(option);
                            });
                        } else {
                            //selected
                            let option = `<option  value="${data.clave}">${data.descrip}</option>`;
                            $(element).append(option);
                        }

                    }).fail(function () {
                        console.log("Algo salió mal");
                    });

                    $("select[name=periodoSelect]").prop("disabled", false);

                }
                else {
                    option = `<option value="${value.clave}">${value.descrip}</option>`;
                }
                $(element).append(option);
            });

        }).fail(function () {
            console.log("Algo salió mal");
        });

        if (nivel != '' || nivel !== '' || nivel != null) {
            $("select[name=nivelSelect]").prop("disabled", false);
        } else {
            /* $("select[name=periodoSelect]").prop("disabled", true);
            $("select[name=carreraSelect]").prop("disabled", true);
            $("select[name=horarioSelect]").prop("disabled", true); */
        }

    });

    /**
     * se activa cuando se cambia de nivel 
     * y se muestran los periodos
     */
    $("select[name=nivelSelect]").change(function () {

        let plantel = $('select[name=plantelSelect]').val();
        let ruta = setUrlBase() + "getPeriodos";
        let data = {
            plantel: plantel
        };
        let element = '#periodoSelect';

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ruta,
            data: data
        }).done(function (data) {

            $('#periodoSelect').empty();
            $("#periodoSelect").append(`<option value="" selected disabled>Seleccionar periodo</option>`);
            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);

            console.log(data);
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            } else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }

        }).fail(function () {
            console.log("Algo salió mal");
        });

        $("select[name=periodoSelect]").prop("disabled", false);

    });

    /**
     * se activa cuando se cambia el periodo 
     * y muestra las carreras segun: plantel, nivel y periodo
     */
    $("select[name=periodoSelect]").change(function () {
        let carreraInicialSelect = sessionStorage.getItem("carreraPrecargada");
        $('#horarioSelect').empty();
        $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);

        let plantel = $('select[name=plantelSelect]').val();
        let nivel = $('select[name=nivelSelect]').val();
        let periodo = $('select[name=periodoSelect]').val();

        let ruta = setUrlBase() + "getCarreras";
        let data = {
            plantel: plantel,
            nivel: nivel,
            periodo: periodo
        };
        let element = '#carreraSelect';
        $('#carreraSelect').empty();
        $("#carreraSelect").append(`<option value="" selected disabled>Recalulando..</option>`);

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ruta,
            data: data
        }).done(function (data) {
            console.log(data);

            $('#carreraSelect').empty();
            $("#carreraSelect").append(`<option value="" selected disabled>Seleccionar carrera</option>`);

            $.each(data, function (index, value) {

                console.log(carreraInicialSelect);
                console.log(value.descrip);

                if (carreraInicialSelect.trim() == value.descrip.trim()) {
                    option = `<option value="${value.clave}" selected>${value.descrip}</option>`;

                } else {
                    option = `<option value="${value.clave}">${value.descrip}</option>`;
                }
                $('#carreraSelect').append(option);
            });

            let plantel = $('select[name=plantelSelect]').val();
            let nivel = $('select[name=nivelSelect]').val();
            let periodo = $('select[name=periodoSelect]').val();
            let carrera = $('select[name=carreraSelect]').val();

            let ruta = setUrlBase() + "getHorarios";
            let campos = {
                plantel: plantel,
                nivel: nivel,
                periodo: periodo,
                carrera: carrera
            };
            let element = '#horarioSelect';

            postAjaxPeticionContact(ruta, campos, element);

        }).fail(function () {
            console.log("Algo salió mal");
        });

        $("select[name=horarioSelect]").prop("disabled", false);
        $("select[name=carreraSelect]").prop("disabled", false);
    });

    /**
     * se activa cuando se cambia la carrera seccionada
     * y se muestran los horarios disponibles
     */
    $("select[name=carreraSelect]").change(function () {


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
        let element = '#horarioSelect';

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: ruta,
            data: data
        }).done(function (data) {
            $('#horarioSelect').empty();
            $("#horarioSelect").append(`<option value="" selected disabled>Seleccionar horario</option>`);
            console.log(data);
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            } else {
                option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }


        }).fail(function () {
            console.log("Algo salió mal");
        });

        $("select[name=horarioSelect]").prop("disabled", false);

    });
});

function setNivelInicial() {
    let valor = $('select[name="nivelSelect"] option:selected').text();

    return valor;
}

function setCarreraInicial() {
    let carrera = $('select[name="carreraSelect"] option:selected').text();
    console.log(carrera);
    sessionStorage.setItem("carreraPrecargada", carrera);
}

function postAjaxPeticionContact(ruta, data, element) {
    $.ajax({
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ruta,
        data: data
    }).done(function (data) {
        console.log(data);
        if (data.error == undefined || data.error == null) {
            if (data.clave == undefined || data.clave == null) {
                $.each(data, function (index, value) {
                    let option = `<option value="${value.clave}">${value.descrip}</option>`;
                    $(element).append(option);
                });
            } else {
                let option = `<option value="${data.clave}">${data.descrip}</option>`;
                $(element).append(option);
            }
        }

    }).fail(function () {
        console.log("Algo salió mal");
    });
}
