<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prospectación UNIMEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/prospectacion.css') }}">
    <style>

    </style>
</head>

<body>

    <header>
        <div class="nav">
            <a href="https://unimex.edu.mx">
                <img id="logo" src="{{ asset('assets/img/prospectacion/Logo Metro.png') }}" alt="Logo UNIMEX">
            </a>
        </div>
    </header>

    <section>

        <!--formulario-->
        <form  method="POST" id="formulario">

            <!--frase 1-->
            <div id="frase1" class="sticky-sm-top">FICHA DE REGISTRO UNIMEX</div>

            <div class="row" id="contenedor">

                <div class="col-md-6 col-md">

                    <label class="form-label" for="nombre">Nombre y apellidos:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">

                    <label class="form-label" for="celular">Teléfono celular:</label>
                    <input class="form-control" type="text" name="celular" id="celular" maxlength="10"
                        pattern="[0-9]+">

                    <label class="form-label" for="tel-casa">Teléfono de casa:</label>
                    <input class="form-control" type="text" name="telefono_casa" id="casa" maxlength="10"
                        pattern="[0-9]+">

                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email">

                    <label class="form-label" for="nivel">Nivel de interés:</label>
                    <input class="form-control" type="text" name="nivel" id="nivel" value="Licenciatura"
                        readonly>

                </div>

                <div class="col-md-6 col-md">

                    <label class="form-label" for="carrera">Carrera / Programa:</label>
                    <input class="form-control" type="text" name="carrera" id="carrera">

                    <label class="form-label" for="horario">Horario de interés:</label>
                    <input class="form-control" type="text" name="horario" id="horario">

                    <label class="form-label" for="periodo">Periodo en el que deseas ingresar:</label>
                    <input class="form-control" type="text" name="periodo" id="periodo">

                    <label class="form-label" for="plantel">Plantel de interés:</label>
                    <input class="form-control" type="text" name="plantel" id="plantel">

                    <label class="form-label" for="escuela">Escuela de origen:</label>
                    <input class="form-control" type="text" name="escuela" id="escuela">
                    <br>
                </div>

                <hr>

                <div class="mb-3" id="pregunta">
                    <label class="form-label">¿Sabes de alguien que quiera recibir informes?</label>
                </div>

                <div class="col-md-6 col-md">
                    <label class="form-label" for="nombre2">Nombre:</label>
                    <input class="form-control" type="text" name="nombre2" id="nombre2">
                </div>

                <div class="col-md-6 col-md">
                    <label class="form-label" for="telefono2">Teléfono:</label>
                    <input class="form-control" type="text" name="telefono2" id="telefono2" maxlength="10"
                        pattern="[0-9]+">
                    <br>
                </div>


                <div class="col-md-12 col-md">
                    <div class="mb-3" id="div-check">
                        <input class="form-check-input" type="checkbox" name="chech" id="checkbox">
                        <label class="form-ckeck-label" for="check">He leído y acepto el <a
                                href="https://unimex.edu.mx/aviso-privacidad" target="_blank">Aviso de
                                privacidad</a></label>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto" id="div-btn">
                    <button class="btn btn-primary" type="submit" id="boton">ENVIAR</button>
                </div>
            </div>

            <!--frase 2-->
            <div id="frase2" class="sticky-sm-top">!Únete a la comunidad<br>Unimexitaria!</div>


        </form>

    </section>

    <footer>
        <p>UNIVERSIDAD MEXICANA 2022</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
