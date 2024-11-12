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

<noscript>Por favor habilita JavaScript para usar este sitio</noscript>
<nav class="navigation" style="background-color: #013F7A !important; padding: 8px 0px !important;">
    <div class="wrapper d-flex">
        <a href="{{ env('APP_URL') . $complemento }}" rel="noopener noreferrer">
        </a>
        <div class="menu" id="navigation1">
            <a class="btn-close-nav" onclick="nav.hide()"></a>
            <ul>
                <li>
                    <a onclick="subnav.show('subnavAbout')" title="Conoce la hisotria de Universidad Mexicana">Acerca
                        de UNIMEX </a>
                </li>
                <li>
                    <a onclick="subnav.show('alumnosegresados')"
                        title="Servicios para nuestos Alumnos y Egresados">Alumnos Y Egresados</a>
                </li>
                <li>
                    <a id="contactoHeader" href="javascript:redirigirContactoHeader()" title="Informes">Informes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navigation" style="padding: 10px 0">
    <div class="wrapper d-flex">
        <a href="{{ env('APP_URL') . $complemento }}" rel="noopener noreferrer">
            <img class="logo lazyload" src="{{ asset('assets/img/header/logo-2020.webp') }}" width="259"
                height="80" alt="Logo Institucional de Universidad Mexicana"
                title="Universidad Mexicana, educación que se adapta a ti.">
        </a>
        <div class="menu" id="navigation">
            <a class="btn-close-nav" onclick="nav.hide()"></a>
            <ul>

                <!-- parte del menu para celulares y tabletas, menu lateral -->
                <li class="d-block d-md-block d-lg-block text-center">
                    <a class="mt-1" style="display: inline-block" onclick="subnav.show('subnavAbout')"
                        title="">Acerca de unimex</a>
                </li>

                <li class="text-center">
                    <a class="mt-1" style="display: inline-block" onclick="subnav.show('subnavAcademicOffer')"
                        title="Conoce nuestras Licenciaturas, Maestrías y Posgrados">Oferta Académica</a>
                </li>
                <li class="text-center">
                    <a class="mt-1" style="display: inline-block" onclick="subnav.show('subnavSchools')"
                        title="Conoce nuestros 4 Planteles">Planteles</a>
                </li>
                @if (isset($licenciatura))
                    @php
                        $abreviatura = $licenciatura->abreviatura;
                    @endphp
                @elseif(isset($licenciatura_sua))
                    @php
                        $abreviatura = $licenciatura_sua->abreviatura;
                    @endphp
                @elseif(isset($posgrado))
                    @php
                        $abreviatura = $posgrado->abreviatura;
                    @endphp
                @else
                    @php
                        $abreviatura = '';
                    @endphp
                @endif

                <li class="d-none d-md-none d-lg-block">
                    <button onclick="calculadoraHeader('{{ $abreviatura }}')" id="linkCalculaTuBeca"
                        class="btn btn-outline-warning text-uppercase" rel="noopener"
                        title="Calcula tu Cuota">Calculadora de becas</button>
                </li>
                <li class="d-none d-md-none d-lg-block">
                    <button id="linkPreinscripcionEnLinea" class="btn btn-outline-warning text-uppercase"
                        onclick="preinscripcionHeader('{{ $abreviatura }}')" rel="noopener"
                        title="Preinscripción
                        en línea">Preinscripción
                        en línea</button>
                </li>
                <li class="d-block d-md-block d-lg-none text-center">
                    <a class="mt-1" style="display: inline-block" href="javascript:redirigirContactoHeader()"
                        title="">Contacto</a>
                </li>

                <li class="d-block d-md-block d-lg-none text-center">
                    <a class="mt-1" style="display: inline-block"
                        href="javascript:calculadoraHeader('{{ $abreviatura }}')" title="">Calculadora de
                        becas</a>
                </li>
                <li class="d-block d-md-block d-lg-none text-center">
                    <a class="mt-1" style="display: inline-block"
                        href="javascript:preinscripcionHeader('{{ $abreviatura }}')" title="">Preinscripción
                        en línea </a>
                </li>
            </ul>
        </div>
        <a class="toggler" onclick="nav.show()"></a>
    </div>
</nav>
<div class="wrapper">
    <nav class="subnav" id="subnavAbout">
        <a class="btn-close-nav" onclick="subnav.hide('subnavAbout')"></a>
        <div class="container">
            <div class="row">
                @foreach ($data['acercade'] as $acerca)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 left-gray-border">
                        <h5 class="hide">
                            <a href="{{ env('APP_URL') . 'acerca-de-unimex/' . $acerca->slug . $complemento }}">
                                {{ $acerca->nombre }} </a>
                        </h5>
                        <div class="card">
                            <a href="{{ env('APP_URL') . 'acerca-de-unimex/' . $acerca->slug . $complemento }}">
                                <div class="parent">
                                    <div class="child {{ $acerca->clase_img }}">
                                        <span class="linka"> {{ $acerca->nombre }} </span>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    {!! $acerca->descripcion !!}
                                </p>
                                <a href="{{ env('APP_URL') . 'acerca-de-unimex/' . $acerca->slug . $complemento }}"
                                    class="btn btn-primary btn-arrow-go">
                                    {{ $acerca->nombre }} </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </nav>
    <nav class="subnav" id="subnavSchools">
        <a class="btn-close-nav" onclick="subnav.hide('subnavSchools')"></a>
        <div class="container">
            <div class="row">
                @foreach ($data['planteles'] as $plantel)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 left-gray-border">
                        <h5 class="hide">
                            <a href="{{ env('APP_URL') . 'planteles/' . $plantel->nombre . $complemento }}">
                                {{ $plantel->nombre }}</a>
                        </h5>
                        <div class="card" style="min-height: 1px;">
                            <a href="{{ env('APP_URL') . 'planteles/' . $plantel->nombre . $complemento }}">
                                <div class="parent">
                                    <div class="child {{ $plantel->clase_img }}">
                                        <span class="linka text-capitalize">{{ $plantel->nombre }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    <br>
                                </p>
                                <a href="{{ env('APP_URL') . 'planteles/' . $plantel->nombre . $complemento }}"
                                    class="btn btn-primary btn-arrow-go">Plantel {{ $plantel->nombre }} </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </nav>
    <nav class="subnav" id="alumnosegresados">
        <a class="btn-close-nav" onclick="subnav.hide('alumnosegresados')"></a>
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
                    <h5 class="hide top-gray-border">
                        <a href="http://comunimex.lat/kioscoalumnosresponsive/" target="_blank" rel="noopener">Kiosco
                            en
                            Línea</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a target="_blank" rel="noopener" href="http://comunimex.lat/kioscoalumnosresponsive/">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-kiosco">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="http://comunimex.lat/kioscoalumnosresponsive/" target="_blank"
                                    rel="noopener"><span class="blue-text">Kiosco en Línea</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="http://portal.microsoftonline.com/" target="_blank" rel="noopener">Correo
                            ComUNIMEX</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a target="_blank" rel="noopener" href="http://portal.microsoftonline.com/">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-correo">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="http://portal.microsoftonline.com/" target="_blank" rel="noopener"><span
                                        class="blue-text">Correo ComUNIMEX</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="{{ route('examen_de_conocimientos') }}" target="_blank" rel="noopener">Examen
                            de Conocimientos</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a target="_blank" rel="noopener" href="{{ route('examen_de_conocimientos') }}">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-examen">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="{{ route('examen_de_conocimientos') }}" target="_blank"
                                    rel="noopener"><span class="blue-text">Examen de
                                        Conocimientos</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank"
                            rel="noopener">Resultados
                            del Examen de Conocimientos</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank" rel="noopener">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-resultadoexamen">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                                <a href="{{ route('resultados_examen_conocimientos') }}" target="_blank"
                                    rel="noopener"><span class="blue-text">Resultados del Examen de
                                        Conocimientos</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!--nuevo-->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12  left-gray-border">
                    <h5 class="hide">
                        <a href="{{ route('calendarios_escolares') }}" target="_blank"
                            rel="noopener noreferrer">Calendarios Escolares</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a href="{{ route('calendarios_escolares') }}" target="_blank" rel="noopener noreferrer">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-calendario">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="text-align: center;">
                                    <a href="{{ route('calendarios_escolares') }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <span class="blue-text">Calendarios Escolares</span></a>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <!--termina-->

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="javascript:void(0);"
                            onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')">Recomienda
                            UNIMEX®</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a href="javascript:void(0);"
                            onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-recomienda">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="javascript:void(0);"
                                    onClick="window.open('http://www.facebook.com/sharer.php?u=http://www.unimex.edu.mx','Compartir','scrollbars=no,width=600,height=450')"><span
                                        class="blue-text">Recomienda UNIMEX®</span></a>

                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="{{ route('opciones_de_titulacion') }}" target="_blank" rel="noopener">Opciones de
                            Titulación</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a href="{{ route('opciones_de_titulacion') }}" target="_blank" rel="noopener">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-titulacion">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="{{ route('opciones_de_titulacion') }}" target="_blank" rel="noopener"><span
                                        class="blue-text">Opciones de Titulación</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="{{ route('servicio.social') }}" target="_blank" rel="noopener">Servicio Social</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a href="{{ route('servicio.social') }}" target="_blank" rel="noopener">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-serviciosocial">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="{{ route('servicio.social') }}" target="_blank" rel="noopener"><span
                                        class="blue-text">Servicio Social</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="javascript:void(0);"
                            onClick="window.open('{{ asset('assets/pdf/reglamentoum.pdf') }}','Reglamento UNIMEX','scrollbars=no,width=580,height=600')">Reglamento
                            UNIMEX®</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a href="javascript:void(0);"
                            onClick="window.open('{{ asset('assets/pdf/reglamentoum.pdf') }}','Reglamento UNIMEX','scrollbars=no,width=580,height=600')">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-reglamento">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="javascript:void(0);"
                                    onClick="window.open('{{ asset('assets/pdf/reglamentoum.pdf') }}','Reglamento UNIMEX','scrollbars=no,width=580,height=600')"><span
                                        class="blue-text">Reglamento UNIMEX®</span></a>

                            </p>

                        </div>
                    </div>
                </div>
                <!--nueva bolsa de trabajo-->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 left-gray-border">
                    <h5 class="hide">
                        <a href="{{ route('bolsa_de_trabajo') }}" target="_blank" rel="noopener"
                            aria-label="Bolsa de Trabajo UNIMEX">Bolsa de Trabajo</a>
                    </h5>
                    <div class="card" style="min-height: 150px;">
                        <a target="_blank" rel="noopener" href="{{ route('bolsa_de_trabajo') }}"
                            aria-label="Bolsa de Trabajo UNIMEX">
                            <div class="parent" style="width: 150px;">
                                <div class="children bg-trabajo">
                                    <span class="linka">Ver Más</span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="card-text" style="text-align: center;">
                                <a href="{{ route('bolsa_de_trabajo') }}" target="_blank" rel="noopener"
                                    aria-label="Bolsa de Trabajo UNIMEX">
                                    <span class="blue-text">Bolsa de Trabajo</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="subnav" id="subnavAcademicOffer">
        <a class="btn-close-nav" onclick="subnav.hide('subnavAcademicOffer')"></a>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ">
                    <h5 onclick="subnav.list.toggle('bachelorsDegree')" id="bachelorsDegree">Licenciaturas
                    </h5>
                    <ul class="blue-bullet">
                        <li style="background: none;">
                            <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                        </li>
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 1 && $menu->mostrar == 1)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta = env('APP_URL') . 'licenciatura/' . $menu->slug . $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta = env('APP_URL') . 'licenciatura/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href="{{ $ruta }}">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li style="background: none;">
                            <span class="txtpequeno">DISPONIBLE SOLO EN PLANTELES METROPOLITANOS</span>
                        </li>
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 2 && $menu->mostrar == 1)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta = env('APP_URL') . 'licenciatura/' . $menu->slug . $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta = env('APP_URL') . 'licenciatura/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href="{{ $ruta }}">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li style="background: none;">
                            <span class="txtpequeno">DISPONIBLE SOLO EN PLANTEL VERACRUZ</span>
                        </li>
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 3)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta = env('APP_URL') . 'licenciatura/' . $menu->slug . $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta = env('APP_URL') . 'licenciatura/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href="{{ $ruta }}">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 left-gray-border">
                    <h5 onclick="subnav.list.toggle('SUA')" id="SUA">Licenciaturas a distancia<br></h5>
                    <ul class="blue-bullet">
                        {{--  <li style="background: none;">
                            <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                        </li> --}}
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 7)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta =
                                                env('APP_URL') .
                                                'licenciatura/distancia/' .
                                                $menu->slug .
                                                $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta =
                                                env('APP_URL') . 'licenciatura/distancia/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href=" {{ $ruta }} ">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 left-gray-border">
                    <h5 onclick="subnav.list.toggle('masterDegree')" id="masterDegree">Posgrados</h5>
                    <ul class="blue-bullet">

                        <li style="background: none;">
                            <span class="txtpequeno">DISPONIBLE EN TODOS LOS PLANTELES</span>
                        </li>
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 5)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta = env('APP_URL') . 'posgrado/' . $menu->slug . $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta = env('APP_URL') . 'posgrado/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href="{{ $ruta }}">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <li style="background: none;">
                            <span class="txtpequeno">DISPONIBLE SOLO EN PLANTELES METROPOLITANOS </span>
                        </li>
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 6)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta = env('APP_URL') . 'posgrado/' . $menu->slug . $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta = env('APP_URL') . 'posgrado/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href="{{ $ruta }}">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        <br>
                        <h5>Posgrados a distancia</h5>
                        @foreach ($data['menus'] as $menu)
                            @if ($menu->estado == 8 && $menu->mostrar == 1)
                                <li>
                                    @if ($utmOrganico == true)
                                        @php
                                            $ruta = env('APP_URL') . 'posgrado/distancia/' . $menu->slug . $menu->urlUTM;
                                        @endphp
                                    @else
                                        @php
                                            $ruta = env('APP_URL') . 'posgrado/distancia/' . $menu->slug . $complemento;
                                        @endphp
                                    @endif
                                    <a href="{{ $ruta }}">
                                        {{ $menu->nombre }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
