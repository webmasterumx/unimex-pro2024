@extends('layouts.layout')

@section('content')
    <section id="portada"
        style="background-image: url({{ asset('assets/img/extras/investigacion_unimex.jpg') }}); position: relative;">
        <h1 class="etiqueta-titulo p-3 text-uppercase"> INVESTIGACIÓN </h1>
    </section>
    <section class="container py-5">
        <div class="row">
            <div class="col-12 col-md-3">
                <h3 class="underlined-head fw-normal">
                    INVESTIGACIÓN
                </h3>
            </div>
            <div class="col-12 col-md-9">
                <p>
                    En la Universidad Mexicana creemos que la investigación es una actividad fundamental. El conocimiento
                    científico es el motor que genera herramientas innovadoras para el desarrollo económico, social y
                    ambiental de nuestro país.
                    <br><br>
                    La investigación científica debe utilizarse para agregar valor a una sociedad que fundamente su progreso
                    en el desarrollo de ciencia y tecnología.
                </p>
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="row">
            <div style="background-image: url({{ asset('assets/img/extras/publicaciones_unimex.webp') }});"
                class="col-12 col-md-6">
            </div>
            <div class="col-12 col-md-6 px-2">
                <h5 class="underlined-head">
                    PUBLICACIONES.
                </h5>
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 10%"></td>
                        <td style="width: 70% !important;"></td>
                        <td style="width: 20% !important;" class="text-center">PDF</td>
                    </tr>

                    @foreach ($investigaciones as $investigacion)
                        <tr>
                            <td style="width: 10%"></td>
                            <td style="width: 70% !important;" class="border-start border-primary">
                                {{ $investigacion->titulo }}
                            </td>
                            <td style="width: 20% !important;" class="text-center border-start border-primary">
                                @php
                                    $ruta = "assets/DocInvestigacion/" . $investigacion->ruta;
                                @endphp
                                <a href="{{ asset($ruta) }}" target="_blank">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection

@include('include.redirecciones.outOfertaAcademica')