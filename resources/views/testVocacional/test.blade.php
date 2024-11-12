@extends('layouts.layoutTestVocacional')

@section('styles')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style-personal.min.css') }}">
    <link async rel="stylesheet" href="{{ asset('assets/petry/prettify.css') }}">
    <link async rel="stylesheet" href="{{ asset('assets/petry/bootstrap.min.css') }}">
    <script defer src="{{ asset('assets/petry/prettify.js') }}"></script>
    <script src="{{ asset('assets/petry/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/petry/jquery.bootstrap.wizard.js') }}"></script>
@endsection

@section('content')
    <div class='container'>

        <section id="wizard" style="padding:  5px;">

            <div class="container-fluid">
                <div class="col-sm-4">
                    <img data-src="img/logo-2020.avif" class="lazyload img-responsive">
                </div>
                <div class="col-sm-8">
                    <h1 class="title-main">Test Vocacional UNIMEX</h1>
                </div>
            </div>

            <div id="rootwizard">
                <div class="navbar" style="font-size: 1px; visibility: hidden;">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul>
                                <li><a href="#tab1" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 1</a></li>
                                <li><a href="#tab2" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 2</a></li>
                                <li><a href="#tab3" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 3</a></li>
                                <li><a href="#tab4" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 4</a></li>
                                <li><a href="#tab5" data-toggle="tab" class="disabled" tabindex="-1"> Pregunta 5</a></li>
                                <li><a href="#tab6" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 6</a></li>
                                <li><a href="#tab7" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 7</a></li>
                                <li><a href="#tab8" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 8</a></li>
                                <li><a href="#tab9" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 9</a></li>
                                <li><a href="#tab10" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 10</a></li>
                                <li><a href="#tab11" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 11</a></li>
                                <li><a href="#tab12" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 12</a></li>
                                <li><a href="#tab13" data-toggle="tab" class="disabled" tabindex="-1">Pregunta 13</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="bar" class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                        style="width: 0%;"></div>
                </div>
                <div class="tab-content">
                    <ul class="pager wizard">
                        <li class="next"><a href="#">Siguiente</a></li>
                    </ul>

                    <div class="tab-pane" id="tab1">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 1°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img src="{{ asset('assets/img/testVocacional/1.webp') }}"
                                                class="lazyload img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Si tuvieras que realizar un dibujo, ¿en qué pondrías
                                                más atención?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">
                                                <input class="form-check-input" type="radio" name="rp1"
                                                    id="rp1a" value="a">
                                                <label class="form-check-label response-answer" for="rp1a">
                                                    a) Colores y formas.</label>
                                            </div>
                                            <div class="zoom">
                                                <input class="form-check-input" type="radio" name="rp1"
                                                    id="rp1b" value="b">
                                                <label class="form-check-label response-answer" for="rp1b">
                                                    b) Detalles y mensaje.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 2°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img src="{{ asset('assets/img/testVocacional/2.webp') }}"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Cuando explicas a alguien cómo llegar a un lugar:
                                            </h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp2a">
                                                    <input class="form-check-input" type="radio" name="rp2"
                                                        id="rp2a" value="a">
                                                    a) Das pautas de cómo llegar.
                                                </label>
                                            </div>
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp2b">
                                                    <input class="form-check-input" type="radio" name="rp2"
                                                        id="rp2b" value="b">
                                                    b) Dibujas un croquis a detalle.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 3°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img src="{{ asset('assets/img/testVocacional/3.webp') }}"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Cuando compras un nuevo teléfono celular:</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp3a">
                                                    <input class="form-check-input" type="radio" name="rp3"
                                                        id="rp3a" value="a">
                                                    a) Te agrada por el color y la marca.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp3b">
                                                    <input class="form-check-input" type="radio" name="rp3"
                                                        id="rp3b" value="b">
                                                    b) Te fijas en las aplicaciones y capacidad de memoria.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 4°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img src="{{ asset('assets/img/testVocacional/4.webp') }}"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">¿Qué tomas en cuenta al confiarle algo a una
                                                persona?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp4a">
                                                    <input class="form-check-input" type="radio" name="rp4"
                                                        id="rp4a" value="a">
                                                    a) Haces caso a tu intuición de que no te traicionará.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp4b">
                                                    <input class="form-check-input" type="radio" name="rp4"
                                                        id="rp4b" value="b">
                                                    b) Piensas detalladamente si puedes confiar en él antes de decírselo.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab5">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 5°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/5.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">¿Qué se te facilita más cuando compras en el
                                                supermercado?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp5a">
                                                    <input class="form-check-input" type="radio" name="rp5"
                                                        id="rp5a" value="a">
                                                    a) Caminar por los pasillos e imaginar qué podría hacerte falta.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp5b">
                                                    <input class="form-check-input" type="radio" name="rp5"
                                                        id="rp5b" value="b">
                                                    b) Realizar una lista y únicamente comprar los productos que en ella
                                                    anotaste.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab6">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 6°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/6.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Cuando discutes con alguien, ¿cómo defiendes tu
                                                punto de vista?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp6a">
                                                    <input class="form-check-input" type="radio" name="rp6"
                                                        id="rp6a" value="a">
                                                    a) Describes los errores y contraatacas.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp6b">
                                                    <input class="form-check-input" type="radio" name="rp6"
                                                        id="rp6b" value="b">
                                                    b) Das evidencias con ejemplos reales.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab7">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 7°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/7.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">¿Qué tipo de clases son más de tu agrado?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp7a">
                                                    <input class="form-check-input" type="radio" name="rp7"
                                                        id="rp7a" value="a">
                                                    a) Artísticas y/o similares.
                                                </label>
                                            </div>
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp7b">
                                                    <input class="form-check-input" type="radio" name="rp7"
                                                        id="rp7b" value="b">
                                                    b) Matemáticas y/o similares.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab8">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 8°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/8.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">¿En qué te fijas más para que te agrade una nueva
                                                canción?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp8a">
                                                    <input class="form-check-input" type="radio" name="rp8"
                                                        id="rp8a" value="a">
                                                    a) En la letra.
                                                </label>
                                            </div>
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp8b">
                                                    <input class="form-check-input" type="radio" name="rp8"
                                                        id="rp8b" value="b">
                                                    b) En el ritmo.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab9">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 9°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/9.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Si tuvieras que cocinar algo para sorprender a tus
                                                amigos:</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp9a">
                                                    <input class="form-check-input" type="radio" name="rp9"
                                                        id="rp9a" value="a">
                                                    a) Preferirías improvisar para crear algo nuevo.
                                                </label>
                                            </div>
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp9b">
                                                    <input class="form-check-input" type="radio" name="rp9"
                                                        id="rp9b" value="b">
                                                    b) Buscarías una receta para seguirla paso a paso.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab10">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 10°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/10.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Cuando vas a entregar un trabajo escrito, pones más
                                                cuidado en:</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp10a">
                                                    <input class="form-check-input" type="radio" name="rp10"
                                                        id="rp10a" value="a">
                                                    a) La presentación.
                                                </label>
                                            </div>
                                            <div class="zoom">
                                                <label class="form-check-label response-answer" for="rp10b">
                                                    <input class="form-check-input" type="radio" name="rp10"
                                                        id="rp10b" value="b">
                                                    b) La ortografía.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab11">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 11°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/11.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">¿Cómo prefieres mantener tu habitación?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp11a">
                                                    <input class="form-check-input" type="radio" name="rp11"
                                                        id="rp11a" value="a">
                                                    a) No importa el orden mientras te sientas a gusto.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp11b">
                                                    <input class="form-check-input" type="radio" name="rp11"
                                                        id="rp11b" value="b">
                                                    b) Clasificas tus cosas ordenadamente.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab12">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 12°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/12.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Si tuvieras que aprender algo nuevo, entre estas dos
                                                opciones, ¿cuál elegirías?</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp12a">
                                                    <input class="form-check-input" type="radio" name="rp12"
                                                        id="rp12a" value="a">
                                                    a) Clases de arte.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp12b">
                                                    <input class="form-check-input" type="radio" name="rp12"
                                                        id="rp12b" value="b">
                                                    b) Un idioma.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab13">
                        <div class="container-fluid">
                            <div class="pleca-pregunta">
                                <div style="margin-left: 20px;">
                                    <h1 class="title-answer">Pregunta 13°</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="imgBorder"><img data-src="img/13.webp"
                                                class="lazyload img-responsive"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12 center-answer">
                                            <h1 class="title-pregunta">Si fueras al gimnasio, sería más de tu agrado:</h1>
                                        </div>
                                        <div class="col-sm-12 center-answerbody">
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp13a">
                                                    <input class="form-check-input" type="radio" name="rp13"
                                                        id="rp13a" value="a">
                                                    a) Sentirte con la libertad de elegir tus propios ejercicios.
                                                </label>
                                            </div>
                                            <div class="zoom">

                                                <label class="form-check-label response-answer" for="rp13b">
                                                    <input class="form-check-input" type="radio" name="rp13"
                                                        id="rp13b" value="b">
                                                    b) Que te asignen una rutina para tus necesidades.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </section>
    </div>

    <script>
        $(document).ready(function() {


            $('#tab1 input').on('change', function() {
                var res1 = ($('input[name=rp1]:checked', '#tab1').val());

                $('#tab2 input').on('change', function() {
                    var res2 = ($('input[name=rp2]:checked', '#tab2').val());


                    $('#tab3 input').on('change', function() {
                        var res3 = ($('input[name=rp3]:checked', '#tab3').val());


                        $('#tab4 input').on('change', function() {
                            var res4 = ($('input[name=rp4]:checked', '#tab4')
                        .val());


                            $('#tab5 input').on('change', function() {
                                var res5 = ($('input[name=rp5]:checked',
                                    '#tab5').val());


                                $('#tab6 input').on('change', function() {
                                    var res6 = ($(
                                        'input[name=rp6]:checked',
                                        '#tab6').val());

                                    $('#tab7 input').on('change',
                                        function() {
                                            var res7 = ($(
                                                    'input[name=rp7]:checked',
                                                    '#tab7')
                                                .val());


                                            $('#tab8 input').on(
                                                'change',
                                                function() {
                                                    var res8 =
                                                        ($('input[name=rp8]:checked',
                                                                '#tab8'
                                                                )
                                                            .val()
                                                            );

                                                    $('#tab9 input')
                                                        .on('change',
                                                            function() {
                                                                var res9 =
                                                                    ($('input[name=rp9]:checked',
                                                                            '#tab9'
                                                                            )
                                                                        .val()
                                                                        );

                                                                $('#tab10 input')
                                                                    .on('change',
                                                                        function() {
                                                                            var res10 =
                                                                                ($('input[name=rp10]:checked',
                                                                                        '#tab10'
                                                                                        )
                                                                                    .val()
                                                                                    );

                                                                            $('#tab11 input')
                                                                                .on('change',
                                                                                    function() {
                                                                                        var res11 =
                                                                                            ($('input[name=rp11]:checked',
                                                                                                    '#tab11'
                                                                                                    )
                                                                                                .val()
                                                                                                );

                                                                                        $('#tab12 input')
                                                                                            .on('change',
                                                                                                function() {
                                                                                                    var res12 =
                                                                                                        ($('input[name=rp12]:checked',
                                                                                                                '#tab12'
                                                                                                                )
                                                                                                            .val()
                                                                                                            );

                                                                                                    $('#tab13 input')
                                                                                                        .on('change',
                                                                                                            function() {
                                                                                                                var res13 =
                                                                                                                    ($('input[name=rp13]:checked',
                                                                                                                            '#tab13'
                                                                                                                            )
                                                                                                                        .val()
                                                                                                                        );


                                                                                                                var vegetales = [
                                                                                                                    res1,
                                                                                                                    res2,
                                                                                                                    res3,
                                                                                                                    res4,
                                                                                                                    res5,
                                                                                                                    res6,
                                                                                                                    res7,
                                                                                                                    res8,
                                                                                                                    res9,
                                                                                                                    res10,
                                                                                                                    res11,
                                                                                                                    res12,
                                                                                                                    res13
                                                                                                                ];

                                                                                                                var Searcha =
                                                                                                                    "a"
                                                                                                                var ia =
                                                                                                                    0;
                                                                                                                var countera =
                                                                                                                    0;
                                                                                                                while (
                                                                                                                    ia !=
                                                                                                                    -
                                                                                                                    1
                                                                                                                    ) {
                                                                                                                    var ia =
                                                                                                                        vegetales
                                                                                                                        .indexOf(
                                                                                                                            Searcha,
                                                                                                                            ia
                                                                                                                            );
                                                                                                                    if (ia !=
                                                                                                                        -
                                                                                                                        1
                                                                                                                        ) {
                                                                                                                        ia++;
                                                                                                                        countera++;
                                                                                                                    }
                                                                                                                }
                                                                                                                console
                                                                                                                    .log(
                                                                                                                        countera
                                                                                                                        );

                                                                                                                var Searchb =
                                                                                                                    "b"
                                                                                                                var ib =
                                                                                                                    0;
                                                                                                                var counterb =
                                                                                                                    0;
                                                                                                                while (
                                                                                                                    ib !=
                                                                                                                    -
                                                                                                                    1
                                                                                                                    ) {
                                                                                                                    var ib =
                                                                                                                        vegetales
                                                                                                                        .indexOf(
                                                                                                                            Searchb,
                                                                                                                            ib
                                                                                                                            );
                                                                                                                    if (ib !=
                                                                                                                        -
                                                                                                                        1
                                                                                                                        ) {
                                                                                                                        ib++;
                                                                                                                        counterb++;
                                                                                                                    }
                                                                                                                }
                                                                                                                console
                                                                                                                    .log(
                                                                                                                        counterb
                                                                                                                        );

                                                                                                                if (countera >
                                                                                                                    counterb
                                                                                                                    ) {
                                                                                                                    location
                                                                                                                        .href =
                                                                                                                        "hemisferio-a.php";
                                                                                                                } else {
                                                                                                                    location
                                                                                                                        .href =
                                                                                                                        "hemisferio-b.php";

                                                                                                                }





                                                                                                            }
                                                                                                            );
                                                                                                }
                                                                                                );
                                                                                    }
                                                                                    );
                                                                        }
                                                                        );
                                                            }
                                                            );
                                                });
                                        });
                                });
                            });
                        });
                    });
                });
            });



            $('#rootwizard').bootstrapWizard({
                onNext: function(tab, navigation, index) {
                    if (index == 1) {
                        // Make sure we entered the name
                        if (!$('#tab1').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta1: Seleciona una respuesta');
                            return false;
                        }

                    }



                    if (index == 2) {
                        // Make sure we entered the name
                        if (!$('#tab2').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta2: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 3) {
                        // Make sure we entered the name
                        if (!$('#tab3').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta3: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 4) {
                        // Make sure we entered the name
                        if (!$('#tab4').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta 4: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 5) {
                        // Make sure we entered the name
                        if (!$('#tab5').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta5: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 6) {
                        // Make sure we entered the name
                        if (!$('#tab6').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta6: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 7) {
                        // Make sure we entered the name
                        if (!$('#tab7').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta7: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 8) {
                        // Make sure we entered the name
                        if (!$('#tab8').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta8: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 9) {
                        // Make sure we entered the name
                        if (!$('#tab9').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta9: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 10) {
                        // Make sure we entered the name
                        if (!$('#tab10').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta10: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 11) {
                        // Make sure we entered the name
                        if (!$('#tab11').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta11: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 12) {
                        // Make sure we entered the name
                        if (!$('#tab12').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta12: Seleciona una respuesta');
                            return false;
                        }
                    }
                    if (index == 13) {
                        // Make sure we entered the name
                        if (!$('#tab13').find("input[type='checkbox'],input[type='radio']").is(
                                ":checked")) {
                            alertify.alert('Pregunta13: Seleciona una respuesta');
                            return false;
                        }
                    }


                },

                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#rootwizard .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });



        });
    </script>
@endsection
