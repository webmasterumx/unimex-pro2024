<?php

namespace App\Http\Controllers;

use App\Mail\CalculadoraCuotas;
use App\Mail\CalculadoraDetallesBeca;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CalculadoraCuotasController extends Controller
{

    public $message = "";
    public $result  = false;
    public $records = array();

    public function index(): View
    {
        return view('calculadoraDeBecas.inicio');
    }

    public function insertarProspecto(Request $request)
    {

        /*    $source = session("utm_source");
        $medium = session("utm_medium");
        $content = session("utm_content");
        $campaign = session("utm_campaign");
        $term = session("utm_term"); */

        $source = $request->utm_source;
        $medium = $request->utm_medium;
        $campaign = $request->utm_campaign;
        $term = $request->utm_term;
        $content = $request->utm_content;

        session(['nombreNivel' => $request->nombreNivel]);
        session(['nombrePlantel' => $request->nombrePlantel]);
        session(['nombrePeriodo' => $request->nombrePeriodo]);
        SELF::telefonoAndDireccionPlantel($request->selectPlantel);
        $legales = SELF::definirLegales($request->selectNivel);
        session(["legales" => $legales]);

        if ($request->typeTelefono == 1) {
            $telefono_valor = "";
            $celular_valor = $request->telefonoProspecto;
        } else {
            $telefono_valor = $request->telefonoProspecto;
            $celular_valor = "";
        }

        if ($request->selectPlantel == 2) {
            $horarioDefault = 5;
        } else {
            $horarioDefault = 1;
        }


        $valores = array(
            "pNombre" => $request->nombreProspecto,
            "pApPaterno" => $request->apellidosProspecto,
            "pApMaterno" => "",
            "pTelefono" => $telefono_valor,
            "pCelular" => $celular_valor,
            "pCorreo" => $request->emailProspecto,
            "pPeriodoEscolar" => $request->selectPeriodo,
            "pPlantel" => $request->selectPlantel,
            "pNivel_Estudio" => $request->selectNivel,
            "pCarrera" => 1,
            "pHorario" => $horarioDefault,
            "pOrigen" => 23,
            "utpsource" =>  $source,
            "descripPublicidad" => $campaign,
            "campaignMedium" => $medium,
            "campaignTerm" => $term,
            "campaignContent" => $content,
            "websiteURL" => env('APP_URL') . "calcula-tu-cuota?utm_source=" . $source . "&utm_medium=" . $medium . "&utm_campaign=" . $campaign . "&utm_term=" . $term . "&utm_content=" . $content,
            "folioReferido" => "0",
        );

        //var_dump($valores);
        $respuesta = app(ApiConsumoController::class)->agregarProspectoCRM($valores);
        //var_dump($respuesta);

        if ($respuesta['FolioCRM'] != 0) {

            SELF::establecerVariablesCorreo($request, $respuesta);

            try {

                Mail::to($request->emailProspecto)->bcc("umrec_web@unimex.edu.mx")->send(new CalculadoraCuotas());

                $statusCode     = 200;
                $this->message  = "Correo enviado correctamente.";
                $this->result   = true;
            } catch (\Throwable $th) {
                $statusCode     = 200;
                //$this->message  = $th->getMessage();
                $this->message  = "Error al enviar correo.";
            } finally {
                $response = [
                    'message'   => $this->message,
                    'result'    => $this->result,
                    'records'   => $this->records
                ];
            }

            $legales = SELF::definirLegales($request->selectNivel);

            $respuesta['legales'] = $legales;
            $respuesta['estadoCorreo'] = $this->result;
            $respuesta['mensajeCorreo'] =  $this->message;
        } else {
            $respuesta['estadoCorreo'] = false;
            $respuesta['mensajeCorreo'] =  "Correo no enviado";
        }

        return response()->json($respuesta);
    }

    public function enviarCorreoCalculadoraDetalleBeca()
    {
        //$recive = "lishanxime201099@gmail.com";

        try {
            $carrera = session('Carrera');
            $nombrePlantel = session('nombrePlantel');
            $turno = session('Turno');
            $descripPer = session('DescripPer');
            $beca = session('Beca');
            $vigencia = session('Vigencia');
            $horario = session('Horario');

            //var_dump(session('Vigencia'));

            $recive = session('datoCuatroCalculadora');
            //var_dump(session('ClaveCuoProm')); ->bcc("umrec_web@unimex.edu.mx")
            $envio =  Mail::to($recive)->send(new CalculadoraDetallesBeca($carrera, $nombrePlantel, $turno, $descripPer, $beca, $vigencia, $horario));

            $statusCode     = 200;
            $this->message  = "Correo enviado correctamente.";
            $this->result   = true;
        } catch (\Throwable $th) {
            $statusCode     = 200;
            $this->message  = $th->getMessage();
            //$this->message  = "Error al enviar correo.";
        } finally {
            $response = [
                'message'   => $this->message,
                'result'    => $this->result,
                'records'   => $this->records
            ];

            return response()->json($response);

            //dd($response);
        }
        //Mail::to($recive)->send(new CalculadoraDetallesBeca());
    }

    public function enviarCorreoDetallesBeca(Request $request)
    {

        //$recive = "lishanxime201099@gmail.com";

        try {
            $nombreNivel = $request->nombreNivel;
            $carrera = $request->nombreCarrera;
            $nombrePlantel = $request->nombrePlantel;
            $turno = $request->Turno;
            $horario = $request->Horario;
            $beca = $request->Beca;
            $descripPer = $request->DescripPer;
            $vigencia = $request->Vigencia;

            $recive = session('datoCuatroCalculadora');
            //var_dump(session('ClaveCuoProm')); ->bcc("umrec_web@unimex.edu.mx")
            $envio =  Mail::to($recive)->send(new CalculadoraDetallesBeca($carrera, $nombrePlantel, $turno, $descripPer, $beca, $vigencia, $horario));

            $statusCode     = 200;
            $this->message  = "Correo enviado correctamente.";
            $this->result   = true;
        } catch (\Throwable $th) {
            $statusCode     = 200;
            $this->message  = $th->getMessage();
            //$this->message  = "Error al enviar correo.";
        } finally {
            $response = [
                'message'   => $this->message,
                'result'    => $this->result,
                'records'   => $this->records
            ];

            return response()->json($response);

            //dd($response);
        }
        //Mail::to($recive)->send(new CalculadoraDetallesBeca()); 
    }

    public function establecerVariablesCorreo(Request $request, $respuesta)
    {
        session(["datoUnoCalculadora" => $request->nombreProspecto]);
        session(["datoDosCalculadora" => $request->apellidosProspecto]);
        session(["datoTresCalculadora" => $request->telefonoProspecto]);
        session(["datoCuatroCalculadora" => $request->emailProspecto]);
        session(["datoCincoCalculadora" => $respuesta['FolioCRM']]);
    }

    public function establecerVariablesPromocion($response)
    {
        //echo $response['Beca'];
        session(["Beca" => $response['Beca']]);
        session(["Carrera" => $response['Carrera']]);
        session(["ClaveCuoProm" => $response['ClaveCuoProm']]);
        session(["ClaveNivel" => $response['ClaveNivel']]);
        session(["ClavePer" => $response['ClavePer']]);
        session(["Credencial" => $response['Credencial']]);
        session(["DescripPer" => $response['DescripPer']]);
        session(["Dias" => $response['Dias']]);
        session(["Horario" => $response['Horario']]);
        session(["InicioClases" => $response['InicioClases']]);
        session(["InscCB" => $response['InscCB']]);
        session(["InscSB" => $response['InscSB']]);
        session(["ParcCB" => $response['ParcCB']]);
        session(["ParcSB" => $response['ParcSB']]);
        session(["Periodo" => $response['Periodo']]);
        session(["Plantel" => $response['Plantel']]);
        session(["ReinsCB" => $response['ReinsCB']]);
        session(["ReinscSB" => $response['ReinscSB']]);
        session(["TotalCB" => $response['TotalCB']]);
        session(["TotalSB" => $response['TotalSB']]);
        session(["Turno" => $response['Turno']]);
        session(["Uniforme" => $response['Uniforme']]);
        session(["Vigencia" => $response['Vigencia']]);

        //echo session('ClavePer'); 
    }

    public function definirLegales($idNivel)
    {
        $licmetro = "<br/><div class='legal' >Beneficios, cuotas y promociones validos solo para nuevo ingreso a 1er cuatrimestre de licenciatura en los Plantel de Polanco, Satélite e Izcalli.<br/><br/>
							  
				El porcentaje de beca puede ser del 25% al 60% y se otorga según el Plantel y turno seleccionados; aplica únicamente sobre parcialidades y re-inscripciones, La beca es académica, por lo que al terminar tu 3er Cuatrimestre (1er año de estudios cursado de forma ininterrumpida) se renovará automáticamente cada ciclo escolar, siempre y cuando cumplas los siguientes Requisitos de Renovación: a) Aprobar todas tus materias en curso ordinario. b) Mantener un promedio mínimo de 8.0 al término del ciclo escolar. c) Cumplir con tu trámite de Re-inscripción al siguiente ciclo escolar en tiempo y forma, dentro del periodo señalado por la Institución. Si al terminar el 3er cuatrimestre (1er año de estudios cursado de forma ininterrumpida) aprobaste todas tus materias, pero no alcanzas el promedio requerido, UNIMEX® te da la oportunidad de continuar con la mitad de la beca otorgada inicialmente, misma que puedes renovar cada ciclo cumpliendo con los Requisitos de Renovación. En caso de no cumplir los Requisitos de Renovación, la beca se pierde; una vez que se pierde la beca (total o parcialmente), no es recuperable. Apertura de grupos: Consulta en tu Plantel la disponibilidad de la Licenciatura seleccionada en el Ciclo Escolar y horario de tu interés. La apertura de grupos está sujeta a la inscripción de 25 alumnos mínimo; en caso de que no se forme el grupo puedes solicitar tu reembolso (consulta el procedimiento en el Plantel).  Licenciatura en 3 años 4 meses (10 cuatrimestres) cursados de forma ininterrumpida y de forma regular.  La variedad y duración de turnos permite seleccionar en que se ajuste a un horario laboral promedio. Materias de inglés y cómputo integradas en el Plan de Estudios de cada Licenciatura, excepto Gastronomía Internacional. Titulación Automática: al aprobar el 100% de créditos de Licenciatura, cumpliendo con los requisitos de esta opción de titulación. Beca en Especialidad para egresados  de Licenciatura UNIMEX. Examen de Ubicación sin costo; válido entregando la impresión de tu confirmación  con el folio de registro en línea.<br/><br/>
			
				Planes de Estudio con Registro de Validez Oficial de Estudios (RVOE) de la SEP: Administración RVOE: 2002305-13/10/2000; 2004338-16/11/2004; 952284-18/09/1995; 2004437-16/11/2004; 942185-03/11/1994; 2004440-16/11/2004. Administración de Empresas Turísticas RVOE: 20122037-23/10/2012; 20122038-23/10/2012; 20122206-18/10/2012; 20122207-18/10/2012; 20122194-12/10/2012; 20122195-12/10/2012. Comercio Internacional y Aduanas RVOE: 2002306-13/10/2000; 982320-23/11/1998. Comunicación RVOE: 2002307-13/10/2000; 2007384-30/04/2007; 952285-18/09/1995; 2007387-30/04/2007; 972127-13/05/1997, 2007399-30/04/2007. Contaduría Pública RVOE: 2004439-16/11/2004; 952286-18/09/1995; 2004436-16/11/2004; 942187-03/11/1994; 2004441-16/11/2004. Derecho RVOE: 2002309-13/10/2000; 2005050-18/02/2005; 952287-18/09/1995; 2005047-18/02/2005; 942186-03/11/1994; 2005071-18/02/2005. Diseño Gráfico RVOE: 2002310-13/10/2000; 2007385-30/04/2007; 2007388-30/04/2007; 20101088-08/11/2010; 982157-17/08/1998; 2007400-30/04/2007. Idiomas RVOE: 20071003-23/11/2007; 20071004 -23/11/2007; 20071001-23/11/2007; 20071002-23/11/2007; 20071006-23/11/2007; 20071005-23/11/2007. Informática Administrativa RVOE: 2002312-13/10/2000; 2004525-16/12/2004; 972270-29/07/1997; 2004523-16/12/2004; 972273-29/07/1997; 2004527-16/12/2004. Mercadotecnia y Publicidad RVOE: 2002314-13/10/2000; 2004483-06/12/2004; 972271-29/07/1997; 2004482-06/12/2004; 972274-29/07/1997; 2004484-06/12/2004. Pedagogía RVOE: 2002316-13/10/2000; 2004519-16/12/2004; 982322-23/11/1998; 2004517-16/12/2004; 20101089-08/11/2010; 2004521-16/12/2004. Psicología Social RVOE: 2002317-13/10/2000; 2004520-16/12/2004; 992157-05/03/1999; 2004518-16/12/2004; 992158-05/03/1999; 2004522-16/12/2004. Relaciones Internacionales y Comercio Exterior RVOE: 2002319-13/10/2000; 2005069-18/02/2005; 982323-23/11/1998; 2005048-18/02/2005; 952352-15/11/1995; 2005072-18/02/2004. Sistemas Computacionales RVOE: 2002320-13/10/2000; 2004526-16/12/2004; 952288-18/09/1995; 2004524-16/12/2004; 942188-03/11/1994; 2004528-16/12/2004. Turismo RVOE: 2002321-13/10/2000; 2007383-30/04/2007; 972126-13/05/1997; 2007386-30/04/2007; 972187-16/07/1997; 2007398-30/04/2007. V.ABR17</div>";

        $posmetro = "<br/><div class='legal' >Información válida para inscripción de nuevo ingreso a Especialidad.<br/><br/>
			
				Los grupos se abren con un mínimo de 25 alumnos inscritos; en caso de no apertura puede solicitar tu reembolso (consulta en plantel el procedimiento). Consulta la afinidad del Posgrado deseado con tus estudios de Licenciatura en plantel o en la página web. Beca para Especialidad: beca del 35% para egresados de Licenciatura UNIMEX® y del 20% para egresados de otras universidades; aplicable sólo en parcialidades. Beca para Maestría del 20% para egresados que concluyeron con beca la Especialidad del plan de estudios equivalente en UNIMEX®; aplica en re-inscripción y parcialidades. La beca es académica, por lo que se renovará automáticamente cada ciclo escolar, siempre y cuando cumplas los Requisitos de Renovación de Beca. Consulta en plantel o en la página web los requisitos y restricciones para obtener una beca y para renovarla. Requisitos de renovación: a. Aprobar todas tus materias en curso ordinario. b. Mantener un promedio mínimo de 8.0 al término del ciclo escolar. c. Cumplir con tu trámite de Re-inscripción al siguiente ciclo escolar en tiempo y forma, dentro del periodo señalado por la Institución. En caso de no cumplir los requisitos de renovación, la beca se pierde; una vez perdida, no es recuperable. Costo total del Ciclo Escolar: se divide en 5 pagos: 1 inscripción o re-inscripción y 4 parcialidades. En el momento de tu inscripción y previo a cada re-inscripción te informaremos el calendario de pagos. La disponibilidad de horarios puede variar para cada Posgrado y cada Plantel; consulta los horarios disponibles para el ciclo y posgrado de tu interés. Pregunta por las cuotas vigentes para el ciclo de tu interés en plantel o revísalas en la página web.
				<br/><br/>
				
				Si estudiaste en otra institución, adicionalmente deberás entregar la Carta de Autorización para Titularte vía créditos de Posgrado, emitida por tu Universidad de origen, indicando la cantidad de créditos necesarios (en caso de no estar incorporada a la SEP, tu Certificado debe estar legalizado). Verifica los requisitos y condiciones para tu Titulación en la Institución donde cursaste la Licenciatura.
				Maestría como continuación de tu Especialidad UNIMEX®: Al terminar los 3 ciclos escolares de la Especialidad, puedes solicitar tu equivalencia de materias para continuar con la Maestría cursando únicamente los últimos dos ciclos del programa equivalente; consulta los programas que aplican para la equivalencia para Maestría y los planteles en los que se imparten. La duración total del Posgrado está sujeta al curso continuo de los estudios; consulta la programación de aperturas del posgrado en el ciclo y el plantel de tu interés.
				
				<br/><br/>
				Planes de Estudio con Registro de Validez Oficial de Estudios (RVOE) de la SEP: Especialidades: Administración RVOE: Especialidad 2005235 - 28/04/2005; 2005234 - 28/04/2005; 2005236 - 28/04/2005 y Maestría: 2014093 - 06/04/2001; 2014095 - 06/04/2001; 2014094 - 06/04/2001. Comunicación Visual RVOE: Especialidad 2005239 - 28/04/2005;  2005238 - 28/04/2005; 2005240 - 28/04/2005; Maestría: 2014208-27/07/2001; 2014209 - 27/07/2001; 2014207 - 27/07/2001. Derecho Penal RVOE: Especialidad 2005070 - 18/02/2005; 2005049 - 18/02/05; 2005073 - 18/02/2005  y Maestría: 2005339 - 15/06/2005; 2005338 - 15/06/2005;  2005340 - 15/06/2005. Docencia (Sólo Especialidad) RVOE: Especialidad 20071038 - 19/12/2007, 20071039 - 19/12/2007. Educación RVOE: Especialidad 2003328 - 13/10/2000; 993019 - 29/01/1999; 993034 - 29/01/1999 y Maestría: 2004340 - 13/10/2000; 984156 - 17/08/1998; 984158 - 17/08/1998. Habilidades Directivas RVOE: Especialidad 2003326 - 13/10/2000; 993020 - 29/01/1999 ; 993035 - 29/01/1999 y Maestría: 2004337 - 13/10/2000; 994028- 29/01/1999; 994043-29/01/1999. Impuestos RVOE: Especialidad 2003325 - 13/10/2000; 983325 - 23/11/1998 y Maestría 2004338 - 13/10/2000; 994029 - 29/01/1999.  Mercadotecnia RVOE: Especialidad 20091233 - 24/11/2009 y Maestría: 20100002 - 18/01/2010.  Terapias Psicosociales RVOE: Especialidad 2007510 - 25/05/2007; 2007508 - 25/05/2007; 2007512 - 25/05/2007 y Maestría: 2007511 - 25/05/2007; 2007509 - 25/05/2007; 2007513 25/05/2007. V.ABR17</div>";

        $prepa = "<div class='legal' >Beneficios, becas y promociones válidas sólo para inscritos de nuevo ingreso a cuarto año de preparatoria en el ciclo 2017-2018. Promoción en inscripción válida hasta el 17 de agosto de 2017. Prepa Unimex disponible sólo en Plantel Izcalli. Plan de estudios incorporados a la UNAM con el acuerdo No. 6850. Los grupos se abren con un mínimo 25 alumnos inscritos; en caso de no apertura puede solicitar tu reembolso (consulta en el plantel el procedimiento). Becas: aplica sólo en parcialidades; la beca de 50% se otorga a los primeros 50 inscritos que cuenten con promedio general mínimo de siete (7.0) en el Certificado Total de Secundaria; becas del 40% sólo para inscritos de nuevo ingreso con promedio general mínimo de siete (7.0) en el Certificado Total de Secundaria. Las becas se renuevan anualmente, contando con promedio general mínimo de ocho (8.0); no son acumulables. Consulta las políticas de becas y requisitos en el Plantel. Duración: este programa se cursa 3 en ciclos anuales (tres años). Horarios. Clases de Lunes a Viernes en turno matutino de 7:10 a 14:20 h. Para mayor información, consulta en Plantel o en www.unimex.edu.mx</div>";

        switch ($idNivel) {
            case 1:
                return $licmetro;
                break;
            case 2:
                return $posmetro;
                break;

            default:
                return $prepa;
                break;
        }
    }

    function telefonoAndDireccionPlantel($idPlantel)
    {
        $izcalli  = '5864 9660 / 5873 9444';
        $satelite = '5374 7480 / 5393 1326 / 5562 2259 <br /> 5562 6347 /5562 4852';
        $polanco  = '9138 0060';
        $veracruz = '(229) 9231300 / (229) 9323916';

        $izcalliDir  = 'Av. Del Vidrio No. 15, Col. Plaza Dorada, Centro Urbano (Frente a la FES Cuautitlán) Campo 1, C.P. 54760 Cuautitlán Izcalli, Estado de México ';
        $sateliteDir = 'Circuito Poetas No. 37 (frente a Circuito Novelistas No. 41) Cd. Satélite C.P. 53100 Naucalpan de Juárez, Estado de México. ';
        $polancoDir  = 'Emilio Castelar No. 63, esq. Eugenio Sue, (Polanco o Auditorio). Col. Polanco-Chapultepec, C.P.11560, Ciudad de México';
        $veracruzDir = 'Av. 20 de noviembre esq. Juan Enríquez No. 1004 Veracruz, Ver.';

        $izcalliEmail = 'umizc_resprelaciones@unimex.edu.mx';
        $sateliteEmail = 'umsat_coorrelaciones@unimex.edu.mx';
        $polancoEmail  = 'umpol_coorrelaciones@unimex.edu.mx';
        $veracruzEmail = 'umver_relaciones@unimex.edu.mx';

        if ($idPlantel == '2') {
            session(['telefonoPlanCorreo' => $izcalli]);
            session(['plantelDir' => $izcalliDir]);
            session(['emailPlantel' => $izcalliEmail]);
        }
        if ($idPlantel == '3') {
            session(['telefonoPlanCorreo' => $satelite]);
            session(['plantelDir' => $sateliteDir]);
            session(['emailPlantel' => $sateliteEmail]);
        }
        if ($idPlantel == '4') {
            session(['telefonoPlanCorreo' => $polanco]);
            session(['plantelDir' => $polancoDir]);
            session(['emailPlantel' => $polancoEmail]);
        }
        if ($idPlantel == '5') {
            session(['telefonoPlanCorreo' => $veracruz]);
            session(['plantelDir' => $veracruzDir]);
            session(['emailPlantel' => $veracruzEmail]);
        }
    }

    public function testingCorreo()
    {
        try {

            Mail::to('pruebaRectoria0001Esp@ldfslfd44.com')->bcc("umrec_web@unimex.edu.mx")->send(new CalculadoraCuotas());

            $statusCode     = 200;
            $this->message  = "Correo enviado correctamente.";
            $this->result   = true;
        } catch (\Throwable $th) {
            $statusCode     = 200;
            $this->message  = $th->getMessage();
            //$this->message  = "Error al enviar correo.";
        } finally {
            $response = [
                'message'   => $this->message,
                'result'    => $this->result,
                'records'   => $this->records
            ];

            dd($response);
        }
    }
}
