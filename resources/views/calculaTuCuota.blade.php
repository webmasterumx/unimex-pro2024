@extends('layouts.layout0')

@section('content')
    <section class="container-fluid pt-2 px-5">
        <div class="row">
            <div class="col-12 col-md-8"></div>
            <div id="mensajeCorrreo" class="col-12 col-md-4">
            </div>
            <div class="col-12 col-md-3 col-lg-3 px-3" style="background-color: rgba(0, 75, 174, 30%);">
                <form id="form_calculadora" class="row p-3">
                    @method('PUT')
                    @csrf
                    <h6>¿Cuándo te gustaría iniciar?</h6>
                    <hr>
                    <select class="form-select form-select-sm col-12 mb-2" name="selectPlantel" id="selectPlantel">
                        <option value="" selected disabled>Selecciona el Plantel</option>
                    </select>
                    <select class="form-select form-select-sm col-12 mb-2" name="selectPeriodo" id="selectPeriodo">
                        <option value="" selected disabled>¿Cuándo deseas iniciar?</option>
                    </select>
                    <select class="form-select form-select-sm col-12 mb-2" name="selectNivel" id="selectNivel">
                        <option value="" selected disabled>Selecciona el Nivel</option>
                    </select>
                    <div class="col-12 row mb-5 d-none" id="selectEgresado">
                        <div class="col-7 p-0">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeProspecto" id="egresado"
                                    value="1">
                                <label style="font-size: 12px;" class="form-check-label" for="egresado">Soy Egresado
                                    Unimex</label>
                            </div>
                        </div>
                        <div class="col-5 p-0 mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeProspecto" id="noEgresado"
                                    value="0">
                                <label style="font-size: 12px;" class="form-check-label" for="noEgresado">Otra
                                    Institución</label>
                            </div>
                        </div>
                    </div>

                    <h5>Personaliza Tu Beca</h5>
                    <hr>
                    <div class="mb-2 p-0 col-6">
                        <input type="text" class="form-control form-control-sm" id="nombreProspecto"
                            name="nombreProspecto" placeholder="Nombre (Obligatorio)" maxlength="50">
                    </div>
                    <div class="mb-2 p-0 col-6">
                        <input type="text" class="form-control form-control-sm" id="apellidosProspecto"
                            name="apellidosProspecto" placeholder="Apellidos (Obligatorio)" maxlength="60">
                    </div>
                    <div class="input-group mb-2 col-12 p-0 mb-1">
                        <div class="input-group-text">
                            <i class="bi bi-telephone-fill"></i> &nbsp;&nbsp;
                            <input class="form-check-input" type="radio" name="typeTelefono" id="telefono_celular"
                                value="1">
                            <label class="form-check-label" for="telefono_celular">
                                Cel
                            </label>
                            <input class="form-check-input ms-3" type="radio" name="typeTelefono" id="telefono_fijo"
                                value="2">
                            <label class="form-check-label" for="telefono_fijo">
                                Fijo
                            </label>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="telefonoProspecto"
                            name="telefonoProspecto" placeholder="Teléfono (Obligatorio)" minlength="10" maxlength="10">
                    </div>
                    <div class="input-group mb-2 col-12 p-0 mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" class="form-control form-control-sm" placeholder="E-mail (Obligatorio)"
                            id="emailProspecto" name="emailProspecto" maxlength="50">
                    </div>
                    <div class="form-check col-12">
                        <input class="form-check-input" type="checkbox" value="" id="terminosYcondiciones"
                            name="terminosYcondiciones" checked>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link p-0 text-start" data-bs-toggle="modal"
                            data-bs-target="#avisoPrivacidadCalculadora" style="font-size: 14px;">
                            He leído y acepto el aviso de privacidad
                        </button>

                        @include('modales.avisoPrivacidadCalculadora')
                    </div>
                    <input type="hidden" name="utm_source" id="utm_source"
                        @if ($dataUTM != null) value="{{ $dataUTM['utm_source'] }}" @else value="0" @endif>
                    <input type="hidden" name="utm_medium" id="utm_medium"
                        @if ($dataUTM != null) value="{{ $dataUTM['utm_medium'] }}" @else value="0" @endif>
                    <input type="hidden" name="utm_campaign" id="utm_campaign"
                        @if ($dataUTM != null) value="{{ $dataUTM['utm_campaign'] }}" @else value="0" @endif>
                    <input type="hidden" name="utm_term" id="utm_term"
                        @if ($dataUTM != null) value="{{ $dataUTM['utm_term'] }}" @else value="0" @endif>
                    <input type="hidden" name="utm_content" id="utm_content"
                        @if ($dataUTM != null) value="{{ $dataUTM['utm_content'] }}" @else value="0" @endif>
                    <button id="envio_caluladora" class="btn btn-primary mt-3" type="submit">
                        Calcular
                    </button>
                </form>
            </div>
            <div class="col-12 col-md-9 col-lg-9 mt-2 mt-md-0 p-0 px-md-3">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="20000">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/2024/2024_1.jpg') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="20000">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/2024/2024_2.jpg') }}"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="20000">
                            <img src="{{ asset('assets/img/calculadora_de_cuotas/2024/2024_3.jpg') }}"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                <div id="informacionCRM" class="row mt-3 d-none">
                    <h2 class="text-center mb-3" style="color: #004b93">¡Estás a un paso de ser UNIMEXITARIO!</h2>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="folioCrm" name="folioCrm">
                    </div>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="nombreCrm" name="nombreCrm">
                    </div>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="periodoCrm" name="periodoCrm">
                    </div>
                    <div class="col-12 col-md-3">
                        <input disabled type="text" class="form-control text-center rounded-0" style="color: #004b93;"
                            id="nivelCrm" name="nivelCrm">
                    </div>
                    <div class="no-print col-12 mt-3">
                        <p class="text-center" id="textComboCarreras"></p>
                    </div>
                    <div class="no-print col-12">
                        <select id="selectCarrera" name="selectCarrera" class="form-select mx-auto w-75 text-center">
                            <option value="" selected disabled>- Selecciona una carrera -</option>
                        </select>
                    </div>
                    <div id="cargador_horarios" class="col-12 text-center d-none mt-3">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p>
                            Obteniendo horarios disponibles...
                        </p>
                    </div>
                    <div class="col-12 row no-print" id="grupoBotones">
                    </div>
                    <div id="cargador_costos" class="col-12 text-center d-none mt-3 mb-3">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p>
                            Obteniendo costos...
                        </p>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 row mt-3 d-none" id="grupoInformacion">
                        <div class="col-12 text-end">
                            <button id="printButton" onclick="imprimir()" type="button" class="btn mb-3">
                                <i class="bi bi-printer" style="color: #de951b;"></i>
                                Imprimir
                            </button>
                            <button onclick="enviarCorreoConVariablesGuardadas()" id="correoButton" type="button"
                                class="btn mb-3 ms-2">
                                <i class="bi bi-envelope" style="color: #de951b;"></i>
                                Enviar a correo
                            </button>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card h-100 mb-3" style="border: 1px solid #004b93">
                                <div class="card-header text-center text-white"
                                    style="background: #004b93; font-size: 13px;">
                                    INSCRIPCIÓN
                                </div>
                                <div class="card-body row">
                                    <div class="col-12 col-md-7">
                                        <p class="text-secondary">
                                            Con tu promoción
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <p id="costoCnPromocion" class="text-center" style="color: #004b93">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card h-100 mb-3" style="border: 1px solid #004b93">
                                <div class="card-header text-center text-white"
                                    style="background: #004b93; font-size: 13px;">
                                    4 PARCIALIDADES DE
                                </div>
                                <div class="card-body row">
                                    <div class="col-12 col-md-7">
                                        <p id="porcentajeBeca" class="text-secondary">
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <p id="costoBeca" class="text-center" style="color: #004b93">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card h-100 mb-3" style="border: 1px solid #004b93">
                                <div class="card-header text-center text-white"
                                    style="background: #004b93; font-size: 13px;">
                                    TOTAL A PAGAR EN 1er CUATRIMESTRE
                                </div>
                                <div class="card-body row">
                                    <div class="col-12 col-md-7">
                                        <p class="text-secondary">
                                            Promoción y Beca
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <p id="costoPromocion" class="text-center" style="color: #004b93">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card h-100 mt-3" style="border: 1px solid #004b93">
                                <div class="card-body">
                                    <p class="text-secondary">
                                        Tu selección ha sido: <span class="fw-bold" id="carreraInfo"
                                            style="color: #004b93;"></span> <br>
                                        Plantel: <span class="fw-bold" id="plantelInfo" style="color: #004b93;"></span>
                                        en
                                        horario: <span class="fw-bold" id="turnoInfo" style="color: #004b93"></span> de
                                        <span class="fw-bold" id="horarioInfo" style="color: #004b93"></span>
                                        <br>
                                        Inicio de clases: <span class="fw-bold" id="incioInfo"
                                            style="color: #004b93"></span><br>
                                        Beca: <span class="fw-bold" id="infoBeca" style="color: #004b93"></span><br>
                                        Vigencia: <span class="fw-bold" id="vigenciaInfo"
                                            style="color: #004b93"></span><br>
                                        Durante el cuatrimestre se deberán pagar 4 parcialidades indicadas en el Calendario
                                        Escolar. <br>
                                        Para mayor información de los costos de reinscripción, acude al plantel de tu
                                        interés.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-3">
                            <button onclick="redireccionPreinscripcionEnLinea()" id="redireccionPEL" href="#"
                                class="btn mt-3" style="background-color: #de951b;">
                                PREINSCRIPCIÓN EN LINEA
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr id="separacionTerminosCondiciones" class="mt-3 d-none"
                style="border-top: 1px solid #DC9A00; opacity: 1;">
            <div id="terminosCondiciones" class="col-12 d-none">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button
                                style="background-color: #ffffff !important; color: #004b93 !important; font-size: 1.1rem;"
                                class="btn w-100 text-center" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <b>Términos y Condiciones</b>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div style="color: #004b93 !important;" id="terminosCondicionesText" class="accordion-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('modales.confirmacion')
@endsection

@section('scripts')
    <script type="text/javascript"
        src="https://rawcdn.githack.com/franz1628/validacionKeyCampo/bce0e442ee71a4cf8e5954c27b44bc88ff0a8eeb/validCampoFranz.js">
    </script>
    <script src="{{ asset('assets/js/validarCampos.js') }}"></script>
    <script>
        $.ajax({
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: setUrlBase() + "get/variables/calculadora",
        }).done(function(data) {
            console.log(data);
            if (data.nivel_calculadora != null) {
                console.log('hay variable de session para este modulo');
                $("#selectNivel").empty();
                $('#selectNivel').append("<option selected value=''>" + data.nivel_calculadora + "</option>");
            }

        }).fail(function() {
            console.log("Algo salió mal");
        });

        function setUrlBase() {
            let urlBase = "{{ env('APP_URL') }}";
            return urlBase;
        }

        function imprimir() {
            $.print("#informacionCRM", {
                globalStyles: true,
                mediaPrint: true,
                stylesheet: null,
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: 'Resumen de tu selección en la Calculadora de Becas UNIMEX',
                doctype: ' <!doctype html> '
            });
        }

        $("#telefonoProspecto").bind('keypress', function(event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $('#terminosYcondiciones').on('click', function() {
            if ($(this).is(':checked')) {
                // Hacer algo si el checkbox ha sido seleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
                $('#envio_caluladora').attr('disabled', false);
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
                $('#envio_caluladora').attr('disabled', true);
            }
        });

        $('#nombreProspecto').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#apellidosProspecto').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
    </script>
    <script src="{{ asset('assets/js/calculadoraCuotas/app_calculadora.js') }}"></script>
    <script src="{{ asset('assets/js/calculadoraCuotas/combos_calculadora.js') }}"></script>
    <script src="{{ asset('assets/js/calculadoraCuotas/validacion.js') }}"></script>
@endsection
