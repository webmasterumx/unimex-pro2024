@extends('layouts.layout')

@section('styles')
    <style>
        .bg_contacto {
            background: url("{{ asset('assets/img/extras/bg-01.webp') }}");
            background-position: center;
            background-size: cover;
        }

        .bg_campo_laboral {
            background: url("{{ asset('assets/img/extras/campo_laboral.jpg') }}");
            background-position: center;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
    <!-- Inicio de portada -->
    <section id="portada" style="background-image: url({{ asset($licenciatura_distancia->portada) }}); position: relative;">
        <h1 class="etiqueta-titulo p-3 text-uppercase">
            licenciatura a distancia {{ $licenciatura_distancia->titulo }}
        </h1>
    </section>
    <!-- Fin de portada -->

    <!-- Inicio de la sección de objetivo -->
    <section class="container-fluid p-5">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                <h2 class="underlined-head text-uppercase fw-normal" style="font-size: 1.438rem;">
                    OBJETIVO
                </h2>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-12 col-md-4 mb-3" style="font-size: 15px !important; color: #014B94 !important;">
                        SISTEMA UNIVERSITARIO A DISTANCIA
                    </div>
                    <div class="col-12 col-md-2 mb-3" style="font-size: 15px !important; color: #014B94 !important;">
                        NO ESCOLARIZADO
                    </div>
                    <div class="col-12 col-md-6 mb-3" style="font-size: 15px !important; color: #014B94 !important;">
                        {!! $licenciatura_distancia->rvoe !!}
                    </div>
                    <div class="col-12">
                        <b>
                            {!! $licenciatura_distancia->descripcion !!}
                        </b>
                        <br>
                        {!! $licenciatura_distancia->subDescripcion !!}
                        <br>
                        <ul>
                            <li>
                                Plan cuatrimestral modular.
                            </li>
                            <li>
                                Duración total: 3 años (9 cuatrimestres).
                            </li>
                            <li>
                                Modalidad: No escolarizada.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <div class="d-grid gap-2">
                            <a id="redireccionCTCL"
                                href="javascript:calculadoraHeader('{{ $licenciatura_distancia->abreviatura }}')"
                                class="btn btn-outline-primary">
                                Calculadora de Becas
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <div class="d-grid gap-2">
                            <a id="redireccionPELL"
                                href="javascript:preinscripcionHeader('{{ $licenciatura_sua->abreviatura }}')"
                                class="btn text-white" style="background-color: #de951b;">
                                Preinscripción En Línea
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Fin de la sección de objetivo -->

    <!-- Inicio de la sección de ventajas height: 500px !important; -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 p-0">
                <div id="carrucelVentajas">
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%; height: 100%;"
                            src="{{ asset('assets/img/2024/ventajas/distancia_1.png') }}" class="lazyload"
                            alt="Licenciatura UNIMEX" />
                    </div>
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%; height: 100%;"
                            src="{{ asset('assets/img/2024/ventajas/distancia_2.png') }}" class="lazyload"
                            alt="Licenciatura UNIMEX" />
                    </div>
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%; height: 100%;"
                            src="{{ asset('assets/img/2024/ventajas/distancia_3.png') }}" class="lazyload"
                            alt="Licenciatura UNIMEX" />
                    </div>
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%; height: 100%;"
                            src="{{ asset('assets/img/2024/ventajas/distancia_4.png') }}" class="lazyload"
                            alt="Licenciatura UNIMEX" />
                    </div>
                </div>
            </div>
            <div id="text_ventajas" class="col-12 col-md-6 col-lg-6 bg-articule px-4">
                <h2 style="font-size: 1.438rem;" class="underlined-head text-uppercase fw-normal mt-4">
                    VENTAJAS DE ESTUDIAR LA LICENCIATURA A DISTANCIA EN {{ $licenciatura_distancia->titulo }}
                </h2>
                <p>
                    <b>
                        Enfoque
                    </b>
                    <br>
                    1 ó 2 materias por módulo, 3 módulos por cuatrimestre.
                    <br><br>
                    <b>
                        Tú decides
                    </b>
                    <br>
                    Conéctate a las sesiones desde donde quieras o ve la grabación.
                    <br><br>
                    <b>
                        Acompañamiento.
                    </b>
                    <br>
                    Cuentas con un asesor para guiar tu aprendizaje y coordinador para monitorear tu avance.
                    <br><br>
                    <b>
                        Reconocimiento de Validez Oficial de Estudios
                    </b>
                    <br>
                    RVOE Federal otorgado por la SEP que garantiza que tus estudios serán oficialmente válidos.
                </p>
            </div>
        </div>
    </section>
    <!-- Fin de la sección de ventajas -->

    <!-- Inicio de asegura tu lugar -->
    <section class="py-3 container-fluid px-5">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2">
                <h2 class="underlined-head fw-normal mt-3" style="font-size: 1.438rem;">
                    ASEGURA TU LUGAR Y TU BECA, TENEMOS CUPO LIMITADO:
                </h2>
            </div>
            <div class="col-12 col-md-10 col-lg-10">
                <p>
                    Debido a nuestro excelente <b>Programa Académico en la modalidad “A distancia”</b> el cupo es limitado,
                    así que
                    te recomendamos completar tu inscripción en el ciclo deseado para asegurar tu lugar.
                </p>
                <ol class="ms-3">
                    <li>
                        <b>Solicita tu Beca y tu Matrícula UNIMEX® con tu asesor.</b>
                        <ol class="ms-4" type="a">
                            <li>
                                Llama o envía mensaje de WhatsApp al <a target="_blank" style="color: #de951b"
                                    href="https://wa.me/525511020290/?text=Hola!+Me+gustaría+recibir+más+información+sobre+los+programas,+cuotas+y+promociones+de+UNIMEX;+me+interesó+lo+que+vi+en+Página+Web+Metro+sobre+contacto+en+WhatsApp+(botón).+¡Gracias!">55
                                    1102 0290.</a>
                            </li>
                            <li>
                                Promoción Especial: Pregunta por la <u>cuota especial de inscripción si te inscribes el
                                    mismo día de tu matriculación.</u>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <b>Realiza el pago de tu Inscripción.</b> <br>
                        Estas son las formas de pago:
                        <ol class="ms-4" type="a">
                            <li>
                                Transferencia SPEI: consulta los datos del plantel seleccionado
                            </li>
                            <li>
                                Pago en sucursal Scotiabank, solicita la ficha con tu asesor o por WhatsApp al <a
                                    target="_blank" style="color: #de951b"
                                    href="https://wa.me/525511020290/?text=Hola!+Me+gustaría+recibir+más+información+sobre+los+programas,+cuotas+y+promociones+de+UNIMEX;+me+interesó+lo+que+vi+en+Página+Web+Metro+sobre+contacto+en+WhatsApp+(botón).+¡Gracias!">55
                                    1102 0290.</a>
                            </li>
                            <li>
                                Pago con tarjeta de débito o crédito en plantel, aceptamos Visa y Mastercard.
                            </li>
                        </ol>
                    </li>
                    <li>
                        <b>Entrega tus documentos y completa tu inscripción.</b>
                        <ol class="ms-4" type="a">
                            <li>
                                Acta de Nacimiento (original y una copia).
                            </li>
                            <li>
                                Certificado de Preparatoria; si aún no lo tienes, coméntalo con tu asesor pues puedes
                                inscribirte presentando documentos provisionales como la Carta de Terminación de Estudios y
                                el Historial Académico (Original y una copia).
                            </li>
                            <li>
                                Comprobante de Pago de inscripción (una copia)
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>
    </section>
    <!-- Fin de asegura tu lugar -->

    <!-- Inicio de temario -->
    <section class="py-3 container-fluid px-5">
        <div class="row">
            <div class="col-12">
                <h2 class="underlined-head fw-normal" style="font-size: 1.438rem;">
                    PLAN DE ESTUDIOS
                </h2>
                <p>
                    Plan modular de 3 años (9 cuatrimestres) con flexibilidad horaria y acompañamiento en línea. El modelo
                    es autodidacta y te brinda un avance programático claro y un Libro Base por materia que te permite crear
                    tu propia rutina de estudio, tomando el control sobre tu tiempo y toda la responsabilidad sobre tu
                    propia formación
                </p>
            </div>
            <div id="temario" class="col-12 mt-5">
                @for ($i = 0; $i < sizeof($temario); $i++)
                    <div class="card border-0 mx-3 h-100" style="max-height: 400px;">
                        <h5 class="card-header bg-unimex text-white text-center">
                            {{ $temario[$i]['nombrecuatrimestre'] }}</h5>
                        <div class="card-body bg-articule" style="min-height: 400px;">
                            <ul>
                                @for ($j = 0; $j < sizeof($temario[$i]['temas']); $j++)
                                    <li class="py-1">
                                        {{ $temario[$i]['temas'][$j] }}
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <!-- Fin de temario -->

    <!-- Inicio de la Sección de Contacto -->
    @php
        $nivel = 'licenciatura/sua';
    @endphp
    @include('include.contactoForm')
    <!-- Fin de la Sección de Contacto -->

    <!-- Inicio de Campo Laboral -->
    <section class="bg_campo_laboral container-fluid px-5 py-5 text-white mb-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h2 style="font-size: 1.50rem;" class="underlined-head text-uppercase text-white">
                    LICENCIATURA A DISTANCIA EN {{ $licenciatura_distancia->titulo }}
                </h2>
                <p>
                    Campo Laboral
                </p>
                <p class="text-justify">
                    {{ $licenciatura_distancia->campoLaboral }}
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-6 px-3">
                <div id="campo_laboral">
                    @for ($z = 0; $z < sizeof($campo_laboral); $z++)
                        <div class="card bg-transparent border-0">
                            <div class="card-body text-center text-white">
                                <center>
                                    <img src="{{ asset('assets/img/extras/organization.png') }}" alt="">
                                </center>
                                <br>
                                <p>
                                    {!! $campo_laboral[$z] !!}
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de Campo Laboral -->

@endsection


@section('scripts')
    <script>
        $('#temario').slick({
            infinite: true,
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1100,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }, {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
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
            prevArrow: '<button type="button" class="slick-prev-tema"><i class="bi bi-chevron-compact-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next-tema"><i class="bi bi-chevron-compact-right"></i></button>',
        });

        $('#carrucelVentajas').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            dots: false,
            arrows: false,
        });

        $('#campo_laboral').slick({
            infinite: false,
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 3,
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
            prevArrow: '<button type="button" class="slick-prev-campo"><i class="bi bi-chevron-compact-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next-campo"><i class="bi bi-chevron-compact-right"></i></button>',
        });
    </script>
@endsection
