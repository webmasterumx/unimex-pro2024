@extends('layouts.layout')

@section('titulo')
    Universidad Mexicana | Educación que se adapta a ti
@endsection

@section('metas')
    @include('metas.inicio')
@endsection

@section('styles')
    <style>
        .bg_contacto {
            background: url(assets/img/extras/bg-01.webp);
            background-position: center;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
    <!-- Inicio de Banner Inicial -->
    <section class="pb-2">
        <div class="container-fluid p-0">
            <div id="bannerInicial">
                @foreach ($banners as $banner)
                    @if (
                        $dataUTM['utm_medium'] == 'organico' ||
                            $dataUTM['utm_medium'] == 'ORGANICO' ||
                            $dataUTM['utm_medium'] == 'Organico' ||
                            $dataUTM['utm_medium'] == null)
                        @php
                            $ruta = $banner->link . $banner->utmOrganica;
                        @endphp
                    @else
                        @php
                            $ruta =
                                $banner->link .
                                '?utm_source=' .
                                $dataUTM['utm_source'] .
                                '&utm_medium=' .
                                $dataUTM['utm_medium'] .
                                '&utm_campaign=' .
                                $dataUTM['utm_campaign'] .
                                '&utm_term=' .
                                $dataUTM['utm_term'] .
                                '&utm_content=' .
                                $dataUTM['utm_content'];
                        @endphp
                    @endif
                    <a href="{{ $ruta }}" target="_blank" class="itemBannerInit">
                        <img src="{{ asset($banner->url) }}" class="d-block w-100 img-fluid" alt="{{ $banner->alt }}"
                            title="{{ $banner->alt }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Fin de Banner Inicial -->

    <!-- Inicio de Ventajas de Estudiar en UNIMEX  -->
    <section>
        <div class="container pb-3">
            <div class="row">
                <div class="col-12">
                    <h2 class="color-unimex text-center fw-light">
                        Ventajas de estudiar en Universidad Mexicana
                    </h2>
                    <p class="fs-unimex1 text-center">
                        Todo lo que inicies conclúyelo, ya que tu meta es ser un Profesional Exitoso.
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
                @foreach ($ventajas_unimex as $ventaja_unimex)
                    <div class="col">
                        @if ($ventaja_unimex->click == true)
                            @if (
                                $dataUTM['utm_medium'] == 'organico' ||
                                    $dataUTM['utm_medium'] == 'ORGANICO' ||
                                    $dataUTM['utm_medium'] == 'Organico' ||
                                    $dataUTM['utm_medium'] == null)
                                @php
                                    $ruta = $ventaja_unimex->link . $ventaja_unimex->utmOrganica; //! pendiente colocar complemento organico en la base de datos
                                @endphp
                            @else
                                @php
                                    $ruta =
                                        $ventaja_unimex->link .
                                        '?utm_source=' .
                                        $dataUTM['utm_source'] .
                                        '&utm_medium=' .
                                        $dataUTM['utm_medium'] .
                                        '&utm_campaign=' .
                                        $dataUTM['utm_campaign'] .
                                        '&utm_term=' .
                                        $dataUTM['utm_term'] .
                                        '&utm_content=' .
                                        $dataUTM['utm_content'];
                                @endphp
                            @endif
                            <a href="{{ $ruta }}" target="_blank" class="card border-0 h-100">
                                <div class="card-body text-center">
                                    <img class="icono-Unimex" src="{{ asset($ventaja_unimex->url) }}"
                                        alt="{{ $ventaja_unimex->alt }}" title="{{ $ventaja_unimex->alt }}"
                                        srcset="{{ asset($ventaja_unimex->url) }}">
                                    <p class="card-text text-center color-unimex fs-unimex2">
                                        {!! $ventaja_unimex->descripcion_corta !!}
                                    </p>
                                </div>
                            </a>
                        @else
                            <div class="card border-0 h-100">
                                <div class="card-body text-center">
                                    <img class="icono-Unimex" src="{{ asset($ventaja_unimex->url) }}"
                                        alt="{{ $ventaja_unimex->alt }}" title="{{ $ventaja_unimex->alt }}"
                                        srcset="{{ asset($ventaja_unimex->url) }}">
                                    <p class="card-text text-center color-unimex fs-unimex2">
                                        {!! $ventaja_unimex->descripcion_corta !!}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Fin de Ventajas de Estudiar en UNIMEX  -->

    <!-- Inicio de Carrucel de Licenciaturas -->
    <section id="licenciaturas" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="color-unimex text-center fw-light">
                        Licenciaturas Universidad Mexicana
                    </h2>
                    <p class="fs-unimex1 text-center">
                        Estudia con nosotros tu #LicenciaturaUNIMEX en: {{ var_dump($dataUTM['utm_medium']) }}
                    </p>
                </div>
                <div class="col-12">
                    <div id="listCarreras">
                        @foreach ($listaCarreras as $carrera)
                            @if ($carrera->mostrar == true)
                                @if (
                                    $dataUTM['utm_medium'] == 'organico' ||
                                        $dataUTM['utm_medium'] == 'ORGANICO' ||
                                        $dataUTM['utm_medium'] == 'Organico' ||
                                        $dataUTM['utm_medium'] == null)
                                    @php
                                        $ruta = env('APP_URL') . 'licenciatura/' . $carrera->slug . $carrera->urlUTM;
                                    @endphp
                                @else
                                    @php
                                        $ruta =
                                            env('APP_URL') .
                                            'licenciatura/' .
                                            $carrera->slug .
                                            '?utm_source=' .
                                            $dataUTM['utm_source'] .
                                            '&utm_medium=' .
                                            $dataUTM['utm_medium'] .
                                            '&utm_campaign=' .
                                            $dataUTM['utm_campaign'] .
                                            '&utm_term=' .
                                            $dataUTM['utm_term'] .
                                            '&utm_content=' .
                                            $dataUTM['utm_content'];
                                    @endphp
                                @endif
                                <a href="{{ $ruta }}" class="card mx-2 h-100">
                                    <div class="card-body p-3 p-md-2">
                                        <center>
                                            <img style="min-height: 80px !important;" src="{{ $carrera->icon }}"
                                                alt="{{ $carrera->slug }}" title="Ver más">
                                        </center>
                                        {!! $carrera->titulo !!}
                                        <hr>
                                        <p class="card-text text-justify">{{ $carrera->descripcion }}</p>
                                        @if ($carrera->veracruz == true)
                                            <div class="w-100 d-flex" style="justify-content: flex-end;">
                                                <img src="{{ asset('assets/img/extras/descarga.webp') }}" alt="">
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <!-- Fin de Carrucel de Lincenciaturas -->

    <section id="testimonios" class="container py-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active text-center" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <img class="mb-3" src="{{ asset('assets/img/extras/quote.png') }}" alt="" srcset="">
                        <p class="text-center" style="color: #666666; font-size: 20px;">
                            Más que una Licenciatura, fue de las mejores etapas de mi vida.
                        </p>
                        <p class="text-center" style="color: #f8981d; font-size: 20px;">
                            Yolanda Hinojosa
                        </p>
                    </div>
                    <div class="tab-pane fade text-center" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        <img class="mb-3" src="{{ asset('assets/img/extras/quote.png') }}" alt="" srcset="">
                        <p class="text-center" style="color: #666666; font-size: 20px;">
                            La mejor decisión para mi vida profesional, fue estudiar una maestría en UNIMEX.
                        </p>
                        <p class="text-center" style="color: #f8981d; font-size: 20px;">
                            Arturo Fregoso
                        </p>
                    </div>
                    <div class="tab-pane fade text-center" id="pills-contact" role="tabpanel"
                        aria-labelledby="pills-contact-tab" tabindex="0">
                        <img class="mb-3" src="{{ asset('assets/img/extras/quote.png') }}" alt="" srcset="">
                        <p class="text-center" style="color: #666666; font-size: 20px;">
                            Conocí a mi socio en UNIMEX y ahora juntos tenemos una empresa exitosa.
                        </p>
                        <p class="text-center" style="color: #f8981d; font-size: 20px;">
                            Irlanda Torres
                        </p>
                    </div>
                </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item mx-auto" role="presentation">
                        <button onclick="cambioImagen(1, 'pills-home-tab')" class="active text-center"
                            id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                            role="tab" aria-controls="pills-home" aria-selected="true">
                            <img id="opacity_1" class="d-none" style="width: 100px;"
                                src="{{ asset('assets/img/testimonios/1_opacity.jpg') }}" alt="">
                            <img id="testimonio_1" class="" style="width: 100px;"
                                src="{{ asset('assets/img/testimonios/1_testimonio.jpg') }}" alt="">
                        </button>
                    </li>
                    <li class="nav-item mx-auto" role="presentation">
                        <button onclick="cambioImagen(2, 'pills-profile-tab')" class="text-center" id="pills-profile-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">
                            <img id="opacity_2" style="width: 100px;"
                                src="{{ asset('assets/img/testimonios/2_opacity.jpg') }}" alt="">
                            <img id="testimonio_2" class="d-none" style="width: 100px;"
                                src="{{ asset('assets/img/testimonios/2_testimonio.jpg') }}" alt="">
                        </button>
                    </li>
                    <li class="nav-item mx-auto" role="presentation">
                        <button onclick="cambioImagen(3, 'pills-contact-tab')" class="text-center" id="pills-contact-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                            aria-controls="pills-contact" aria-selected="false">
                            <img id="opacity_3" style="width: 100px;"
                                src="{{ asset('assets/img/testimonios/3_opacity.jpg') }}" alt="">
                            <img id="testimonio_3" class="d-none" style="width: 100px;"
                                src="{{ asset('assets/img/testimonios/3_testimonio.jpg') }}" alt="">
                        </button>
                    </li>
                </ul>
            </div>
            <div class="ratio ratio-16x9 col-12 col-md-6"> <!--  width="560" height="315" -->
                <iframe src="https://www.youtube.com/embed/5MsJSD6121g"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" title="UNIMEX"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>

    @php
        $origen = "Home";
    @endphp
    @include('include.contactoForm')
    @include('modales.modalCalculaTuCuota')
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/combos.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#listCarreras').slick({
                infinite: true,
                //autoplay: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
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
                autoplaySpeed: 2000,
                prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-chevron-compact-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="bi bi-chevron-compact-right"></i></button>',
            });

            $('#bannerInicial').slick({
                infinite: true,
                autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                autoplaySpeed: 2000,
                prevArrow: '<button type="button" class="slick-prev-banner"><i class="bi bi-chevron-compact-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next-banner"><i class="bi bi-chevron-compact-right"></i></button>',
            });

            $("#nivelSelect").append(`<option value="">- Selecciona un nivel -</option>`);
            $("#carreraSelect").append(`<option value="">- Selecciona una carrera -</option>`);

            $(document).ready(function() {
                $('#exampleModal').modal('show')
            });
        });
    </script>

    @include('include.redirecciones.outOfertaAcademica')
@endsection
