@extends('layouts.layoutError')

@section('titulo')
    Pagina Expirada
@endsection

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-5 text-center">
                <img src="{{ asset('assets/img/extras/acercade/principal.png') }}" alt="">
            </div>
            <div class="col-7 text-center">
                <p style="font-size: 150px; margin-top: 4rem !important">
                    500
                </p>
                <p class="fs-1">
                    UPS! LO SENTIMOS
                </p>
                <p class="fs-3">
                    Pagina Expeirada Reinicia el Proceso
                </p>
                <a href="{{ route('inicio') }}" class="btn btn-primary">Volver al Inicio</a>
            </div>
        </div>
    </section>
@endsection