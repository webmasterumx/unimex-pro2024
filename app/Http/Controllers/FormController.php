<?php

namespace App\Http\Controllers;

use App\Mail\ContactoProspecto;
use App\Mail\EmpresasOcc;
use App\Mail\QuejasSugerencias;
use App\Mail\ServicioAlumno;
use App\Mail\TrabajaUnimex;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Spatie\FlareClient\Api;

class FormController extends Controller
{

    private $utm_recurso;

    /** Anterior codigo de procesamiento de datos para formulario de contacto */
    public function contactoProspecto(Request $request)
    {
        /**
         * utm_source
         * utm_medium
         * utm_campaign
         * utm_term
         * utm_content
         * gad_source
         */

        $medium = session("utm_medium");

        if ($medium == "Organico" || $medium == "organico" || $medium == "ORGANICO") {
            # code...
        }

        $source = session("utm_source");
        $content = session("utm_content");
        $campaign = session("utm_campaign");
        $term = session("utm_term");

        $valores = array(
            "pNombre" => $request->nombre_prospecto,
            "pApPaterno" => $request->apellidos_prospecto,
            "pApMaterno" => "",
            "pTelefono" => $request->telefono_prospecto,
            "pCelular" => $request->celular_prospecto,
            "pCorreo" => $request->mail_prospecto,
            "pPeriodoEscolar" => $request->periodoSelect,
            "pPlantel" => $request->plantelSelect,
            "pNivel_Estudio" => $request->nivelSelect,
            "pCarrera" => $request->carreraSelect,
            "pHorario" => $request->horarioSelect,
            "pOrigen" => 11,
            "utpsource" =>  $source,
            "descripPublicidad" => $campaign,
            "campaignMedium" => $medium,
            "campaignTerm" => $term,
            "campaignContent" => $content,
            "websiteURL" => "https://unimex.edu.mx/",
            "folioReferido" => "0"
        );

        //dd($valores);

        $respuesta = app(ApiConsumoController::class)->agregarProspectoCRM($valores); //! envio de datos al WS
        /* $respuesta = array(
            "FolioCRM" => 1206174,
            "Mensaje" => "",
            "Nombre" => "prueba desde rectoria",
            "Ciclo" => "Septiembre - 2024",
            "Nivel" => "Licenciatura",
            "Carrera" => "Administración de Empresas Turísticas",
            "Turno" => "Sabatino B Sábado 07:00 a 16:00",
            "Plantel" => "SATELITE",
            "FechaVigenciaPromocion_Incio" => "Lunes 19 de Febrero del 2024",
            "FechaVigenciaPromocion_Final" => "Domingo 24 de Diciembre del 2017",
            "Email" => "rectoria_testing@gmial.com"
        ); */

        //$recive = $request->mail_prospecto;
        $correos = [
            "umrec_cdbd@unimex.edu.mx",
            "umrec_web@unimex.edu.mx"
        ];
        $envio =  Mail::to($correos)->bcc("umrec_web@unimex.edu.mx")->send(new ContactoProspecto($request, $respuesta)); //! envio del correo

        return view('registroExitoso', [
            "respuesta" => $respuesta,
            "datos" => $request,
        ]);
    }

    /** nueva funcion de procesamiento de datos para formulario de contacto */
    /**
     * Aqui se debe validar que las utm que estan llegando sean organicas o no, si hay variables de session o no
     * Primero se debe aplicar la validacion si existe algun a variable de sesion activa si es asi se debe validar la utm_medium
     * si es organica se deben optener la abreviatura del lugar donde viene para forzar la utm correspondiente
     * si no es organica simplemente se pasan las variables de session ya que viene de campaña
     * si no hay variables de session se asume que es organica 
     */
    public function procesaFormularioContacto(Request $request)
    {

        $origen = $request->origen;
        $abreviatura = $request->abreviatura;
        $abreviaturaFormateada = str_replace("+", " ", $abreviatura);
        $utmMedium = $request->utm_medium;
        $urlEnvioForm = $request->urlVisitada;

        //var_dump($origen);
        //var_dump($abreviatura);


        $this->utm_recurso = new UtmController();

        //! se conservan las variables de session

        if ($utmMedium == "organico" || $utmMedium  == "ORGANICO" || $utmMedium == "Organico" || $utmMedium == null) { // la utm en session no es organica

            if ($origen == "slider") { //! si osi vienen desde una oferta academica
                $source = "Website Metro";
                $campaign = "Home body";
                $content = "Slider" . $abreviaturaFormateada . " Oacademica form";

            } else if ($origen == "menu") { //! si osi vienen desde una oferta academica
                $source = "Website Metro";
                $campaign = "Home header";
                $content = "Oacademica " . $abreviaturaFormateada . " body form";

            } else if ($origen == "Home") { // viene desde la pagina home 
                $source = "Website Metro";
                $campaign = "Home body";
                $content = "Form Informes";
            } else if ($origen == "Info") { // viene desde la pagina contacto
                $source = "Website Metro";
                $campaign = "Home header";
                $content = "Botón informes";
            } else {
                $source = "Website Metro";
                $campaign = "Oacademica body";
                $content = "Form " . $abreviaturaFormateada . " Informes";
            }

            $medium = "Organico";
            $term = "Informes";
        } else {
            $source = session("utm_source");
            $medium = session("utm_medium");
            $content = session("utm_content");
            $campaign = session("utm_campaign");
            $term = session("utm_term");
        }


        //https://unimex.edu.mx/calcula-tu-cuota/?utm_source=El+Universal+secciones&utm_medium=Universaldxd&utm_campaign=2024+1&utm_term=universidad+mexicana&utm_content=metro


        //! establecimiento de variables para utm
        //$baseUrl = env('APP_URL');

        //! creando array de datos a procesar
        $valores = array(
            "pNombre" => $request->nombre_prospecto,
            "pApPaterno" => $request->apellidos_prospecto,
            "pApMaterno" => "",
            "pTelefono" => $request->telefono_prospecto,
            "pCelular" => $request->celular_prospecto,
            "pCorreo" => $request->mail_prospecto,
            "pPeriodoEscolar" => $request->periodoSelect,
            "pPlantel" => $request->plantelSelect,
            "pNivel_Estudio" => $request->nivelSelect,
            "pCarrera" => $request->carreraSelect,
            "pHorario" => $request->horarioSelect,
            "pOrigen" => 11,
            "utpsource" =>  $source,
            "descripPublicidad" => $campaign,
            "campaignMedium" => $medium,
            "campaignTerm" => $term,
            "campaignContent" => $content,
            "websiteURL" => $urlEnvioForm,
            "folioReferido" => "0"
        );

        //var_dump($valores);

        //! envio de datos al WS
        $respuesta = app(ApiConsumoController::class)->agregarProspectoCRM($valores); //! envio de datos al WS 

        /**
         * Evalua la respuesta del web service 
         *! Si el folio es 0 ocurrio un error y se redirigira a la vista de error 
         *? Si es diferente a 0 se enviara un correo y redireccionara a la vista de exito
         */
        if ($respuesta['FolioCRM'] != 0) {

            //? se intenta enviar el correo
            try {
                $correos = [
                    "umrec_cdbd@unimex.edu.mx",
                    "umrec_web@unimex.edu.mx"
                ];

                $dataCorreo["folio"] = $respuesta['FolioCRM'];
                $dataCorreo["nombre"] = $request->nombre_prospecto . " " . $request->apellidos_prospecto;
                $dataCorreo["nivel"] = $request->nivelSeleccion;
                $dataCorreo["plantel"] = $request->plantelSeleccion;
                $dataCorreo['carrera'] = $request->carreraSeleccion;
                $dataCorreo["ciclo"] = $request->periodoSeleccion;
                $dataCorreo["horario"] = $request->horarioSeleccion;


                Mail::to($correos)->bcc($request->mail_prospecto)->send(new ContactoProspecto($dataCorreo)); //! envio del correo

                $messageCorreo  = "Correo enviado correctamente.";
                $resultCorreo  = true;
            } catch (\Throwable $th) {
                //resguardar variables por si necerita
                $messageCorreo = "Error al enviar correo.";
                $resultCorreo = false;
            }

            //* se establecen variables de session para imprimir datos en la vista de registro exitoso
            session(["registroExitNombre" => $request->nombre_prospecto]);
            session(["registroExitFolio" => $respuesta['FolioCRM']]);
            session(["registroExitPlantel" => $request->plantelSeleccion]);
            session(["registroExitNivel" => $request->nivelSeleccion]);
            session(["registroExitCarrera" => $request->carreraSeleccion]);
            session(["registroExitPeriodo" => $request->periodoSeleccion]);

            $respuestaFinal['estado'] = true;
            $respuestaFinal['estadoCorreo'] = $resultCorreo;
            $respuestaFinal['ruta'] = "registro_exitoso";
        } else {

            $respuestaFinal['estado'] = false;
            $respuestaFinal['estadoCorreo'] = false;
            $respuestaFinal['ruta'] = "error_de_registro";
        }

        return response()->json($respuestaFinal);
    }

    public function servicioAlumnos(Request $request)
    {
        $valores = array(
            "nombre" => $request->name_service,
            "mail" => $request->email_service,
            "tel_casa" => $request->phone_casa_service,
            "tel_celular" => $request->movil_service,
            "plantel" => $request->select_plantel,
            "asunto" => $request->asunto_service,
            "matricula" => $request->matricula_service,
            "mensaje" => $request->mensaje_service
        );

        $recive = "lishanxime201099@gmail.com";
        $correos = [
            "umrec_cdbd@unimex.edu.mx",
            "lishanxime201099@gmail.com"
        ];
        $envio =  Mail::to($correos)->bcc("umrec_web@unimex.edu.mx")->send(new ServicioAlumno($valores));

        var_dump($envio);
    }

    public function trabajaUnimex(Request $request)
    {
        $valores = array(
            "nombre" => $request->nombre_trabajo,
            "mail" => $request->email_trabaja,
            "telefono_casa" => $request->telefono_casa_trabaja,
            "telefono_celular" => $request->telefono_movil_trabaja,
            "plantel" => $request->plantel_trabaja,
            "nivel_estudios" => $request->nivel_est_trabaja,
            "puesto_interes" => $request->puesto_interes,
            "experiencia_laboral" => $request->experiencia_trabaja
        );

        $file = $request->file('cv_trabaja');

        $recive = "lishanxime201099@gmail.com";
        $correos = [
            "umrec_cdbd@unimex.edu.mx",
            "lishanxime201099@gmail.com"
        ];
        $envio =  Mail::to($correos)->bcc("umrec_web@unimex.edu.mx")->send(new TrabajaUnimex($valores, $file));

        var_dump($envio);
    }

    public function quejasYsugerencias(Request $request)
    {
        $valores = array(
            "nombre" => $request->nombre_qys,
            "mail" => $request->mail_qys,
            "telefono_casa" => $request->telefono_casa_qys,
            "telefono_celular" => $request->telefono_movil_qys,
            "matricula" => $request->matricula_qys,
            "asunto" => $request->asunto_qys,
            "mensaje" => $request->mensaje_qys
        );

        $recive = "lishanxime201099@gmail.com";
        $correos = [
            "umrec_cdbd@unimex.edu.mx",
            "lishanxime201099@gmail.com"
        ];
        $envio = Mail::to($correos)->bcc("umrec_web@unimex.edu.mx")->send(new QuejasSugerencias($valores));

        var_dump($envio);
    }

    public function empresasOCC(Request $request)
    {
        $valores = array(
            "empresa" => $request->nombre_empresaOCC,
            "contacto" => $request->contacto_empresaOCC,
            "email" => $request->email_empresaOCC,
            "telefono" => $request->telefono_empresaOCC,
            "celular" => $request->celular_empresaOCC,
            "razon" => $request->razon_empresaOCC,
            "rfc" => $request->rfc_empresaOCC,
            "comentarios" => $request->comentarios_empresaOCC,
        );

        if ($request->type_empresaOCC == 1) //tiene cuenta en occ
        {
            $asunto = "Empresas Registradas en OCC";
        } else //no tiene cuenta en occ
        {
            $asunto = "Empresas por Registrar en OCC";
        }

        $recive = "lishanxime201099@gmail.com";
        $correos = [
            "umrec_cdbd@unimex.edu.mx",
            "lishanxime201099@gmail.com"
        ];
        $envio = Mail::to($correos)->bcc("umrec_web@unimex.edu.mx")->send(new EmpresasOcc($valores, $asunto));

        var_dump($envio);
    }

    public function testerEnvio()
    {
        $recive = "lishanxime201099@gmail.com";
        //$envio =  Mail::to($recive)->bcc("umrec_web@unimex.edu.mx")->send(new ServicioAlumno());
        //dd($envio);
    }

    public function agregrarProspectoSinEroi(Request $request)
    {
        $params = $request->all();

        var_dump($params);

        $agregar = app(ApiConsumoController::class)->registraProspectoCRMDesdePreinscripcionEnLinea($params);

        var_dump($agregar);
    }

    public function buscarProspectoForFolio($folio)
    {
        $valores = array(
            "folioCRM" => $folio,
        );

        $resultado = app(ApiConsumoController::class)->getProspectoPreinscripcionEnLinea($valores);

        return view('preinscripcionEnLinea.formaDePago', [
            "informacion" => $resultado
        ]);
    }

    /**
     * valida si el prospecto que si existe tiene matricula
     * esto se hace a travez de una busqeda por medio del correo 
     * con esto se optiene su detalle de informacion
     */
    public function validarMatriculacion($correo)
    {
        $valores = array(
            "tipoBusqueda" => 4,
            "textoBuscar" => $correo,
            "clavePlantel" => 0
        );

        $busqueda = app(ApiConsumoController::class)->buscarProspectoPorCorreo($valores);

        return response()->json($busqueda);
    }

    public function getResultadosExamen(Request $request)
    {
        $valores = array(
            "Matricula" => $request->matriculaResultado
        );

        $resultados = app(ApiConsumoController::class)->resultadosExamen($valores);

        return response()->json($resultados);
    }

    public function procesaFormularioFolletos(Request $request)
    {

        $licenciatura = $request->carreraPosicion;
        $plantel = $request->plantelSelectFolleto;
        $periodo = $request->peridoSelectFolleto;
        $nivel  = $request->nivelPosicion;
        $horario = $request->turnoPosicionado;
        $claveCarrera = SELF::getIdentificarCarrera($licenciatura, $plantel, $periodo, $nivel);

        //echo $claveCarrera;

        if ($claveCarrera == 0) {

            $respuesta['estado'] = false;
            $respuesta['ruta'] = "";
        } else {

            $archivo = SELF::getRutaFolleto($plantel, $nivel, $horario, $claveCarrera);

            $respuesta['estado'] = true;
            $respuesta['ruta'] = $archivo['ruta_archivo'];
        }

        //var_dump($respuesta);

        $valores = array(
            "campaingContent" => "",
            "campaignMedium" => "",
            "campaignTerm" => "",
            "descripPublicidad" => "",
            "folioReferido" => "0",
            "pApMaterno" => "",
            "pApPaterno" => "",
            "pCarrera" => $claveCarrera,
            "pCelular" => $request->celularFolleto,
            "pCorreo" => $request->correoFolleto,
            "pHorario" => 0,
            "pNivel_Estudio" => $nivel,
            "pNombre" => $request->nombreFolleto,
            "pOrigen" => 11,
            "pPeriodoEscolar" => $request->peridoSelectFolleto,
            "pPlantel" => $request->plantelSelectFolleto,
            "pTelefono" => "",
            "utpsource" => "",
            "websiteURL" => "https://unimex.edu.mx/",
        );

        $agregarProspecto = app(ApiConsumoController::class)->agregarProspectoCRM($valores);

        return response()->json($respuesta);
    }

    public function getIdentificarCarrera($licenciatura, $plantel, $periodo, $nivel)
    {

        $claveCarrera = 0;

        $valores = [
            "clavePlantel" => $plantel,
            "claveNivel" => $nivel,
            "clavePeriodo" => $periodo,
        ];

        //var_dump($valores);

        $catalogoCarreras = app(ApiConsumoController::class)->getCarrerasMethod($valores);

        //var_dump($catalogoCarreras);

        if (isset($catalogoCarreras["error"])) {
            //echo "no hay carreras disponibles";
            $claveCarrera = 0;
        } else {
            //echo "hay carreras disponibles";
            foreach ($catalogoCarreras as $carrera) {
                if ($licenciatura == $carrera['descrip']) {
                    $claveCarrera = $carrera['clave'];
                }
            }
        }

        //echo $claveCarrera;

        return $claveCarrera;
    }

    public function getRutaFolleto($plantel, $nivel, $horario, $claveCarrera)
    {
        $valores = [
            "clavePlantel" => $plantel,
            "claveNivel" => $nivel,
            "claveCarrera" => $claveCarrera,
            "claveTurno" => $horario,
            "tipoDocumento" => 1
        ];

        //var_dump($valores);

        $rutaArchivo = app(ApiConsumoController::class)->getDocumentosFolleto($valores);

        return $rutaArchivo;
    }

    public function getClaveHorarioForPlantel()
    {
        $matHorarios = [""];
    }
}
