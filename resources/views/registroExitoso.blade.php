@extends('layouts.layout')

@section('titulo')
    Registro Exitoso | UNIMEX
@endsection

@section('content')
    <section id="registroExitoso" class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <h2 class="underlined-head">
                    ¡REGISTRO <br> EXITOSO!
                </h2>
            </div>
            <div class="col-12 col-md-9 col-lg-10 text-justify">
                <p class="text-center">
                    <img style="width: 40px;" src="{{ asset('assets/img/extras/good.png') }}" alt="Registro Exitoso"> <br> <br>
                    Gracias: {{ session('registroExitNombre') }} <br>
                    Tus datos de registro son: <br>
                    Folio: <b>{{ session('registroExitFolio') }}</b> <br>
                    Plantel: <b>{{ session('registroExitPlantel') }}</b> <br>
                    Nivel: <b>{{ session('registroExitNivel') }}</b> <br>
                    Carrera: <b>{{ session('registroExitCarrera') }}</b> <br><br>
                    Pronto nos pondremos en contacto contigo para orientarte y solucionar todas tus dudas. <br>
                    Ven al plantel y conócenos. <br>
                    Te esperamos de: Lunes a Viernes de 8:00 am - 9:00pm y los Sábados de 9:00 am a 4:00 pm. <br>
                    O comunícate a tu plantel para más información: <br><br>
                    IMPRIME ESTA PANTALLA Y ENTRÉGALA EN PLANTEL PARA PRESENTAR TU EXAMEN DE UBICACIÓN SIN COSTO. <br>
                    <br><br>
                    <button onclick="imprimir()" class="btn btn-primary no-print">Imprimir</button>
                </p>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/JQuery.print.js') }}"></script>
    <script>
        function imprimir() {
            $.print("#registroExitoso", {
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
                title: 'Registro Exitoso',
                doctype: ' <!doctype html> '
            });
        }
    </script>
@endsection

@include('include.redirecciones.outOfertaAcademica')
