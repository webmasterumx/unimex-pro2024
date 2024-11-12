@extends('layouts.layoutPreinscripcion')

@section('content')
    <div class="container-fluid" style="margin-top: 8rem !important;">
        <div class="row">
           {{--  <div class="col-12">
                <h1 class="text-center fw-normal" style="color: rgba(241,145,29,1.00);">
                    <i class="bi bi-card-list"></i>
                    PREINSCRIPCIÓN EN LÍNEA
                </h1>
            </div> --}}
            <div class="col-12 row">
                <div class="col-12 col-md-12 col-lg-5 text-center">
                    <img class="mt-5" src="{{ asset('assets/img/preinscripcion_linea/preinscripcion.png') }}"
                        alt="">
                    <br>
                    <p style="color: #00539B !important;">
                        <b>Forma parte de UNIMEX®</b>
                    </p>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="row">
                        <div class="col-12">
                            <p style="color: #00539B !important;"><i class="bi bi-credit-card-2-back"></i> Elige tu forma de
                                pago.</p>
                        </div>
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="mb-3">
                                <label for="matricula" class="form-label">Matrícula</label>
                                <input disabled type="text" class="form-control" id="matricula" name="matricula"
                                    value="{{ session('Matricula') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="mb-3">
                                <label for="cuota" class="form-label">Cuota de Inscripción</label>
                                <input disabled type="text" class="form-control" id="cuota" name="cuota"
                                    value="${{ session('precio') }}.00">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            Recuerda que debes cubrir la totalidad de la cuota de inscripción antes del <b>{{ session('fechaLimite') }}</b> para poder hacer válida la promoción.
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pagoVentanilla" id="pagoVentanilla"
                                    checked>
                                <label class="form-check-label" for="pagoVentanilla">
                                    Pagar en Ventanilla Bancaria.
                                </label>
                            </div>
                            <img class="mt-5" src="{{ asset('assets/img/preinscripcion_linea/scotiabank.png') }}"
                                alt="">
                            <p>
                                Elige esta opción para imprimir la Ficha de Pago para realizar tu depósito en Scotiabank.
                            </p>
                        </div>
                        <div class="col-12 text-end">
                            <a href="{{ route('datos.pago') }}" class="btn btn-primary">Continuar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
