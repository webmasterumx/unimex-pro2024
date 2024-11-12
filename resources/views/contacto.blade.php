@extends('layouts.layout')

@section('titulo')
    Contacto | UNIMEX
@endsection

@section('metas')
    @include('metas.contacto')
@endsection

@section('styles')
    <style>
        .bg_contacto {
            background: url("{{ asset('assets/img/extras/bg-01.webp') }}");
            background-position: center;
            background-size: cover;
        }

        .nav-link.active {
            color: #474747 !important;
            background-color: #f8981d !important;
        }

        .nav-tabs .nav-link:hover {
            color: white !important;
            background-color: #004b93 !important;
            border-color: transparent !important;
        }
    </style>
@endsection


@if (session('elementPosicionContactForm') == 'formularioContactanos')
    @php
        $claseFormContactanos = 'active';
        $claseModuloContactanos = 'show active';

        $claseFormBolsaTrabajo = '';
        $claseModuloBolsaTrabajo = '';
    @endphp
@elseif(session('elementPosicionContactForm') == 'formularioTrabajaUnimex')
    @php
        $claseFormContactanos = '';
        $claseModuloContactanos = '';

        $claseFormBolsaTrabajo = 'active';
        $claseModuloBolsaTrabajo = 'show active';
    @endphp
@else
    @php
        $claseFormContactanos = 'active';
        $claseModuloContactanos = 'show active';

        $claseFormBolsaTrabajo = '';
        $claseModuloBolsaTrabajo = '';
    @endphp
@endif

@section('content')
    <section class="container-fluid px-5 mt-3 mb-3">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <h1 style="font-size: 1.438rem;" class="underlined-head">
                    CONTACTO
                </h1>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button id="formularioContactanos" class="nav-link {{ $claseFormContactanos }}" id="home-tab"
                            data-bs-toggle="tab" data-bs-target="#seccionFormContactanos" type="button" role="tab"
                            aria-controls="seccionFormContactanos" aria-selected="true">Contáctanos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#service-pane"
                            type="button" role="tab" aria-controls="service-pane" aria-selected="false">Servicio
                            para Alumnos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contrata-pane"
                            type="button" role="tab" aria-controls="contrata-pane" aria-selected="false">
                            Contrata Alumnos y Egresados UNIMEX®
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button id="formularioTrabajaUnimex" class="nav-link {{ $claseFormBolsaTrabajo }}"
                            data-bs-toggle="tab" data-bs-target="#seccionFormTrabajaUnimex" type="button" role="tab"
                            aria-controls="seccionFormTrabajaUnimex" aria-selected="false">Trabaja en
                            UNIMEX®</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#sugerencia-pane"
                            type="button" role="tab" aria-controls="sugerencia-pane" aria-selected="false">Quejas y
                            Sugerencias</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div id="seccionFormContactanos" class="tab-pane {{ $claseModuloContactanos }} fade border"
                        role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        @php
                            $origen = 'Info';
                        @endphp
                        @include('include.contactoForm')
                    </div>
                    <div class="tab-pane fade px-5 py-3 border" id="service-pane" role="tabpanel"
                        aria-labelledby="service-tab" tabindex="0">
                        @include('forms.servicio-alumnos')
                    </div>
                    <div class="tab-pane fade px-5 py-3 border" id="contrata-pane" role="tabpanel"
                        aria-labelledby="contrata-tab" tabindex="0">
                        <h4 class="fw-normal">
                            Contrata Alumnos y Egresados UNIMEX
                        </h4>
                        <p>
                            UNIMEX® concentra las ofertas laborales para alumnos y egresados en una sección dedicada a
                            Universidad Mexicana en la Red Universitaria de Empleo de OCC.
                        </p>
                        <p class="text-center">
                            ¿Tu empresa está dada de alta en OCC para publicar vacantes?
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-6 text-center">
                                <!-- Button trigger modal -->
                                <button onclick="establecerTipoDeEmpresaOCC(1)" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#empresasOCC">
                                    SÍ, YA TENEMOS UNA <br> CUENTA EN OCC
                                </button>
                            </div>
                            <div class="col-12 col-md-6" text-center>
                                <button onclick="establecerTipoDeEmpresaOCC(0)" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#empresasOCC">
                                    AÚN NO, QUEREMOS OBTENER <br> UNA CUENTA GRATUITA PARA <br> PUBLICAR VACANTES PARA <br>
                                    UNIMEX
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="seccionFormTrabajaUnimex" class="tab-pane {{ $claseModuloBolsaTrabajo }} fade px-5 py-3 border"
                        role="tabpanel" aria-labelledby="trabaja-tab" tabindex="0">
                        @include('forms.trabaja-unimex')
                    </div>
                    <div class="tab-pane fade px-5 py-3 border" id="sugerencia-pane" role="tabpanel"
                        aria-labelledby="sugerencia-tab" tabindex="0">
                        @include('forms.quejas-sugerencias')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('modales.empresasOCC')

@section('scripts')
    <script src="{{ asset('assets/js/combos.js') }}"></script>
    <script
        src="https://rawcdn.githack.com/franz1628/validacionKeyCampo/bce0e442ee71a4cf8e5954c27b44bc88ff0a8eeb/validCampoFranz.js">
    </script>
    <script>
        $(document).ready(function() {

            // servico para alumnos
            $('#number1').val(Math.floor(Math.random() * 10));
            $('#number2').val(Math.floor(Math.random() * 10));

            //trabaja en unimex
            $('#number3').val(Math.floor(Math.random() * 10));
            $('#number4').val(Math.floor(Math.random() * 10));

            //quejas y sugerencias
            $('#number5').val(Math.floor(Math.random() * 10));
            $('#number6').val(Math.floor(Math.random() * 10));

        });

        $("#phone_casa_service").bind('keypress', function(event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $("#movil_service").bind('keypress', function(event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $("#nivelSelect").append(`<option value="">Nivel</option>`);
        $("#carreraSelect").append(`<option value="">Carrera</option>`);

        function resetFormEmpresaOCC() {
            document.getElementById("form_empresasOCC").reset();
        }

        $('#aceptar_qys').on('click', function() {
            if ($(this).is(':checked')) {
                $('#enviarDatosAceptar').attr('disabled', false);
            } else {
                $('#enviarDatosAceptar').attr('disabled', true);
            }
        });

        $('#deacuerdo_service').on('click', function() {
            if ($(this).is(':checked')) {
                $('#enviarDatosServicio').attr('disabled', false);
            } else {
                $('#enviarDatosServicio').attr('disabled', true);
            }
        });

        $('#aceptar_trabajar').on('click', function() {
            if ($(this).is(':checked')) {
                $('#enviarDatosTrabaja').attr('disabled', false);
            } else {
                $('#enviarDatosTrabaja').attr('disabled', true);
            }
        });

        $('#aceptar_empresasocc').on('click', function() {
            if ($(this).is(':checked')) {
                $('#enviarDatosEmpresasOCC').attr('disabled', false);
            } else {
                $('#enviarDatosEmpresasOCC').attr('disabled', true);
            }
        });

        $('#name_service').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#asunto_service').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#nombre_empresaOCC').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#contacto_empresaOCC').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#razon_empresaOCC').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#nombre_trabajo').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#puesto_interes').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#nombre_qys').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#asunto_qys').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú');
        $('#matricula_service').validCampoFranz('123456789-');
        $('#matricula_qys').validCampoFranz('123456789-');
        $('#rfc_empresaOCC').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiíoóuú1234567890');

        // limitador de entrada de caracteres inputs resultados
        $('#operacion_qys').validCampoFranz('1234567890');
        $('#operacion_service').validCampoFranz('1234567890');
        $('#operacion_trabaja').validCampoFranz('1234567890');
        $('#operacion_empresaOCC').validCampoFranz('1234567890');
    </script>

    @include('include.redirecciones.outOfertaAcademica')
@endsection
