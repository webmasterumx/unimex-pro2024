@extends('layouts.layout')

@section('content')
    <!-- Inicio de Examen de conocimientos -->
    <section class="container-fluid px-5 py-3">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <h2 class="underlined-head fw-normal" style="font-size: 1.438rem;">
                    EXAMEN DE <br>
                    CONOCIMIENTOS
                </h2>
            </div>
            <div class="col-12 col-md-7 col-lg-10">
                <p>
                    Examen escrito de reactivos de opción múltiple, que se fundamenta en los conocimientos básicos
                    indispensables que se deben tener en la Licenciatura. <br>
                    Se considera una opción para el recién egresado que tiene los conocimientos recientes y actualizados.
                    <br>
                    Si deseas presentar este examen, deberás acudir a Ventanilla Única, para verificar tu status de “alumno
                    regular” y que el expediente se encuentre con la documentación completa; después deberás llenar la
                    solicitud y pagar el costo en el banco.
                </p>
                <h6>
                    Requisitos
                </h6>
                <ul>
                    <li>Tener acreditados el 100 % de los créditos de la licenciatura.</li>
                    <li>Certificado Total de Estudios de Licenciatura o realizar el trámite del mismo.</li>
                    <li>Registrar la opción de titulación a través de la Solicitud Inicial para Titularse.</li>
                    <li>Pagar el costo completo del Examen de Conocimientos una semana antes de la fecha de aplicación.</li>
                    <li>Firmar contrato de aplicación de Examen de Conocimientos.</li>
                </ul>
                <h6>Convocatoria</h6>
                <ol type="1">
                    <li>Periodo de inscripciones: <b>del 13 de mayo al 29 de junio de 2019.</b></li>
                    <li>Fecha de aplicación del examen: <b> 05 de julio de 2019.</b></li>
                </ol>
                <p>
                    <b>Lugar de Aplicación: </b> Planteles UNIMEX®
                </p>
                <h6>
                    Publicación de Resultados.
                </h6>
                <small>
                    Términos.
                </small>
                <ul>
                    <li>
                        Este examen se puede aplicar indistintamente en cualquier plantel UNIMEX®.
                    </li>
                    <li>
                        La calificación del examen será ACREDITADO o NO ACREDITADO (no hay revisión de examen) el resultado
                        es inapelable e irrevocable y se publicarán el 05 de agosto de 2019.
                    </li>
                    <li>
                        Si el examen es aprobado, se procede a iniciar los trámites de titulación, en caso contrario se
                        puede elegir otra de las opciones de titulación.
                    </li>
                    <li>
                        Cuando se abra la convocatoria para esta opción deberá acudir a Servicios Escolares, para verificar
                        el status de alumno regular y que el expediente se encuentre con la documentación completa, además
                        de llenar una solicitud y posteriormente pagar el costo en el banco.
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Fin de Examen de Conocimientos -->
@endsection

@include('include.redirecciones.outOfertaAcademica')