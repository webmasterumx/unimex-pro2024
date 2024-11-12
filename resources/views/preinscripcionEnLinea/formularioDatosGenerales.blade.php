@extends('layouts.layoutPreinscripcion')

@section('content')
    <div class="container-fluid" style="margin-top: 8rem !important;">
        <div class="row px-5">
            {{-- <div class="col-12">
                <h1 class="text-center fw-normal" style="color: rgba(241,145,29,1.00);">
                    <i class="bi bi-card-list"></i>
                    PREINSCRIPCIÓN EN LÍNEA
                </h1>
            </div> --}}
            <div class="col-12">
                <form id="formPromoPreinscripcion" class="card" style="border: 1px solid #337ab7;">
                    @csrf
                    <div class="card-header text-center" style="background-color: #337ab7; color: #fff;">
                        <i class="bi bi-person-vcard"></i>
                        Captura de Datos Personales
                    </div>
                    <div class="card-body row">
                        <div class=" col-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="correoInscripcion" class="form-label">Correo
                                    Electrónico</label>
                                <input disabled type="email" class="form-control" id="correoInscripcion"
                                    name="correoInscripcion" value="">
                            </div>
                        </div>
                        <div class=" col-12 col-lg-8"></div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="nombreInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span>
                                    Nombre</label>
                                <input type="text" class="form-control" id="nombreInscripcion" name="nombreInscripcion"
                                    value="" maxlength="50">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="apellidoPatInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span>
                                    Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidoPatInscripcion"
                                    name="apellidoPatInscripcion" maxlength="30">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="apellidoMatInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span>
                                    Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoMatInscripcion"
                                    name="apellidoMatInscripcion" maxlength="30">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label style="color: #00539a !important;" for="" class="form-label m-0">
                                        <span style="color: red !important;">*</span> Fecha de Nacimiento
                                    </label>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <select id="diaNacimiento" name="diaNacimiento" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>Dia</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}"> {{ $i }} </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <select id="mesNacimiento" name="mesNacimiento" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>Mes</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <select id="yearNacimiento" name="yearNacimiento" class="form-select">
                                        <option value="" selected>Año</option>
                                        @for ($i = 1970; $i <= 2004; $i++)
                                            <option value="{{ $i }}"> {{ $i }} </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="telefonoInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span> Teléfono ej. 5512345674</label>
                                <input type="text" class="form-control" id="telefonoInscripcion"
                                    name="telefonoInscripcion" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="telefonoCelInscripcion"
                                    class="form-label">
                                    <span style="color: red !important;">*</span> Teléfono cel. ej 5512345674
                                </label>
                                <input type="text" class="form-control" id="telefonoCelInscripcion"
                                    name="telefonoCelInscripcion" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6"></div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="calleInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span> Calle</label>
                                <input type="text" class="form-control" id="calleInscripcion"
                                    name="calleInscripcion" maxlength="50">
                            </div>
                        </div>
                        <div class="col-12 col-lg-1">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="numeroInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span> Número</label>
                                <input type="text" class="form-control" id="numeroInscripcion"
                                    name="numeroInscripcion" maxlength="15">
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="coloniaInscripcion" class="form-label">
                                    <span style="color: red !important;">*</span> Colonia</label>
                                <input type="text" class="form-control" id="coloniaInscripcion"
                                    name="coloniaInscripcion" maxlength="50">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label style="color: #00539a !important;" for="estadoInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Estado:</label>
                            <select class="form-select" id="estadoInscripcion" name="estadoInscripcion">
                                <option value="" selected>Selecciona Estado</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado['clave'] }}"> {{ $estado['descrip'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label style="color: #00539a !important;" for="municipioInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Municipio/Delegación:</label>
                            <select class="form-select" id="municipioInscripcion" name="municipioInscripcion">
                                <option value="" selected>Selecciona Delegación</option>
                            </select>
                        </div>
                        <div class="col-12 text-center" style="color: rgba(241, 145, 29, 1.00);">
                            <h5>Haz tu Selección Académica</h5>
                            <hr style="opacity: 1;">
                        </div>
                        <div class="col-12 col-lg-2">
                            <label style="color: #00539a !important;" for="municipioInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Plantel:</label>
                            <select id="plantelSelect" name="plantelSelect" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected disabled>Seleccionar Plantel</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label style="color: #00539a !important;" for="municipioInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Ciclo Escolar:</label>
                            <select id="periodoSelect" name="periodoSelect" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>Seleccionar un periodo</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-2">
                            <label style="color: #00539a !important;" for="municipioInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Nivel:</label>
                            <select id="nivelSelect" name="nivelSelect" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>Seleccionar un nivel</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label style="color: #00539a !important;" for="municipioInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Carrera:</label>
                            <select id="carreraSelect" name="carreraSelect" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>Seleccionar Carrera</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <label style="color: #00539a !important;" for="municipioInscripcion" class="form-label"><span
                                    style="color: red !important;">*</span> Horario:</label>
                            <select id="horarioSelect" name="horarioSelect" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>Seleccionar Horario</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-9"></div>
                        <div class="col-12 col-lg-3">
                            <button id="calcularPromo" type="submit" class="btn btn-primary mt-4">Continuar</button>

                            <!-- href="{{ route('registrar.prospecto.preinscripcion') }}" -->

                            <button id="continuarProceso" onclick="registrarProspectoPreinscripcionEnLinea()"
                                type="button" class="btn btn-primary mt-4 d-none">Continuar </button>
                            <button onclick="correccionDatos()" id="corregirDatos" type="button"
                                class="btn btn-primary mt-4 d-none">Corregir Datos</button>
                        </div>

                        <div id="respuestaSuccess" class="col-12 mt-4 row d-none">
                            <div class="col-12">
                                <h3 style="color: rgba(241, 145, 29, 1.00);">Cuota de Inscripción Preferencial</h3>
                                <hr style="border: 1px solid rgba(241, 145, 29, 1.00);">
                            </div>
                            <div class="col-9">
                                Gracias a tu Pre-Inscripción en Línea has apartado la Cuota de Inscripción Preferencial
                                de
                                este mes.
                            </div>
                            <div class="col-3"></div>
                            <div class="col-9">
                                Total al pagar:
                            </div>
                            <div id="precioPromo" class="col-3">

                            </div>
                            <div class="col-12">
                                <hr style="border: 1px solid rgba(241, 145, 29, 1.00);">
                            </div>
                            <div class="col-9">
                                Para conservar este descuento y tu lugar en el horario seleccionado, tu fecha límite para
                                cubrir la totalidad de tu inscripción es:
                            </div>
                            <div id="fechaLimitePromo" class="col-3">

                            </div>
                        </div>
                        <div id="respuestaError" class="col-12 mt-4 d-none">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('modales.modalCargaPreinscripcion')

@section('scripts')
    <script type="text/javascript"
        src="https://rawcdn.githack.com/franz1628/validacionKeyCampo/bce0e442ee71a4cf8e5954c27b44bc88ff0a8eeb/validCampoFranz.js">
    </script>
    <script src="{{ asset('assets/js/validarCampos.js') }}"></script>
    @if (session('estadoCRM') == 1 || session()->has('foliocrm') == true)
        <script>
            $(document).ready(function() {

                $('#modalCarga').modal('show');

                let ruta = setUrlBase() + "get/info/prospecto"
                console.log(ruta);
                $.ajax({
                    method: "GET",
                    url: ruta,
                }).done(function(data) {
                    console.log(data);

                    $('#correoInscripcion').val(data.email);
                    $('#nombreInscripcion').val(data.nombre);
                    $('#apellidoPatInscripcion').val(data.apellido_pat);
                    $('#apellidoMatInscripcion').val(data.apellido_mat);
                    $('#telefonoInscripcion').val(data.telefono);
                    $('#telefonoCelInscripcion').val(data.celular);
                    $('#calleInscripcion').val(data.calle);
                    $('#numeroInscripcion').val(data.numero);
                    $('#coloniaInscripcion').val(data.colonia);

                    let clavePlantel = data.clave_empresa;
                    let claveCampana = data.clave_periodo;
                    let claveNivel = data.clave_nivel;
                    let claveCarrera = data.clave_carrera;
                    let claveHorario = data.clave_turno;

                    llenaComboPlantel(clavePlantel);
                    llenarComboCampañas(claveCampana, clavePlantel);
                    llenarComboNivel(clavePlantel, claveNivel);
                    llenarCombosCarrera(claveCampana, clavePlantel, claveNivel, claveCarrera);
                    llenarComboHorarios(claveCampana, clavePlantel, claveNivel, claveCarrera, claveHorario);

                    if (data.matricula = "") {
                        estadoCampos(true);
                    } else {
                        estadoCampos(false);
                    }


                }).fail(function() {
                    console.log("Algo salió mal");
                });


            });
        </script>
        <script src="{{ asset('assets/js/preinscripcionLinea/llenar_combos.js') }}"></script>
    @else
        <script>
            let correoGuardado = "{{ session('email') }}";
            let telefonoGuardado = "{{ session('telefono') }}";
            $('#correoInscripcion').val(correoGuardado);
            $('#telefonoInscripcion').val(telefonoGuardado);
        </script>
    @endif
    <script>
        window.onbeforeunload = function(e) {
            //e.preventDefault();
        };

        $('#nombreInscripcion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúiou');
        $('#apellidoPatInscripcion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúiou');
        $('#apellidoMatInscripcion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúiou');
        $('#calleInscripcion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúiou1234567890')
        $('#numeroInscripcion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúiou1234567890')
        $('#coloniaInscripcion').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéíóúiou')

        validarCamposLetrasOnPasteV1('#nombreInscripcion');
        validarCamposLetrasOnPasteV1('#apellidoPatInscripcion');
        validarCamposLetrasOnPasteV1('#apellidoMatInscripcion');
        validarCamposLetrasOnPasteV1('#telefonoInscripcion');
        validarCamposLetrasOnPasteV1('#telefonoCelInscripcion');
        validarCamposLetrasOnPasteV1('#calleInscripcion');
        validarCamposLetrasOnPasteV1('#numeroInscripcion');
        validarCamposLetrasOnPasteV1('#coloniaInscripcion');
    </script>

    <script language="JavaScript">
        var msg = "¡El botón derecho está desactivado para este sitio !";

        function disableIE() {
            if (document.all) {
                //alert(msg);
                return false;
            }
        }

        function disableNS(e) {
            if (document.layers || (document.getElementById && !document.all)) {
                if (e.which == 2 || e.which == 3) {
                    //alert(msg);
                    return false;
                }
            }
        }
        if (document.layers) {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = disableNS;
        } else {
            document.onmouseup = disableNS;
            document.oncontextmenu = disableIE;
        }
        document.oncontextmenu = ev => {
            ev.preventDefault();
            console.log("Prevented to open menu!");
        }
    </script>
@endsection
