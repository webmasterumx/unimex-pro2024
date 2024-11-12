@extends('layouts.layout')

@section('content')
    <!-- Inicio de Opciones para Titularse -->
    <section class="container-fluid px-5 py-3">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <h1 style="font-size: 1.428em;" class="underlined-head">
                    OPCIONES DE <br> TITULACIÓN
                </h1>
            </div>
            <div class="col-12 col-md-9 col-lg-10">
                <p>
                    En UNIMEX sabemos lo importante que es la obtención de tu Título Universitario, por lo que al término de
                    la licenciatura podrás elegir entre estas cuatro modalidades de titulación. <br><br>

                    I. Titulación por créditos <br>
                    II. Estudios de Grado <br>
                    III. Examen de Conocimientos UNIMEX <br>
                    IV. Examen General de Egreso (EGEL) <br><br>

                    <b>I. Titulación por créditos.</b><br><br>
                    Para titularte por esta modalidad necesitas acreditar todas tus materias de la licenciatura y presentar
                    un trabajo escrito en el que señales qué esperas de tu ejercicio profesional. <br><br>

                    <b>II. Estudios de Grado.</b><br><br>
                    Con esta opción podrás seguir preparándote cursando un Posgrado en UNIMEX o en una institución externa
                    para acceder a los mejores puestos de trabajo al mismo tiempo que cumples los requisitos para tu
                    titulación de licenciatura. <br><br>

                    1. Estudios de Grado en UNIMEX. <br><br>

                    Al cursar y aprobar tres cuatrimestres (45 créditos) del Posgrado UNIMEX de tu elección (con afinidad a
                    tu licenciatura) obtendrás de manera automática tu Título de la Licenciatura además de obtener los
                    siguientes beneficios:
                </p>
                <ul>
                    <li>Podrás tramitar el Diploma de Especialidad correspondiente a tus estudios de grado.</li>
                    <li>Al cursar dos cuatrimestres adicionales, conseguirás el Grado de Maestría adquiriendo así tres
                        niveles académicos en corto tiempo (Licenciatura, Especialidad y Maestría).</li>
                    <li>Becas especiales para egresados UNIMEX.</li>
                </ul>
                <p>
                    2. Estudios de Grado en Institución Externa. <br><br>

                    Podrás obtener tu Título al cursar una Especialidad o Maestría, afín a tu licenciatura, en una
                    institución diferente a UNIMEX siempre y cuando cuente con Reconocimiento de Validez Oficial de Estudios
                    (RVOE) y acredites en ésta, por lo menos, las materias equivalentes a 45 créditos. <br><br>

                    <b>III. Examen de Conocimientos UNIMEX.</b><br><br>
                    Universidad Mexicana diseña y aplica una evaluación escrita que se elabora apegada a los planes de
                    estudios de cada licenciatura. Al aprobarlo, obtendrás una constancia para iniciar con ella tus trámites
                    de Titulación. <br><br>

                    <b>IV. Examen General de Egreso (EGEL).</b><br><br>
                    El Centro Nacional de Evaluación para la Educación Superior (Ceneval) es una asociación cuya actividad
                    principal es el diseño y aplicación de instrumentos de evaluación de conocimientos, habilidades y
                    competencias. El Examen General de Egreso (EGEL) es una prueba escrita con los conocimientos y
                    habilidades necesarios para ejercer cada Licenciatura profesionalmente, elaborada y aplicada por Ceneval
                    a los egresados de todas las Instituciones de Educación Superior que así lo soliciten. <br>
                    Para obtener tu Título por esta opción es necesario revisar las licenciaturas autorizadas por UNIMEX
                    para aplicar EGEL. Una vez presentado el examen deberás conseguir un resultado “Satisfactorio o
                    Sobresaliente” en esta prueba. <br><br>

                    <b>REQUISITOS GENERALES PARA CUALQUIER OPCIÓN DE TITULACIÓN:</b>
                </p>
                <ul>
                    <li>Haber cursado y aprobado el 100% de los créditos establecidos en el plan de estudios de la
                        licenciatura.</li>
                    <li>Haber obtenido la carta de liberación del Servicio Social.</li>
                    <li>Presentar Certificado de Estudios Totales de Licenciatura (o en trámite).</li>
                    <li>Acta de Nacimiento, original.</li>
                    <li>Requisitar la solicitud inicial para titularse.</li>
                    <li>Haber acreditado alguna de las opciones de titulación arriba mencionadas.</li>
                    <li>Haber cubierto el total del costo vigente a la cuota correspondiente para tal efecto.</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Fin de Opciones para Titularse -->
@endsection

@include('include.redirecciones.outOfertaAcademica')
