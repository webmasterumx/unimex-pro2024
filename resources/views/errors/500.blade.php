@extends('layouts.layoutError')

@section('titulo')
    Error Interno del Servidor
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
                    Error Interno del Servidor
                </p>
                <a href="{{ route('inicio') }}" class="btn btn-primary">Volver al Inicio</a>
            </div>
        </div>
    </section>
@endsection
