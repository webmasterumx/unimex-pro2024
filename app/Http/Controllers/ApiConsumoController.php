<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Mockery\Undefined;

class ApiConsumoController extends Controller
{

    public $base_url = 'https://api-testing.unimexver.edu.mx/api/';
    public $baseUrlProduccion = "https://api.unimexver.edu.mx/api/";

    /**
     * Metodo ocupado en:
     * Formulario de Contacto
     * Calculadora de Becas 
     */
    public function getPlanteles()
    {
        $response = Http::get($this->base_url . 'oferta/planteles');

        return $response->json();
    }

    public function getNiveles(Request $request)
    {
        $plantel = $request->plantel;
        $response = Http::post($this->base_url . 'oferta/niveles', [
            'clavePlantel' => $plantel,
        ]);

        return $response->json();
    }

    public function getPeriodos(Request $request)
    {
        $plantel = $request->plantel;
        $response = Http::post($this->base_url . 'oferta/periodos', [
            'clavePlantel' => $plantel,
        ]);

        return $response->json();
    }

    public function getCarreras(Request $request)
    {
        $plantel = $request->plantel;
        $nivel = $request->nivel;
        $periodo = $request->periodo;

        $response = Http::post($this->base_url . 'oferta/carreras', [
            'clavePlantel' => $plantel,
            'claveNivel' => $nivel,
            'clavePeriodo' =>   $periodo
        ]);

        return $response->json();
    }

    // optimizar metodos

    public function getCarrerasMethod($valores)
    {
        $response = Http::post($this->base_url . 'oferta/carreras', $valores);

        return $response->json();
    }

    public function getHorarios(Request $request)
    {
        $plantel = $request->plantel;
        $nivel = $request->nivel;
        $periodo = $request->periodo;
        $carrera = $request->carrera;

        $response = Http::post($this->base_url . 'oferta/turnos', [
            'clavePlantel' => $plantel,
            'claveNivel' => $nivel,
            'clavePeriodo' =>   $periodo,
            'claveCarrera' => $carrera
        ]);

        return $response->json();
    }

    //! inicio metodos de calculadora
    public function calculadoraHorarios(Request $request)
    {

        $response = Http::post($this->base_url . 'calculadora/horarios', [
            "claveCarrera" => $request->claveCarrera,
            "claveNivel" => $request->claveNivel,
            "clavePeriodo" => $request->clavePeriodo,
            "PlantelId" => $request->PlantelId,
            "promedio" => 0,
        ]);

        return $response->json();
    }

    public function calculaDetalleHorarios(Request $request)
    {
        $response = Http::post($this->base_url . 'calculadora/detalle-horario', [
            "PlantelId" => $request->PlantelId,
            "claveCarrera" => $request->claveCarrera,
            "claveTurno" => $request->claveTurno,
            "claveNivel" => $request->claveNivel,
            "clavePeriodo" => $request->clavePeriodo,
            "claveBeca" => $request->claveBeca,
            "egresado" => $request->egresado,
        ]);

        if (isset($response['Beca'])) {
            app(CalculadoraCuotasController::class)->establecerVariablesPromocion($response);
        }

        return $response->json();
    }

    public function actualizaProspecto(Request $request)
    {
        $response = Http::post($this->base_url . 'calculadora/actualiza', [
            "clavePeriodo" => $request->clavePeriodo,
            "clavePlantel" => $request->clavePlantel,
            "claveNivel" => $request->claveNivel,
            "claveCarrera" => $request->claveCarrera,
            "claveTurno" => $request->claveTurno,
            "folioCrm" => $request->folioCrm
        ]);

        return $response->json();
    }

    //! fin metodos de calculadora

    public function agregarProspectoCRM($valores)
    {
        $response = Http::post($this->base_url . 'agrega-prospecto', $valores);

        return $response->json();
    }

    //* preinscripcion en linea
    public function verificaProspecto($valores)
    {
        $response = Http::post($this->base_url . 'preinscripcion/existe_prospecto_crm', $valores);

        return $response->json();
    }

    public function getProspectoPreinscripcionEnLinea($valores)
    {
        $response = Http::post($this->base_url . 'ficha/prospecto', $valores);

        return $response->json();
    }

    public function getEstados()
    {
        $response = Http::get($this->base_url . 'estados');

        return $response->json();
    }

    public function  getMunicipios($estado)
    {
        $response = Http::post($this->base_url . 'municipios', [
            "estado" => $estado
        ]);

        return $response->json();
    }

    public function resultadosExamen($valores)
    {
        $response = Http::post($this->base_url . 'resultados/conocimiento', $valores);

        return $response->json();
    }

    //! preincripcion en linea 
    public function preinscripcionPromociones($valores)
    {
        $response = Http::post($this->base_url . 'preinscripcion/promociones', $valores);

        return $response->json();
    }

    public function registraProspectoCRMDesdePreinscripcionEnLinea($valores)
    {
        $response = Http::post($this->base_url . 'preinscripcion/registrar/prospecto', $valores);

        return $response->json();
    }

    public function preinscripcionGetCarreras(Request $request)
    {
        $response = Http::post($this->base_url . 'preinscripcion/get/catalogo/carreras', [
            'clavePlantel' => $request->plantel,
            'claveNivel' => $request->nivel,
            'clavePeriodo' =>   $request->periodo
        ]);

        return $response->json();
    }

    public function preinscripcionGetHorarios(Request $request)
    {
        $response = Http::post($this->base_url . 'preinscripcion/get/catalogo/horarios', [
            "clavePlantel" => $request->plantel,
            "claveNivel" => $request->nivel,
            "claveCarrera" => $request->carrera,
            "clavePeriodo" => $request->periodo
        ]);

        return $response->json();
    }

    //! obtner prospecto para preinscricion en linea
    public function getInfoProspecto($valores)
    {
        $response = Http::post($this->base_url . 'ficha/prospecto', $valores);

        return $response->json();
    }

    //! guardar actividad en bitacora de CRM se usa para preinscripcion en linea
    public function guardarActividadBitacora($valores)
    {
        $response = Http::post($this->base_url . 'registrar/bitacora', $valores);

        return $response->json();
    }

    //? añadir prospectacion
    public function addProspectacion($valores)
    {
        $response = Http::post($this->base_url . 'prospectacion', $valores);

        return $response->json();
    }

    //? obtiene la ruta del documento para los folletos
    public function getDocumentosFolleto($valores)  
    {
        $response = Http::post($this->baseUrlProduccion . 'kontux/obtener-documentos', $valores);

        return $response->json();
    }
}
