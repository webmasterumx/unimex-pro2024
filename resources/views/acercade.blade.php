@extends('layouts.layout')

@section('metas')
    @include('metas.acercade.definicion')
@endsection

@section('styles')
    <style>
        .quote {
            font-size: 2.063rem;
            background-color: #f8981d;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    @if ($acercadeFirst->id == 2)
        @php
            $clase = 'etiqueta-titulo-acercade-mensaje';
        @endphp
    @else
        @php
            $clase = 'etiqueta-titulo-acercade';
        @endphp
    @endif

    <!-- Inicio de seccion de portada style="width: {{ $acercadeFirst->anchoTitulo }}% !important;" -->
    <section id="historia" style="background-image: url({{ asset($acercadeFirst->portada) }})">
        <h1 class="{{ $clase }} p-3 text-uppercase">
            {{ $acercadeFirst->titulo }} </h1>
    </section>
    <!-- Fin de seccion de portada -->

    <!-- Inicio componente diferenciario -->
    @php
        $ruta = 'include.acercade.' . $acercadeFirst->extension;
    @endphp
    @include($ruta)
    <!-- Fin de componente diferenciario -->

    <!-- Inicio de Sección de Recomendaciones -->
    <section class="py-5" style="background-color: #f1f2f3 !important;">
        <div class="container-fluid">
            <div class="row">
                @foreach ($recomendaciones as $recomendacion)
                    <div class="col-12 col-md-4 col-lg-4 mb-3 mb-md-0 mb-lg-0">
                        <div class="card h-100 m-auto" style="width: 18rem;">
                            <a href="{{ route('acercade', $recomendacion->slug) }}">
                                <img src="{{ asset($recomendacion->portada_pequeña) }}" class="card-img-top"
                                    alt="{{ $recomendacion->nombre }}" style="height: 140px !important;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title underlined-head text-uppercase fw-normal">
                                    {{ $recomendacion->nombre }} </h5>
                                <p class="card-text"> {{ $recomendacion->descripcion_corta }} </p>
                                <center>
                                    <a href="{{ route('acercade', $recomendacion->slug) }}" class="btn btn-primary">VER MÁS
                                        <i class="bi bi-arrow-right-circle-fill"></i></a>
                                </center>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Fin de Sección de Recomendaciones -->
@endsection

@include('include.redirecciones.outOfertaAcademica')