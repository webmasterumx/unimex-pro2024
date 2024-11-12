<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtrasUnimexController extends Controller
{
    public function complementoMailContactoProspecto($infoGenerada)
    {

        //! telefonos
        $telizc = "55 5864 9660 / 55 5873 9444";
        $telsat = "55 5374 7480 / 55 5393 1326 / 55 5562 2259 <br /> 55 5562 6347 / 55 5562 4852";
        $telpol = "55 9138 0060";
        $telver = "(229) 9231300 / (229) 9323916";

        //!legales
        $licmetroleg = "<br/><div class='legal' >Beneficios, cuotas y promociones validos solo para nuevo ingreso a 1er cuatrimestre de licenciatura en los Plantel de Polanco, Satélite e Izcalli.<br/><br/>
        El porcentaje de beca puede ser del 25% al 60% y se otorga según el Plantel y turno seleccionados; aplica únicamente sobre parcialidades y re-inscripciones, La beca es académica, por lo que al terminar tu 3er Cuatrimestre (1er año de estudios cursado de forma ininterrumpida) se renovará automáticamente cada ciclo escolar, siempre y cuando cumplas los siguientes Requisitos de Renovación: a) Aprobar todas tus materias en curso ordinario. b) Mantener un promedio mínimo de 8.0 al término del ciclo escolar. c) Cumplir con tu trámite de Re-inscripción al siguiente ciclo escolar en tiempo y forma, dentro del periodo señalado por la Institución. Si al terminar el 3er cuatrimestre (1er año de estudios cursado de forma ininterrumpida) aprobaste todas tus materias, pero no alcanzas el promedio requerido, UNIMEX® te da la oportunidad de continuar con la mitad de la beca otorgada inicialmente, misma que puedes renovar cada ciclo cumpliendo con los Requisitos de Renovación. En caso de no cumplir los Requisitos de Renovación, la beca se pierde; una vez que se pierde la beca (total o parcialmente), no es recuperable. Apertura de grupos: Consulta en tu Plantel la disponibilidad de la Licenciatura seleccionada en el Ciclo Escolar y horario de tu interés. La apertura de grupos está sujeta a la inscripción de 25 alumnos mínimo; en caso de que no se forme el grupo puedes solicitar tu reembolso (consulta el procedimiento en el Plantel).  Licenciatura en 3 años 4 meses (10 cuatrimestres) cursados de forma ininterrumpida y de forma regular.  La variedad y duración de turnos permite seleccionar en que se ajuste a un horario laboral promedio. Materias de inglés y cómputo integradas en el Plan de Estudios de cada Licenciatura, excepto Gastronomía Internacional. Titulación Automática: al aprobar el 100% de créditos de Licenciatura, cumpliendo con los requisitos de esta opción de titulación. Beca en Especialidad para egresados  de Licenciatura UNIMEX. Examen de Ubicación sin costo; válido entregando la impresión de tu confirmación  con el folio de registro en línea.<br/><br/>
        Planes de Estudio con Registro de Validez Oficial de Estudios (RVOE) de la SEP: Administración RVOE: 2002305-13/10/2000; 2004338-16/11/2004; 952284-18/09/1995; 2004437-16/11/2004; 942185-03/11/1994; 2004440-16/11/2004. Administración de Empresas Turísticas RVOE: 20122037-23/10/2012; 20122038-23/10/2012; 20122206-18/10/2012; 20122207-18/10/2012; 20122194-12/10/2012; 20122195-12/10/2012. Comercio Internacional y Aduanas RVOE: 2002306-13/10/2000; 982320-23/11/1998. Comunicación RVOE: 2002307-13/10/2000; 2007384-30/04/2007; 952285-18/09/1995; 2007387-30/04/2007; 972127-13/05/1997, 2007399-30/04/2007. Contaduría Pública RVOE: 2004439-16/11/2004; 952286-18/09/1995; 2004436-16/11/2004; 942187-03/11/1994; 2004441-16/11/2004. Derecho RVOE: 2002309-13/10/2000; 2005050-18/02/2005; 952287-18/09/1995; 2005047-18/02/2005; 942186-03/11/1994; 2005071-18/02/2005. Diseño Gráfico RVOE: 2002310-13/10/2000; 2007385-30/04/2007; 2007388-30/04/2007; 20101088-08/11/2010; 982157-17/08/1998; 2007400-30/04/2007. Idiomas RVOE: 20071003-23/11/2007; 20071004 -23/11/2007; 20071001-23/11/2007; 20071002-23/11/2007; 20071006-23/11/2007; 20071005-23/11/2007. Informática Administrativa RVOE: 2002312-13/10/2000; 2004525-16/12/2004; 972270-29/07/1997; 2004523-16/12/2004; 972273-29/07/1997; 2004527-16/12/2004. Mercadotecnia y Publicidad RVOE: 2002314-13/10/2000; 2004483-06/12/2004; 972271-29/07/1997; 2004482-06/12/2004; 972274-29/07/1997; 2004484-06/12/2004. Pedagogía RVOE: 2002316-13/10/2000; 2004519-16/12/2004; 982322-23/11/1998; 2004517-16/12/2004; 20101089-08/11/2010; 2004521-16/12/2004. Psicología Social RVOE: 2002317-13/10/2000; 2004520-16/12/2004; 992157-05/03/1999; 2004518-16/12/2004; 992158-05/03/1999; 2004522-16/12/2004. Relaciones Internacionales y Comercio Exterior RVOE: 2002319-13/10/2000; 2005069-18/02/2005; 982323-23/11/1998; 2005048-18/02/2005; 952352-15/11/1995; 2005072-18/02/2004. Sistemas Computacionales RVOE: 2002320-13/10/2000; 2004526-16/12/2004; 952288-18/09/1995; 2004524-16/12/2004; 942188-03/11/1994; 2004528-16/12/2004. Turismo RVOE: 2002321-13/10/2000; 2007383-30/04/2007; 972126-13/05/1997; 2007386-30/04/2007; 972187-16/07/1997; 2007398-30/04/2007. V.ABR17</div>";

        $posmetroleg = "<br/><div class='legal' >Información válida para inscripción de nuevo ingreso a Especialidad.<br/><br/>
        Los grupos se abren con un mínimo de 25 alumnos inscritos; en caso de no apertura puede solicitar tu reembolso (consulta en plantel el procedimiento). Consulta la afinidad del Posgrado deseado con tus estudios de Licenciatura en plantel o en la página web. Beca para Especialidad: beca del 35% para egresados de Licenciatura UNIMEX® y del 20% para egresados de otras universidades; aplicable sólo en parcialidades. Beca para Maestría del 20% para egresados que concluyeron con beca la Especialidad del plan de estudios equivalente en UNIMEX®; aplica en re-inscripción y parcialidades. La beca es académica, por lo que se renovará automáticamente cada ciclo escolar, siempre y cuando cumplas los Requisitos de Renovación de Beca. Consulta en plantel o en la página web los requisitos y restricciones para obtener una beca y para renovarla. Requisitos de renovación: a. Aprobar todas tus materias en curso ordinario. b. Mantener un promedio mínimo de 8.0 al término del ciclo escolar. c. Cumplir con tu trámite de Re-inscripción al siguiente ciclo escolar en tiempo y forma, dentro del periodo señalado por la Institución. En caso de no cumplir los requisitos de renovación, la beca se pierde; una vez perdida, no es recuperable. Costo total del Ciclo Escolar: se divide en 5 pagos: 1 inscripción o re-inscripción y 4 parcialidades. En el momento de tu inscripción y previo a cada re-inscripción te informaremos el calendario de pagos. La disponibilidad de horarios puede variar para cada Posgrado y cada Plantel; consulta los horarios disponibles para el ciclo y posgrado de tu interés. Pregunta por las cuotas vigentes para el ciclo de tu interés en plantel o revísalas en la página web.
        <br/><br/>
        Si estudiaste en otra institución, adicionalmente deberás entregar la Carta de Autorización para Titularte vía créditos de Posgrado, emitida por tu Universidad de origen, indicando la cantidad de créditos necesarios (en caso de no estar incorporada a la SEP, tu Certificado debe estar legalizado). Verifica los requisitos y condiciones para tu Titulación en la Institución donde cursaste la Licenciatura.
        Maestría como continuación de tu Especialidad UNIMEX®: Al terminar los 3 ciclos escolares de la Especialidad, puedes solicitar tu equivalencia de materias para continuar con la Maestría cursando únicamente los últimos dos ciclos del programa equivalente; consulta los programas que aplican para la equivalencia para Maestría y los planteles en los que se imparten. La duración total del Posgrado está sujeta al curso continuo de los estudios; consulta la programación de aperturas del posgrado en el ciclo y el plantel de tu interés.
        <br/><br/>
        Planes de Estudio con Registro de Validez Oficial de Estudios (RVOE) de la SEP: Especialidades: Administración RVOE: Especialidad 2005235 - 28/04/2005; 2005234 - 28/04/2005; 2005236 - 28/04/2005 y Maestría: 2014093 - 06/04/2001; 2014095 - 06/04/2001; 2014094 - 06/04/2001. Comunicación Visual RVOE: Especialidad 2005239 - 28/04/2005;  2005238 - 28/04/2005; 2005240 - 28/04/2005; Maestría: 2014208-27/07/2001; 2014209 - 27/07/2001; 2014207 - 27/07/2001. Derecho Penal RVOE: Especialidad 2005070 - 18/02/2005; 2005049 - 18/02/05; 2005073 - 18/02/2005  y Maestría: 2005339 - 15/06/2005; 2005338 - 15/06/2005;  2005340 - 15/06/2005. Docencia (Sólo Especialidad) RVOE: Especialidad 20071038 - 19/12/2007, 20071039 - 19/12/2007. Educación RVOE: Especialidad 2003328 - 13/10/2000; 993019 - 29/01/1999; 993034 - 29/01/1999 y Maestría: 2004340 - 13/10/2000; 984156 - 17/08/1998; 984158 - 17/08/1998. Habilidades Directivas RVOE: Especialidad 2003326 - 13/10/2000; 993020 - 29/01/1999 ; 993035 - 29/01/1999 y Maestría: 2004337 - 13/10/2000; 994028- 29/01/1999; 994043-29/01/1999. Impuestos RVOE: Especialidad 2003325 - 13/10/2000; 983325 - 23/11/1998 y Maestría 2004338 - 13/10/2000; 994029 - 29/01/1999.  Mercadotecnia RVOE: Especialidad 20091233 - 24/11/2009 y Maestría: 20100002 - 18/01/2010.  Terapias Psicosociales RVOE: Especialidad 2007510 - 25/05/2007; 2007508 - 25/05/2007; 2007512 - 25/05/2007 y Maestría: 2007511 - 25/05/2007; 2007509 - 25/05/2007; 2007513 25/05/2007. V.ABR17</div>";

        $verleg = "<br/><div class='legal' >Beneficios, cuotas y promociones válidos sólo para nuevo ingreso a 1er cuatrimestre de Licenciatura en Plantel Veracruz. En caso de interés en otro plantel, pregunta por las condiciones correspondientes al plantel deseado.
        <br/><br/>
        Becas y cuotas (Veracruz): El porcentaje de beca se otorga según el promedio general en el Certificado de Bachillerato: 20% de beca para promedio de 6.0 a 7.9; 25% para promedio de 8.0 a 8.9; 40% para promedio de 9.0 a 9.5; 60% de beca para promedio de 9.6 a 10.0. La beca es académica, por lo que al terminar tu 3er Cuatrimestre (1er año de estudios cursado de forma ininterrumpida) se renovará automáticamente cada ciclo escolar, siempre y cuando cumplas los siguientes Requisitos de Renovación: a) Aprobar todas tus materias en curso ordinario. b) Mantener un promedio mínimo de 8.0 al término del ciclo escolar. c) Cumplir con tu trámite de Re-inscripción al siguiente ciclo escolar en tiempo y forma, dentro del periodo señalado por la Institución. Si al terminar el 3er cuatrimestre (1er año de estudios cursado de forma ininterrumpida) aprobaste todas tus materias, pero no alcanzas el promedio requerido, UNIMEX® te da la oportunidad de continuar con la mitad de  la  beca otorgada inicialmente, misma que puedes renovar cada ciclo cumpliendo con los Requisitos de Renovación. En caso de no cumplir los Requisitos de Renovación, la beca se pierde; una vez que se pierde la beca (total o parcialmente), no es recuperable. Las becas aplican sobre el monto de la parcialidad, no aplican en inscripción ni re-inscripción.
        <br/><br/>
        Costo total del Ciclo Escolar: se divide en 5 pagos: 1 inscripción (1er Ciclo) o re-inscripción (de 2° a 10° Ciclos) y 4 parcialidades. El costo total incluye inscripción y parcialidades de un ciclo escolar; no incluye moratorios ni otros servicios. Tu primera credencial será sin costo; la reposición tiene un costo de $160.
        <br/><br/>
        Apertura de grupos: Consulta en el Plantel la disponibilidad de la Licenciatura seleccionada en el Ciclo Escolar y horario de tu interés. La apertura de grupos está sujeta a la inscripción de 25 alumnos mínimo; en caso de que no se forme el grupo puedes solicitar tu reembolso (consulta el procedimiento en el Plantel).
        <br/><br/>
        Duración: Licenciatura en 3 años 4 meses (10 cuatrimestres) cursados de forma ininterrumpida y de forma regular.
        <br/><br/>
        Variedad de horarios que te permiten estudiar y trabajar: la variedad y duración de nuestros turnos te permite seleccionar el que se ajuste a un horario laboral promedio.
        <br/><br/>
        Titulación Automática: Al aprobar el 100% de créditos de Licenciatura puede elegir Titulación Automática, cumpliendo con los requisitos de esta opción de titulación.
        <br/><br/>
        Beca en Especialidad para egresados de Licenciatura UNIMEX®, consulta en tu Plantel más información.
        <br/><br/>
        SUA: Sistema Universitario Abierto con asesorías de asistencia opcional y evaluaciones periódicas presenciales en fecha programada. Consulta la disponibilidad en el ciclo solicitado. Disponible sólo para Licenciaturas en Administración, Contaduría Pública y Derecho.
        <br/><br/>
        Planes de Estudio con Registro de Validez Oficial de Estudios (RVOE) de la SEP: Administración: VER. (972165-17/06/1997,2007370-30/04/2007,2002026-04/02/2000). Administración de Empresas Turísticas: VER. (20122199 – 12/10/2012, 20122200 – 12/10/2012). Ciencias de la Educación: VER. (982329 -23/11/1998, 2007377-30/04/2007). Comercio Internacional y Aduanas: VER. (982330-23/11/1998, 2007374-30/04/2007. Comunicación: VER. (972182-15/07/1997,2007378-30/04/2007). Contaduría Pública: VER.(972114-27/06/1997, 2007368-30/04/2007, 2002027-04/02/2000). Derecho: VER. (972115-27/06/1997, 2007369-30/04/2007, 992441-17/12/1999). Gastronomía Internacional: VER. (20122196-15/10/2012). (20122197-15/10/2012). Diseño Gráfico: VER. (982159-17/08/1998, 2007382-30/04/2007). Idiomas: VER. (992161-29/01/1999, 2007380-30/04/2007).
        <br/><br/>
        Mercadotecnia y Publicidad: VER.(972308-29/07/1997, 2007371-30/04/2007). Psicología Social: VER. (992159-05/03/1999, 2007372-30/04/2007). Relaciones Internacionales y Comercio Exterior: VER. (972163-17/06/1997, 2007376-30/04/2007). Sistemas Computacionales: VER. (972183-15/07/1997, 2007375 -30/04/2007). Turismo: VER. (972184-15/07/1997, 2007379-30/04/2007).
        <br /><br />
        Promociones en inscripción válidas sólo para nuevo ingreso a Especialidad/Maestría del ciclo 2017-3 (mayo-agosto de 2017) y 2018-1 (septiembre-diciembre de 2017). Beneficios, becas y promociones válidas sólo en plantel Veracruz, para inscritos de nuevo ingreso a 1er ciclo de cualquier Especialidad; en caso de interés en otro plantel, pregunta por las condiciones correspondientes al plantel deseado. Consulta en Plantel la disponibilidad del Posgrado en el ciclo solicitado; los grupos se abren con un mínimo de 25 alumnos inscritos.
        <br/><br/>
        Beca para Especialidad: 20% para egresados de Licenciatura UNIMEX® y 10% para egresados de otras universidades. Aplica sólo sobre el monto de las Parcialidades. Beca para Maestrías: se otorga 10% de beca sólo a egresados de Especialidad UNIMEX® que la concluyeron con beca; sólo aplica sobre Re-inscripción y Parcialidades. Las becas no aplica sobre otros pagos como extraordinarios, trámites o servicios adicionales. Requisitos de renovación: La beca es académica, por lo que se renovará automáticamente cada ciclo escolar, siempre y cuando cumplas lo siguientes: a. Aprobar todas tus materias en curso ordinario. b. Mantener un promedio mínimo de 8.0 al término del ciclo escolar. c. Cumplir con tu trámite de Re-inscripción al siguiente ciclo escolar en tiempo y forma, dentro del periodo señalado por la Institución. En caso de no cumplir los requisitos de renovación, la beca se pierde; una vez perdida, no es recuperable.
        <br/><br/>
        Costo total del Ciclo Escolar: se divide en 5 pagos: 1 inscripción o re-inscripción y 4 parcialidades. En el momento de tu inscripción y previo a cada re-inscripción te informaremos el calendario de pagos.
        <br/><br/>
        Especialidad y Maestría UNIMEX®: Puedes estudiar tu Maestría como continuación de tu Especialidad UNIMEX®: al terminar los 3 ciclos escolares de la Especialidad, puedes solicitar tu equivalencia de materias para continuar con la Maestría cursando únicamente los últimos dos ciclos del programa equivalente.
        Titúlate con un Posgrado: Al concluir el 100% de los créditos de Licenciatura puedes elegir la opción de Titulación vía Estudios de Posgrado; sólo necesitas original y copia de tu Acta de Nacimiento y de tu Certificado Total de Estudios de Licenciatura. Si estudiaste en otra institución, adicionalmente deberás entregar la Carta de Autorización para Titularte vía créditos de Posgrado, emitida por tu Universidad de origen, indicando la cantidad de créditos necesarios (en caso de no estar incorporada a la SEP, tu Certificado debe estar legalizado). Verifica los requisitos y condiciones para tu Titulación en la Institución donde cursaste la Licenciatura.
        <br/><br/>
        Planes de Estudio con Registro de Validez Oficial de Estudios (RVOE) de la SEP: Administración: Especialidad VER. 2005237-28/04/2005; Maestría VER. 2014134 25/05/2001. Comunicación Visual: Especialidad VER. 2005241-28/04/2005; Maestría VER. 2014406-27/07/2001. Derecho Penal: Especialidad VER. 2005074-18/02/2005; Maestría VER. 2005341-15/06/2005. Educación: VER. 993049-2901/08/1999. Habilidades Directivas: Especialidad VER: 993050-29/01/1999; Maestría VER. 994058-29/01/1999. Terapias Psicosociales: Especialidad VER. 2007514-25/05/2007; Maestría VER. 2007515-25/05/2007.</div>";

        $prepaleg = "<div class='legal' >Beneficios, becas y promociones válidas sólo para inscritos de nuevo ingreso a cuarto año de preparatoria en el ciclo 2017-2018. Promoción en inscripción válida hasta el 17 de agosto de 2017. Prepa Unimex disponible sólo en Plantel Izcalli. Plan de estudios incorporados a la UNAM con el acuerdo No. 6850. Los grupos se abren con un mínimo 25 alumnos inscritos; en caso de no apertura puede solicitar tu reembolso (consulta en el plantel el procedimiento). Becas: aplica sólo en parcialidades; la beca de 50% se otorga a los primeros 50 inscritos que cuenten con promedio general mínimo de siete (7.0) en el Certificado Total de Secundaria; becas del 40% sólo para inscritos de nuevo ingreso con promedio general mínimo de siete (7.0) en el Certificado Total de Secundaria. Las becas se renuevan anualmente, contando con promedio general mínimo de ocho (8.0); no son acumulables. Consulta las políticas de becas y requisitos en el Plantel. Duración: este programa se cursa 3 en ciclos anuales (tres años). Horarios. Clases de Lunes a Viernes en turno matutino de 7:10 a 14:20 h. Para mayor información, consulta en Plantel o en www.unimex.edu.mx</div>";

        switch ($infoGenerada['plantel']) {
            case 'IZCALLI':
                $Ftelcontacto = $telizc;
                $correocontacto = 'umizc_resprelaciones@unimex.edu.mx';
                $face = 'https://www.facebook.com/unimex/';
                $dirPlantel = "Av. Del Vidrio No. 15, Col. Plaza Dorada, Centro Urbano (Frente a la FES Cuautitlán) Campo 1, C.P. 54760 Cuautitlán Izcalli, Estado de México";
                break;
            case 'SATÉLITE':
                $Ftelcontacto = $telsat;
                $correocontacto = 'umsat_coorrelaciones@unimex.edu.mx';
                $face = 'https://www.facebook.com/unimex/';
                $dirPlantel = "Circuito Poetas No. 37 (frente a Circuito Novelistas No. 41) Cd. Satélite C.P. 53100 Naucalpan de Juárez, Estado de México.";
                break;
            case 'POLANCO':
                $Ftelcontacto = $telpol;
                $correocontacto = 'umpol_coorrelaciones@unimex.edu.mx';
                $face = 'https://www.facebook.com/unimex/';
                $dirPlantel = "Emilio Castelar No. 63, esq. Eugenio Sue, (Polanco o Auditorio). Col. Polanco-Chapultepec, C.P.11560, México D.F.";
                break;
            case 'VERACRUZ':
                $Ftelcontacto = $telver;
                $correocontacto = 'umver_relaciones@unimex.edu.mx';
                $face = 'https://www.facebook.com/UnimexEnVeracruz/';
                $dirPlantel = "Av. 20 de noviembre esq. Juan Enríquez No. 1004 Veracruz, Ver.";
                break;

            default:
                # code...
                break;
        }

        if ($infoGenerada['plantel'] != 'VERACRUZ' && $infoGenerada['nivel'] == 'Licenciatura') {
            $legales = $licmetroleg;
        }
        if ($infoGenerada['plantel'] != 'VERACRUZ' && $infoGenerada['nivel'] != 'Licenciatura') {
            $legales = $posmetroleg;
        }
        if ($infoGenerada['plantel'] == 'VERACRUZ' && $infoGenerada['nivel'] != '') {
            $legales = $verleg;
        }
        if ($infoGenerada['plantel'] == 'IZCALLI' && $infoGenerada['nivel'] == 'Medio Superior') {
            $legales = $prepaleg;
        }

        $valores = array(
            "Ftelcontacto" => $Ftelcontacto,
            "correocontacto" => $correocontacto,
            "face" => $face,
            "legales" => $legales,
            "dirPlantel" => $dirPlantel,
        );

        return $valores;
    }

    //? funciones de establecimiento de variables de posicionamiento por nivel y carrera
    public function setVariablesPosicionamientoCalculadora($nivel, $carrera)
    {
        session(['nivel_calculadora' => $nivel]);
        session(['carrera_calculadora' => $carrera]);

        $respuesta['estado'] = true;
        $respuesta['mensaje'] = "variables establecidas con exito";
        $respuesta['nivel_calculadora'] = session("nivel_calculadora");
        $respuesta['carrera_calculadora'] = session("carrera_calculadora");

        return response()->json($respuesta);
    }

    public function setVariablesPosicionamientoPreinscripcion($nivel, $carrera)
    {
        session(['nivel_preinscripcion' => $nivel]);
        session(['carrera_preinscripcion' => $carrera]);

        $respuesta['estado'] = true;
        $respuesta['mensaje'] = "variables establecidas con exito";

        return response()->json($respuesta);
    }

    public function setVariablesPosicionamientoFolioCrm($foliocrm)
    {
        session(['foliocrm' => $foliocrm]);

        $respuesta['estado'] = true;
        $respuesta['mensaje'] = "variable establecida correctamente";

        return response()->json($respuesta);
    }

    public function getVariablesPosicionamientoCalculadora()
    {
        $respuesta['nivel_calculadora'] = session('nivel_calculadora');
        $respuesta['carrera_calculadora'] = session('carrera_calculadora');

        return response()->json($respuesta);
    }

    public function getVariablesPosicionamientoPreinscripcion()
    {
        $respuesta['nivel_preinscripcion'] = session('nivel_preinscripcion');
        $respuesta['carrera_preinscripcion'] = session('carrera_preinscripcion');

        return response()->json($respuesta);
    }

    public function getVariablePosicionamientoFolioCrm()
    {
        $respuesta['foliocrm'] = session('foliocrm');

        return response()->json($respuesta);
    }


    public function setVariablesFormContacto($elemento)
    {
        session(["elementPosicionContactForm" => $elemento]);

        $respuesta['estado'] = true;
        $respuesta['mensaje'] = "variable establecida correctamente";

        return response()->json($respuesta);
    }

    public function getVariablesFormContacto()
    {
        $respuesta['elementPosicionContactForm'] = session('elementPosicionContactForm');

        return response()->json($respuesta);
    }

    public function setVariableCarreraCombo($idCarrera, $nombreCarrera)
    {
        //! si el id de carrera viene nulo o vacio en su cadena quiere decir que la opcion de selecciona tu carrera es la que esta en el select
        if ($idCarrera == null || $idCarrera == "") {
            session(["nombreCarreraComboResguardo" => session('nivel_calculadora')]);
            session(["idCarreraComboResguardo" => session('carrera_calculadora')]);

            $respuesta['nombre'] = session("nombreCarreraComboResguardo");
            $respuesta['id'] = session("idCarreraComboResguardo");
            $respuesta['mensaje'] = "variable establecida";
            //echo('no hay nada en el select');
        }
        //* si el id de carrera viene con el valor de 0 quiere decir que hay que reguardar la carrera ya que se esta llamando en casos especificos del flujo
        else if ($idCarrera == 0) {
            session(["nombreCarreraComboResguardo" => $nombreCarrera]);
            session(["idCarreraComboResguardo" => 0]);

            $respuesta['nombre'] = session("nombreCarreraComboResguardo");
            $respuesta['id'] = session("idCarreraComboResguardo");
            $respuesta['mensaje'] = "variable establecida para caso especifico";
        }
        //? la llamada del metodo se hace desde que se hace algun cambio de correra
        else {
            session(["nombreCarreraComboResguardo" => $nombreCarrera]);
            session(["idCarreraComboResguardo" => $idCarrera]);

            $respuesta['nombre'] = session("nombreCarreraComboResguardo");
            $respuesta['id'] = session("idCarreraComboResguardo");
            $respuesta['mensaje'] = "variable establecida";
            //echo('hay algo en el select');
        }

        return response()->json($respuesta);
    }

    public function getVariableCarreraCombo()
    {
        $respuesta['nombre'] = session("nombreCarreraComboResguardo");
        $respuesta['id'] = session("idCarreraComboResguardo");
        $respuesta['mensaje'] = "nombre obtenido";

        return response()->json($respuesta);
    }
}
