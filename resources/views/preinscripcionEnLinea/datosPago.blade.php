@extends('layouts.layoutPreinscripcion')

@section('content')
    <div class="container-fluid" style="margin-top: 8rem !important;">
        <div class="row">
            {{-- <div class="col-12">
                <h1 class="text-center fw-normal" style="color: rgba(241,145,29,1.00);">
                    <i class="bi bi-card-list"></i>
                    PREINSCRIPCIÓN EN LÍNEA
                </h1>
                <hr>
            </div> --}}
            <div class="col-12 row">
                <div class="col-12 col-md-12 col-lg-5">
                    <p class="text-center">
                        Instrucciones
                    </p>
                    <p class="px-5" style="color: #00539a !important;">
                        <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i> Imprime la ficha de
                        depósito. <br>
                        <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i> Acude a la sucursal
                        Scotiabank de tu preferencia. <br>
                        <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i> Realiza el o los
                        abonos correspondientes de acuerdo a tu opción
                        de pago seleccionada (un solo pago o de 2 a 5 abonos).
                    </p>
                    <p class="text-center">
                        <img style="max-width: 250px;"
                            src="{{ asset('assets/img/preinscripcion_linea/Unimex_Izcalli.jpg') }}" alt="">
                        <br>
                        Forma parte de UNIMEX®
                    </p>
                </div>
                <div class="col-12 col-md-12 col-lg-7 py-4">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-3 mb-3">
                            <p style="color: #00539a !important;">
                                <b>Pago en Ventanilla</b>
                            </p>
                        </div>
                        <div class="col-12 col-md-12 col-lg-9 p-0 mb-3">
                            <img src="{{ asset('assets/img/preinscripcion_linea/scotiabank.png') }}" alt="">
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="nombreEmpresa" class="form-label">A nombre
                                    de:</label>
                                <input disabled type="email" class="form-control" id="nombreEmpresa"
                                    value="{{ session('empresa') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="numeroServicio" class="form-label">Número de
                                    Servicio</label>
                                <input disabled type="text" class="form-control" id="numeroServicio"
                                    value="{{ session('ns') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="referencia"
                                    class="form-label">Referencia</label>
                                <input disabled type="text" class="form-control" id="referencia"
                                    value="{{ session('referencia') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="cantidad" class="form-label">Cantidad</label>
                                <input disabled type="text" class="form-control" id="cantidad"
                                    value="{{ session('precio') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="nombreAlumno"
                                    class="form-label">Nombre</label>
                                <input disabled type="text" class="form-control" id="nombreAlumno"
                                    value="{{ session('Nombre') }}  {{ session('ApPaterno') }} {{ session('ApMaterno') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="matricula"
                                    class="form-label">Matrícula</label>
                                <input disabled type="text" class="form-control" id="matricula"
                                    value="{{ session('Matricula') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="cuatrimestre"
                                    class="form-label">Cuatrimestre</label>
                                <input disabled type="text" class="form-control" id="cuatrimestre" value="Primero">
                            </div>
                        </div>
                        @php
                            $idPlantel = session('PlantelID');
                        @endphp
                        @switch($idPlantel)
                            @case(2)
                                @php
                                    $nombrePlantel = 'IZCALLI';
                                @endphp
                            @break

                            @case(3)
                                @php
                                    $nombrePlantel = 'SATÉLITE';
                                @endphp
                            @break

                            @case(4)
                                @php
                                    $nombrePlantel = 'POLANCO';
                                @endphp
                            @break

                            @case(5)
                                @php
                                    $nombrePlantel = 'VERACRUZ';
                                @endphp
                            @break

                            @default
                        @endswitch
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="mb-3">
                                <label style="color: #00539a !important;" for="plantel" class="form-label">Plantel</label>
                                <input disabled type="text" class="form-control" id="plantel"
                                    value="{{ $nombrePlantel }}">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{ route('ficha.pdf') }}" type="button" class="btn btn-primary"><i
                                    class="bi bi-printer-fill"></i>
                                Imprimir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
