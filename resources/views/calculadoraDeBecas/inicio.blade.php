@extends('layouts.layout')

@section('content')
    <!-- Inicio Banner Principal -->
    <section class="container-fluid" id="bannerCalculadoraInicial">
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <h1 style="font-size: 4vh; margin-top: 15%; margin-bottom: 0; color: #004b93;">
                    CALCULADORA DE
                </h1>
                <h1 style="font-size: 9vh; color: #004b93;">
                    BECAS
                </h1>
            </div>
        </div>
    </section>
    <!-- Fin Banner Principal -->

    <!-- Inicio de Información -->
    <section class="container py-4 mt-5" id="informacion">
        <div class="row">
            <div class="col-12">
                <p class="fw-normal text-center mb-4" style="font-size: 14px !importat;">
                    En Universidad Mexicana estamos compromotedidos con la formación de nuestros estudiantes por lo que
                    promovemos y premiamos la excelencia
                    académica de los alumnos con buen promedio, a través del apoyo económico de nuestro Programa de Becas:
                </p>
                <p class="text-center py-4 px-5 mb-5" style="background-color: #dee2e6; color: #004b93;">
                    <b>
                        Al inscribirse en UNIMEX todos nuestros alumnos obtienen una BECA desde 25% hasta 60% en cualquiera
                        de nuestras 15 Licenciaturas. *
                    </b>
                </p>
                <p class="mt-3 text-center" style="font-size: 25px !important; color: #004b93;">
                    <b>
                        Obtén una BECA en tu inscripción para nuevo ingreso, ¡es muy sencillo!
                    </b>
                </p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <img src="{{ asset('assets/img/calculadora_de_cuotas/ic_1.png') }}" alt="">
                <p class="text-center mt-3">
                    Llena el siguente formulario con tus datos personales.
                </p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <img src="{{ asset('assets/img/calculadora_de_cuotas/ic_3.png') }}" alt="">
                <p class="text-center mt-3">
                    Elige la Licenciatura y horarios de tu preferencia.
                </p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <img src="{{ asset('assets/img/calculadora_de_cuotas/ic_2.png') }}" alt="">
                <p class="text-center mt-3">
                    Por último termina tu preinscripción en línea y estas listo para ser... ¡UNIMEXITARIO!
                </p>
            </div>
            <div class="col-12 col-md-6 my-5">
                <img class="img-fluid" src="{{ asset('assets/img/calculadora_de_cuotas/2.webp') }}" alt="">
            </div>
            <div class="col-12 col-md-6 my-5">
                <img class="img-fluid" src="{{ asset('assets/img/calculadora_de_cuotas/3.webp') }}" alt="">
            </div>
            <div class="col-12 py-5 px-4" style="background-color: #dee2e6;">
                <form id="form_calculadora" class="row">
                    @csrf
                    <div class="col-12">
                        <h1 style="color: #004b93 !important;">
                            ¡Calcula tu BECA!
                        </h1>
                    </div>
                    <div class="col-12 col-md-4">
                        <select class="form-select" id="selectPlantel" name="selectPlantel"
                            style="background-color: #fff !important; color: #004b93 !important;">
                            <option selected value="">Selecciona el Plantel CDMX</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <select class="form-select" id="selectPeriodo" name="selectPeriodo"
                            style="background-color: #fff !important; color: #004b93 !important;">
                            <option selected value="">¿Cuándo deseas iniciar?</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <select class="form-select" id="selectNivel" name="selectNivel"
                            style="background-color: #fff !important; color: #004b93 !important;">
                            <option selected value="">Selecciona el Nivel</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <hr style="border-top: 2px dotted #de951b; opacity: 1;">
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nombreProspecto" name="nombreProspecto"
                                placeholder="Nombre *">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="apellidosProspecto" name="apellidosProspecto"
                                placeholder="Apellido *">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="telefonoProspecto" name="telefonoProspecto"
                                placeholder="Teléfono *">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="emailProspecto" name="emailProspecto"
                                placeholder="Email *">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="form-check">
                            <input style="width: 12px !important; height: 12px !important;" class="form-check-input"
                                type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                He leído y acepto el aviso de privacidad
                            </label>
                        </div>
                        <button id="envio_caluladora" type="submit" class="btn btn-primary mt-3">Calcular mi
                            beca</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Fin de Información -->

    <!-- Inicio del Cargador -->
    <section class="container py-4 d-none" id="cargador">
        <div class="row">
            <div class="col-12 text-center">
                <div class="spinner-border" style="color: #004b93 !important; width: 80px; height: 80px;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p style="font-size: 35px !important; color: #004b93;">
                    Cargando Datos
                </p>
            </div>
        </div>
    </section>
    <!-- Fin del Cargador -->

    <!-- Inicio de Calculadora -->
    <section class="container py-4 d-none" id="calculadora">
        <div class="row">
            <div class="col-12 text-center">
                <p style="font-size: 30px !important; color: #004b93;">
                    <b>
                        ¡Estás a un paso de ser UNIMEXITARIO!
                    </b>
                </p>
            </div>
            <div class="col-12 col-md-3">
                <input class="form-control text-center border-0" disabled type="text" id="folioCrm" name="folioCrm"
                    style="color: #004b93;">
            </div>
            <div class="col-12 col-md-3">
                <input class="form-control text-center border-0" disabled type="text" id="nombreCrm" name="nombreCrm"
                    style="color: #004b93;">
            </div>
            <div class="col-12 col-md-3">
                <input class="form-control text-center border-0" disabled type="text" id="periodoCrm"
                    name="periodoCrm" style="color: #004b93;">
            </div>
            <div class="col-12 col-md-3">
                <input class="form-control text-center border-0" disabled type="text" id="nivelCrm" name="nivelCrm"
                    style="color: #004b93;">
            </div>
            <div class="col-12 text-center mt-4">
                <p>
                    Elige la Licenciatura de interes y despues el horario que prefieres
                </p>
            </div>
            <div class="col-12">
                <select id="selectCarrera" name="selectCarrera" class="form-select mx-auto w-75 text-center">
                    <option value="" selected disabled>- Selecciona una carrera -</option>
                </select>
            </div>
            <div id="cargador_horarios" class="col-12 text-center d-none mt-3">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p>
                    Opteniendo horarios disponibles...
                </p>
            </div>
            <div class="col-12">
                <div class="row" id="grupoBotones">

                </div>
            </div>
        </div>
    </section>
    <!-- Fin de Calculadora -->

    <!-- Inicio de Terminos y Condiciones -->
    <section class="container" id="terminosycondiciones">
        <div class="row">
            <div class="col-5 mt-4">
                <hr style="border-top: 2px dotted #de951b; opacity: 1;">
            </div>
            <div class="col-2 mt-4">
                <p class="text-center mt-2" style="font-size: 12px !important;">
                    Ver Términos y Condiciones
                </p>
            </div>
            <div class="col-5 mt-4">
                <hr style="border-top: 2px dotted #de951b; opacity: 1;">
            </div>
            <div class="col-12">
                <p style="font-size: 14px !important;">
                    La beca es valida para alumnos de nuevo ingreso al primer ciclo de Licenciatura y aplica desde el
                    momento en que ingresas a la Universidad en el pago de parcialidades y reinscripción. El porcentaje de
                    Beca no depende de tu promedio de Preparatoria o Bachillerato; se asigna según el plantel y horario que
                    eligas.
                    <br><br>
                    La beca se otorga durante los tres primeros ciclos. Al término del primer año, se renueva
                    cuatrimenstralmente, siempre y cuando cuentes con un promedio minimo de 8.0 (ocho) y sin materias
                    reprobadas. <br>
                    En caso de que pierdas tu beca al término del primer año por no haber alcanzado el promedio requerido
                    pero tenido aprobadas tus materias, la Universidad te da la oportunidad de conservar la mitad de la beca
                    inicial otorgada, siempre y cuando cada cuatrimestre mantengas el promedio mínimo de 8 (ocho) y no
                    tengas materias reprobadas.
                    Aplica la Beca mas baja si realizaste algún cambio durante la vigencia de tu Beca Anual. Una vez perdida
                    la beca ya no es recuperable.
                </p>
            </div>
        </div>
    </section>
    <!-- Fin de Terminos y Condiciones -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/newCalculadoraCuotas/app.js') }}"></script>
    <script src="{{ asset('assets/js/newCalculadoraCuotas/form.js') }}"></script>
    <script src="{{ asset('assets/js/newCalculadoraCuotas/combos.js') }}"></script>
@endsection
