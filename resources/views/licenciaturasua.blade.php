@extends('layouts.layout')

@section('metas')
    @include('metas.licenciaturasSua.condicional')
@endsection

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

        #text_ventajas {
            height: 518px;
            overflow-y: scroll;
        }

        .bg_requisitos {
            background: url("{{ asset('assets/img/extras/requisitos.png') }}");
            background-position: center;
            background-size: cover;
        }

        #peridoSelectFolleto-error,
        #plantelSelectFolleto-error {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <!-- Inicio de portada -->
    <section id="portada" style="background-image: url({{ asset($licenciatura_sua->portada) }}); position: relative;">
        <h1 class="etiqueta-titulo p-3 text-uppercase" style="font-size: 30px;"> LICENCIATURA ABIERTA EN
            {{ $licenciatura_sua->titulo }} </h1>
    </section>
    <!-- Fin de portada -->

    <!-- Inicio de la sección de objetivo -->
    <section class="container-fluid p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="underlined_head_obj text-uppercase fw-normal" style="font-size: 1.438rem;">
                    LICENCIATURA ABIERTA EN {{ $licenciatura_sua->titulo }}
                </h2>
            </div>
            <div class="col-12 col-md-4 text-center">
                <p style="color: #014B94 !important; font-size: 15px !important;">
                    SISTEMA UNIVERSITARIO ABIERTO
                </p>
            </div>
            <div class="col-12 col-md-2 text-center">
                <p style="color: #014B94 !important; font-size: 15px !important;">
                    NO ESCOLARIZADO
                </p>
            </div>
            <div class="col-12 col-md-6 text-center">
                <p style="color: #014B94 !important; font-size: 15px !important;">
                    {!! $licenciatura_sua->reconocimiento !!}
                </p>
            </div>
            <div class="col-12">
                {!! $licenciatura_sua->objetivo !!}
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <div class="d-grid gap-2">
                            <a id="redireccionCTCL"
                                href="javascript:calculadoraHeader('{{ $licenciatura_sua->abreviatura }}')"
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
            </div>
        </div>
    </section>
    <!-- Fin de la sección de objetivo -->

    <!-- Inicio de la sección de ventajas height: 500px !important; -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 p-0">
                <div id="carrucelVentajas">
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%;" src="{{ asset('assets/img/licenciaturasSua/TERMINA_EN_2.png') }}"
                            class="lazyload" alt="Licenciatura UNIMEX" />
                    </div>
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%;" src="{{ asset('assets/img/licenciaturasSua/HORARIOS_FLEXIBLES.png') }}"
                            class="lazyload" alt="Licenciatura UNIMEX" />
                    </div>
                    <div style="width: 100%; height: 90vh;">
                        <img style="width: 100%;" src="{{ asset('assets/img/licenciaturasSua/ASESORIA_VOLUNTARIA.png') }}"
                            class="lazyload" alt="Licenciatura UNIMEX" />
                    </div>
                </div>
            </div>
            <div id="text_ventajas" class="col-12 col-md-6 col-lg-6 bg-articule p-5">
                <h2 style="font-size: 1.438rem;" class="underlined-head text-uppercase fw-normal">
                    VENTAJAS DE ESTUDIAR LA LICENCIATURA ABIERTA EN {{ $licenciatura_sua->titulo }} (SUA)
                </h2>
                <p>
                    <b>Se adapta a tu tiempo y tu vida.</b> Plan modular de 2 años 4 meses (7 cuatrimestres) que te permite
                    estudiar en tus tiempos cursando sólo 2 materias cada mes, ¡sin trabajos ni tareas! sólo un examen por
                    materia. <br>
                    El modelo es autodidacta y te brinda un avance programático claro y un Libro Base por materia que te
                    permite crear tu propia rutina de estudio, tomando el control sobre tu tiempo y toda la responsabilidad
                    sobre tu propia formación.
                    <br><br>
                    <b>Sin faltas.</b> Estudias por tu cuenta y en tus tiempos, sin compromiso de asistencia a clases. <br>
                    Puedes aplicar tu examen en línea o en plantel.
                    <br><br>
                    <b>Estarás acompañad@.</b> Si necesitas ayuda con algún tema, puedes participar en asesorías
                    presenciales o
                    virtuales (en línea) los sábados entre 8 y 14:30 hrs. Tu Asesor y la Red de Apoyo te brindarán el
                    acompañamiento académico que necesites durante la carrera.
                    <br><br>
                    <b>Beca del 40%</b> Te apoyamos con una beca académica desde el inicio de la carrera y cuotas muy
                    accesibles.
                    Sin gastos adicionales: incluye incorporación a la SEP, uso de plataformas, asesorías, servicio de
                    biblioteca y primera credencial de alumno.
                    <br><br>
                    <b>Reconocimiento de Validez Oficial de Estudios</b> RVOE Federal otorgado por la SEP que garantiza que
                    tus estudios serán oficialmente válidos.
                </p>
            </div>
        </div>
    </section>
    <!-- Fin de la sección de ventajas -->

    <!-- Inicio de asegura tu lugar -->
    <section class="py-3 container-fluid px-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center underlined-head-center fw-normal" style="font-size: 1.438rem;">
                    ASEGURA TU LUGAR Y TU BECA, TENEMOS CUPO LIMITADO:
                </h2>
                <p>
                    Debido a nuestro excelente Programa de Becas el cupo es limitado, así que te recomendamos completar tu
                    inscripción en el ciclo deseado para asegurar tu lugar y tu beca.
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
                <h2 class="text-center underlined-head-center fw-normal" style="font-size: 1.438rem;">
                    PLAN DE ESTUDIOS
                </h2>
                <p>
                    Plan modular de 2 años 4 meses (7 cuatrimestres) que te permite estudiar en tus tiempos cursando sólo 2
                    materias cada mes, ¡sin trabajos ni tareas! sólo un examen por materia. <br>
                    El modelo es autodidacta y te brinda un avance programático claro y un Libro Base por materia que te
                    permite crear tu propia rutina de estudio, tomando el control sobre tu tiempo y toda la responsabilidad
                    sobre tu propia formación.
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

    @include('include.folletoForm')

    <!-- Inicio de la Sección de Contacto -->
    @php
        $nivel = 'licenciatura/sua';
    @endphp
    @include('include.contactoForm')
    <!-- Fin de la Sección de Contacto -->

    <!-- Inicio de Campo Laboral -->
    <section class="bg_campo_laboral container-fluid px-5 py-5 text-white">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h2 style="font-size: 1.50rem;" class="underlined-head text-uppercase text-white">
                    LICENCIATURA ABIERTA EN {{ $licenciatura_sua->titulo }}
                </h2>
                <p>
                    Campo Laboral
                </p>
                <p class="text-justify">
                    {{ $licenciatura_sua->campo_laboral }}
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

    <!-- Inicio de la Sección de Requisitos -->
    <section class="container-fluid px-5 py-5">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 bg_requisitos">

            </div>
            <div class="col-12 col-md-8 col-lg-9">
                <h2 class="underlined-head fw-normal" style="font-size: 1.438rem;">
                    REQUISITOS
                </h2>
                <div id="requisitosSUA">
                    <div class="card border-0">
                        <div class="card-body">
                            <p class="fw-bold">Sólo necesitas:</p>
                            <ul class="list-unstyled">
                                <li>Comprobante de pago de inscripción.</li>
                                <li>Acta de nacimiento o documento alternativo.</li>
                                <li>Certificado de Bachillerato o documento alternativo.</li>
                                <li>En caso de ser menor de edad, solicita a uno de tus padres o tutores que te acompañen
                                    con Identificación oficial.</li>
                            </ul>
                            <p>
                                <br>
                                Para apartar tu lugar y tu beca en Universidad Mexicana puedes inscribirte desde que inicias
                                el último año del bachillerato, sólo considera que es indispensable tener aprobadas todas
                                las materias del bachillerato antes del primer día de clases de tu Licenciatura.
                            </p>
                        </div>
                    </div>
                    <div class="card border-0">
                        <div class="card-body">
                            <p class="fw-bold">Estudiantes Extranjeros Anexar:</p>
                            <ul>
                                <li>Copia de Pasaporte y visa.</li>
                                <li>Formato FM3 (expedido por la Secretaría de Relaciones Exteriores) que Avale su
                                    residencia como estudiantes.</li>
                                <li>Apostillado del Acta de Nacimiento.</li>
                                <li>Revalidación de Estudios emitida por la SEP (en caso de haber cursado los estudios
                                    previos en el extranjero).</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de la Sección de Requisitos -->

    <!-- Inicio de la Sección de disponibilidad -->
    {{-- <section class="container-fluid px-5 py-5 bg_planteles_dis">
        <div class="row">
            <div class="col-12 text-center p-0 mb-3">
                <h1 class="fw-light" style="font-size: 1.438rem; color: #ffff;">ESTA LICENCIATURA ESTÁ DISPONIBLE EN LOS
                    PLANTELES:</h1>
                <p class="text-white">
                    VERACRUZ <br>
                    {{ $licenciatura_sua->reconocimiento }}
                </p>
            </div>
        </div>
    </section> --}}
    <!-- Fin de la Sección de disponibilidad -->

    <!-- Inicio del Modal Como Obtengo Mi Beca -->
    @include('modales.comoObtengoMiBeca')
    <!-- Fin del Modal Como Obtengo Mi Beca --->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/combosCarrera.js') }}"></script>
    <script>
        $('#temario').slick({
            infinite: true,
            autoplay: false,
            slidesToShow: 4,
            slidesToScroll: 4,
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

        $('#requisitosSUA').slick({
            infinite: false,
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            autoplaySpeed: 2000,
            prevArrow: '<button type="button" class="slick-prev-requisitos"><i class="bi bi-arrow-left-circle-fill"></i></button>',
            nextArrow: '<button type="button" class="slick-next-requisitos"><i class="bi bi-arrow-right-circle-fill"></i></button>',
        });

        function getCarreraPosicion() {
            let carreraPosicionado = "{{ $licenciatura_sua->titulo }}";

            return carreraPosicionado;
        }

        function getNivelPosicion() {
            let nivelPosicionado = 1;

            return nivelPosicionado;
        }

        function getNivelPagina() {
            let nivelPosicionado = 2;

            return nivelPosicionado;
        }

        var nivelPosicionado = "Licenciatura";
        var carreraPosicionado = "{{ $licenciatura_sua->titulo }}";
        var turnoPosicionado = 5;

        $('#carrucelVentajas').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            dots: false,
            arrows: false,
        });

        $('#aceptarAvisoPrivacidadFolleto').on('click', function() {
            if ($(this).is(':checked')) {
                // Hacer algo si el checkbox ha sido seleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
                $('#descargaFolleto').attr('disabled', false);
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
                $('#descargaFolleto').attr('disabled', true);
            }
        });
    </script>



    <script src="{{ asset('assets/js/folletoUnimex/combos.js') }}"></script>
    <script src="{{ asset('assets/js/folletoUnimex/form.js') }}"></script>

    @include('include.redirecciones.inOfertaAcademica')
@endsection
