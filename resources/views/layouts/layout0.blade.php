<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora de Becas | UNIMEX</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <meta name="description"
        content="Con la calculadora de becas obtén el valor de tu beca para licenciatura, especialidad o maestría. Ingresa y obtén la promoción especial">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta property="og:site_name" content="Universidad Mexicana">
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Calculadora de Becas | UNIMEX">
    <meta property="og:description"
        content="Con la calculadora de becas obtén el valor de tu beca para licenciatura, especialidad o maestría. Ingresa y obtén la promoción especial">
    <meta property="og:url" content="https://unimex.edu.mx/calcula-tu-cuota/">
    <meta property="og:image" content="https://unimex.edu.mx/img/about/message/principal.png">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@soyunimex">
    <meta name="twitter:title" content="Universidad Mexicana">
    <meta name="twitter:description"
        content="En UNIMEX contamos con 15 Licenciaturas, 6 Posgrados y 3 Licenciaturas Abiertas. Inscribite ya">
    <meta name="twitter:image" content="https://unimexver.edu.mx/img/about/message/principal.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#004A92">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
    <link rel="canonical" href="https://unimex.edu.mx/calcula-tu-cuota/">
    <link rel="alternate" href="https://unimex.edu.mx/calcula-tu-cuota/" hreflang="x-default">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Calculadora de Becas | UNIMEX",
            "url": "https://unimex.edu.mx/calcula-tu-cuota/",
            "alternateName": "Calculadora Becas",
            "keywords": "calculadora de becas, becas licenciatura, becas maestria, becas posgrado, becas especialidad",
            "image": "https://unimex.edu.mx/img/about/message/principal.png",
            "about": {
                "@type": "Thing",
                "name": "Con la calculadora de becas obtén el valor de tu beca para licenciatura, especialidad o maestría. Ingresa y obtén la promoción especial"
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Universidad Mexicana",
            "url": "https://unimex.edu.mx/",
            "logo": "https://unimex.edu.mx/img/about/message/principal.png",
            "sameAs": [
                "https://www.facebook.com/unimex/",
                "https://twitter.com/soyunimex",
                "https://www.instagram.com/universidadmexicana",
                "https://mx.linkedin.com/school/universidad-mexicana",
                "https://www.youtube.com/user/SoyUNIMEX"
            ]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "CollegeOrUniversity",
            "name": "Universidad Mexicana",
            "url": "https://unimex.edu.mx/",
            "alternateName": "UNIMEX",
            "description": "En UNIMEX contamos con 17 Licenciaturas, 9 Posgrados y Licenciaturas Abiertas. Inscribete ya en cualquiera de nuestros planteles ubicados en Cuautitlán Izcalli, Satélite, Polanco y Veracruz",
            "telephone": "+52 5511020250",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Emilio Castelar No. 63, esq. Eugenio Sue",
                "addressLocality": "CDMX",
                "addressRegion": "CDMX",
                "postalCode": "11560",
                "addressCountry": "México"
            },
            "hasMap": "https://www.google.com/maps/d/embed?mid=1DEonwKOkwsq1_zCMM-Nd6HFjXU9Gk3E7&ehbc=2E312F",
            "logo": "https://unimex.edu.mx/img/about/message/principal.png",
            "sameAs": [
                "https://www.facebook.com/unimex/",
                "https://twitter.com/soyunimex",
                "https://www.instagram.com/universidadmexicana",
                "https://mx.linkedin.com/school/universidad-mexicana",
                "https://www.youtube.com/user/SoyUNIMEX"
            ]
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <style>
        .style_prevu_kit {
            -webkit-transition: all 200ms ease-in;
            -webkit-transform: scale(1);
            -ms-transition: all 200ms ease-in;
            -ms-transform: scale(1);
            -moz-transition: all 200ms ease-in;
            -moz-transform: scale(1);
            transition: all 200ms ease-in;
            transform: scale(1);
        }

        .style_prevu_kit:hover {
            box-shadow: 0px 0px 150px #000000;
            z-index: 2;
            -webkit-transition: all 200ms ease-in;
            -webkit-transform: scale(1.2);
            -ms-transition: all 200ms ease-in;
            -ms-transform: scale(1.2);
            -moz-transition: all 200ms ease-in;
            -moz-transform: scale(1.2);
            transition: all 200ms ease-in;
            transform: scale(1.2);
        }
    </style>

    <style media="print">
        #printButton,
        #correoButton {
            display: none;
        }

        .col-md-4 {
            flex: 0 0 auto !important;
            width: 33.33333333% !important;
        }

        .col-md-3 {
            flex: 0 0 auto !important;
            width: 25% !important;
        }

        .btn.active {
            color: #ffffff !important;
            background: #000000 !important;
        }

        .accordion-button:not(.collapsed) {
            color: #000000 !important;
            background-color: #ffffff !important;
            box-shadow: none;
        }
    </style>
</head>

<body>

    @if (isset($dataUTM))
        @if (
            $dataUTM['utm_medium'] == 'organico' ||
                $dataUTM['utm_medium'] == 'ORGANICO' ||
                $dataUTM['utm_medium'] == 'Organico' ||
                $dataUTM['utm_medium'] == null)
            @php
                $utmOrganico = true;
                $complemento = '';
            @endphp
        @else
            @php
                $utmOrganico = false;
                $complemento =
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
    @else
        @php
            $dataUTM['utm_source'] = session('utm_source');
            $dataUTM['utm_medium'] = session('utm_medium');
            $dataUTM['utm_campaign'] = session('utm_campaign');
            $dataUTM['utm_term'] = session('utm_term');
            $dataUTM['utm_content'] = session('utm_content');

            if (
                $dataUTM['utm_medium'] == 'organico' ||
                $dataUTM['utm_medium'] == 'ORGANICO' ||
                $dataUTM['utm_medium'] == 'Organico' ||
                $dataUTM['utm_medium'] == null
            ) {
                $utmOrganico = true;
            } else {
                $utmOrganico = false;
            }

            $complemento =
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
    <div class="container-fluid bg-unimex">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a
                        href="{{ env('APP_URL') . $complemento}}"><img
                            class="ms-4" src="{{ asset('assets/img/header/logo-2020.webp') }}" alt=""
                            style="width: 200px;"></a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-decoration-none" href="#">
                        <h1 class="text-white fw-normal d-none d-md-block d-lg-block">
                            Calculadora de Becas
                        </h1>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                </div>
            </div>
        </header>
    </div>

    @yield('content')

    <div class="container-fluid mt-3" style="background-color: #004b93;">
        <footer class="d-flex flex-wrap">
            <p class="col-md-4 mb-0 text-center text-white w-100">
                Universidad Mexicana. Derechos Reservados {{ date('Y') }}.
            </p>
        </footer>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/JQuery.print.js') }}"></script>
    <script>
        function setUrlBase() {
            let urlBase = "{{ env('APP_URL') }}";
            return urlBase;
        }
    </script>

    @yield('scripts')
</body>

</html>
