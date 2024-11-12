@extends('layouts.layout')

@section('styles')
    <style>
        .text-resultados-examenes {
            color: rgba(0, 83, 154, 1.00);
            font-size: 0.8em;
            margin: 20px 0px 20px 0px;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <!-- Inicio de Resultados de Examen de Conocimientos -->
    <section class="container py-4">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 mx-auto">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('assets/img/kiosko.jpg') }}" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-8">
                <div id="instruccionesResultados" class="card w-100 shadow rounded-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 text-end">
                                <h1 class="mt-3 fw-normal" style="color: rgba(241,145,29,1.00);">RESULTADOS DEL EXAMEN DE
                                    CONOCIMIENTOS</h1>
                            </div>
                            <div class="col-12 col-md-8">
                                <p class="text-resultados-examenes m-0 mb-2">
                                    Para ver el Resultado, introduce tu Matricula con el siguiente formato:
                                </p>
                                <div class="w-100 d-flex">
                                    <div class="w-50 text-center px-2">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Formato</label>
                                            <input type="text" class="form-control form-control-sm text-center"
                                                id="exampleFormControlInput1" placeholder="XXXXXXXX-XX" disabled>
                                        </div>
                                    </div>
                                    <div class="w-50 text-center px-2">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Ejemplo</label>
                                            <input type="text" class="form-control form-control-sm text-center"
                                                id="exampleFormControlInput1" placeholder="12345678-10" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="formularioResultados" class="card mt-5 border border-primary">
                    <div class="card-body mx-auto text-center">
                        <form id="formResultados" action="{{ route('obtener.resultdos.examen') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="matriculaResultado" class="form-label"><b>Matricula</b></label>
                                <input type="text" class="form-control form-control-sm text-center"
                                    id="matriculaResultado" name="matriculaResultado">
                            </div>
                            <button type="submit" id="consultarData" class="btn btn-primary mt-2">Aceptar</button>
                        </form>
                    </div>
                </div>

                <div id="tituloResultados" class="card w-100 shadow rounded-2 d-none">
                    <div class="card-body text-center">
                        <h1 class="mt-3 fw-normal" style="color: rgba(241,145,29,1.00);">
                            Resultados del Examen de Conocimientos.
                        </h1>
                    </div>
                </div>

                <div id="resultadoACreditado" class="card mt-3 w-100 shadow rounded-2 d-none">
                    <div class="card-body">
                        <h6 class="text-center" id="nombreAcreditado" style="color: #004b93;"></h6>
                        <p>
                            Acreditado
                        </p>
                        <p style="color: #004b93;">
                            NOTA: Continúa tu proceso de Titulación e imprime la Carta de Acreditación.
                        </p>
                        <a target="_blank" id="linkImpresion" href="#" class="btn btn-warning">Imprimir Carta</a>
                    </div>
                </div>

                <div id="resultadoNoACreditado" class="card mt-3 w-100 shadow rounded-2 d-none">
                    <div class="card-body text-center">
                        <p>
                            No hay resultado para esta Matricula.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de Resultados de Examen de Conocimientos -->
@endsection

@section('scripts')
    <script>
        $("#formResultados").validate({
            rules: {
                matriculaResultado: {
                    required: true
                }
            },
            messages: {
                matriculaResultado: {
                    required: "Por favor introduce tu matricula"
                },
            },
            submitHandler: function(form) {
                $('#consultarData').html(`
                    <div style="width: 15px; height: 15px;" class="spinner-border" role="status">
                        <span class="visually-hidden">Loading..</span>
                    </div>
                    &nbsp; Consultando
                `);

                let ruta = setUrlBase() + "obtener/resultados/examen";
                let formData = new FormData(form);

                $.ajax({
                    method: "POST",
                    url: ruta,
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    //console.log(data);
                    $("#instruccionesResultados").addClass('d-none');
                    $("#formularioResultados").addClass('d-none');

                    respuesta = JSON.parse(data);
                    console.log(respuesta.ResultadoExamen);

                    $("#tituloResultados").removeClass('d-none');

                    if (respuesta.ResultadoExamen != undefined) {
                        //se obtuvo un resultado 
                        $("#resultadoACreditado").removeClass('d-none');
                        let linkImpresion = setUrlBase() + "carta/resutado/" + respuesta.ResultadoExamen
                            .Matricula;
                        $('#nombreAcreditado').html(respuesta.ResultadoExamen.Nombre);

                        $('#linkImpresion').attr("href", linkImpresion);

                    } else {
                        //no se obtuvo nada

                        $("#resultadoNoACreditado").removeClass('d-none');
                    }

                }).fail(function(e) {
                    console.log("Request: " + JSON.stringify(e));
                });
            }
        });
    </script>

    @include('include.redirecciones.outOfertaAcademica')
@endsection
