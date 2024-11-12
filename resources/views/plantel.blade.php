@extends('layouts.layout')

@section('metas')
    @include('metas.planteles.definicion')
@endsection

@section('styles')
    <style>
        #plantel {
            background: no-repeat center center;
            background-size: cover;
            margin: auto;
        }

        #frameStyle>iframe {
            width: 100%;
            height: 600px;
            padding: 0;
        }

        #sectionFrame {
            height: 600px;
            position: relative;
        }

        .card-ld {
            left: 60%;
            top: 50%;
            z-index: 10;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 35px 36px 30px;
            width: 450px;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <!-- Inicipo de la portada del plantel -->
    <section id="plantel" style="background-image: url({{ asset($plantel->portada) }})"></section>
    <!-- Fin de la portada del plantel -->

    <section class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <h1 class="underlined-head text-uppercase fw-normal" style="font-size: 1.438rem;">
                    PLANTEL <br> {{ $plantel->titulo }}
                </h1>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                <p>
                    {{ $plantel->descripcion_larga }}
                </p>
            </div>
        </div>
    </section>
    <!-- Fin de la sección de objetivo -->

    <!-- Inicipo de la sección de galería -->
    <section class="container-fluid py-5" style="background-color: #20324f;">
        <h2 class="text-center text-white">NUESTRO CAMPUS</h2><br>
        <div id="nuestroCampus">
            @for ($i = 0; $i < count($galeria->galeria); $i++)
                <div class="card p-md-3 p-lg-3 border-0" style="background-color: #20324f;">
                    <img class="img-fluid m-auto" src="{{ asset($galeria->galeria[$i]) }}" class="card-img-top"
                        alt="...">
                </div>
            @endfor
        </div>
    </section>
    <!-- Fin de la sección de galería -->

    <!-- Inicipo de la sección que muestra el mapa -->
    <section id="sectionFrame" class="container-fluid p-0">
        <div class="row">
            <div id="frameStyle" class="col-12">
                {!! $plantel->mapa !!}
            </div>
            <div class="card-ld">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <p class="text/center">
                                {{ $plantel->correo }}
                            </p>
                            <hr>
                        </div>
                        <div class="col-12 col-md-7 col-lg-7">
                            {{ $plantel->direccion }}
                        </div>
                        <div class="col-12 col-md-3 col-lg-5">
                            Teléfonos: <br>
                            {{ $plantel->telefonos }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de la sección que muestra el mapa -->

    <!-- Inicio de la sección de planteles diferentes al actual -->
    <section class="container py-5">
        <div class="row">
            @foreach ($plantelesInNot as $plantelInNot)
                <div class="col-12 col-md-4 col-lg-4 mb-3">
                    <div class="card h-100 m-auto" style="width: 18rem;">
                        <a href="{{ route('plantel', $plantelInNot->nombre) }}">
                            <img src="{{ asset($plantelInNot->portada) }}" class="card-img-top"
                                alt="{{ $plantelInNot->nombre }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title underlined-head text-uppercase"> plantel {{ $plantelInNot->titulo }}
                            </h5>
                            <p class="card-text"> {{ $plantelInNot->descripcion_corta }} </p>
                            <center>
                                <a href="{{ route('plantel', $plantelInNot->nombre) }}" class="btn btn-primary">VER MÁS</a>
                            </center>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Fin de la sección de planteles diferentes al actual -->
@endsection

@section('scripts')
    <script>
        $('#nuestroCampus').slick({
            infinite: true,
            autoplay: false,
            slidesToShow: 5,
            slidesToScroll: 5,
            arrows: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ],
            prevArrow: '<button type="button" class="slick-prev-plantel"><i class="bi bi-chevron-compact-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next-plantel"><i class="bi bi-chevron-compact-right"></i></button>',
        });
    </script>

    @include('include.redirecciones.outOfertaAcademica')
@endsection
