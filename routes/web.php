<?php

use App\Http\Controllers\ApiConsumoController;
use App\Http\Controllers\CalculadoraCuotasController;
use App\Http\Controllers\ExtrasUnimexController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PreinscripcionEnLineaController;
use App\Http\Controllers\ProyeccionProfesionalController;
use App\Http\Controllers\TestVocacionalController;
use App\Http\Controllers\UnimexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [UnimexController::class, 'inicio'])->name('inicio');
Route::get('/planteles/{slug}', [UnimexController::class, 'getPlanteles'])->name('plantel');
Route::get('/acerca-de-unimex/{alug}', [UnimexController::class, 'getAcercade'])->name('acercade');
Route::get('/licenciatura/{slug}', [UnimexController::class, 'getLicenciatura'])->name('licenciatura');
Route::get('/licenciatura/sua/{slug}', [UnimexController::class, 'getLicenciaturaSua'])->name('licenciatura.sua');
Route::get('/licenciatura/distancia/{slug}', [UnimexController::class, 'getLicenciaturaDistancia'])->name('licenciatura.distancia');
Route::get('/posgrado/{slug}', [UnimexController::class, 'getPosgrado'])->name('posgrado');
Route::get('/posgrado/distancia/{slug}', [UnimexController::class, 'getPosgradoDistancia'])->name('posgrado.distancia');
Route::get('/contacto', [UnimexController::class, 'contacto'])->name('contacto');
Route::get('/calcula-tu-cuota', [UnimexController::class, 'calculaTuCuota'])->name('calcula_tu_cuota');
Route::get('/preinscripcion/ficha/pdf', [UnimexController::class, 'fichaPDFGenerar'])->name('preinscripcion.fichs.pdf');
Route::get('/preguntas-frecuentes', [UnimexController::class, 'preguntasFrecuentes'])->name('preguntas.frecuentes');
Route::get('/rvoes', [UnimexController::class, 'rvoe'])->name('rvoes');
Route::get('/investigacion', [UnimexController::class, 'investigacion'])->name('investigacion');
Route::get('/carta/resutado/{matricula}', [UnimexController::class, 'cartaResultados'])->name('carta.resultado');
Route::get('/forma/pago/preinscripcion/{folio}', [FormController::class, 'buscarProspectoForFolio'])->name('forma.pago.preinscripcion');
Route::get('/bolsa-de-trabajo', [UnimexController::class, 'bolsaDeTrabajo'])->name('bolsa_de_trabajo');
Route::view('/opciones-de-titulacion', 'opciones_titulacion')->name('opciones_de_titulacion');
Route::view('/examen-de-conocimientos', 'examen_de_conocimientos')->name('examen_de_conocimientos');
Route::view('/resutados-examen', 'resultadosExamenConocimientos')->name('resultados_examen_conocimientos');
Route::view('/servicio-social', 'servicioSocial')->name('servicio.social');
Route::view('/calendarios-escolares', 'calendarios_escolares')->name('calendarios_escolares');
Route::view('/aviso-de-privacidad', 'aviso-privacidad')->name('aviso_de_privacidad');
Route::view('/datos/pago/preinscripcion', 'preinscripcionEnLinea.datosPago')->name('datos.pago');
Route::view("/registro_exitoso", "registroExitoso")->name('registro.exitoso');
Route::view("/error_de_registro", "errorRegistro")->name("error.registro");
Route::post('/procesa/datos/folleto', [FormController::class, 'procesaFormularioFolletos'])->name('procesa.datos.folleto');
Route::post('/procesa/datos/form/contacto', [FormController::class, 'procesaFormularioContacto'])->name('procesa.datos.contacto.inicial');

//? variables de establecimiento para fomulario de contacto
Route::get('/set/variables/contactForm/{elemento}', [ExtrasUnimexController::class, 'setVariablesFormContacto'])->name('set.variables.contactForm');
Route::get('/get/variables/contactForm', [ExtrasUnimexController::class, 'getVariablesFormContacto'])->name('get.variables.contactForm');

//* rutas de establecimiento de variables de session para calculadora de becas
Route::get('/set/variables/calculadora/{nivel}/{carrera}', [ExtrasUnimexController::class, 'setVariablesPosicionamientoCalculadora'])->name("set.variables.calculadora");
Route::get('/set/variables/preinscripcion/{nivel}/{carrera}', [ExtrasUnimexController::class, 'setVariablesPosicionamientoPreinscripcion'])->name('set.variables.preinscripcion');
Route::get('/set/variables/foliocrm/{foliocrm}', [ExtrasUnimexController::class, 'setVariablesPosicionamientoFolioCrm'])->name('sat.variables.foliocrm');
Route::get('/get/variables/calculadora', [ExtrasUnimexController::class, 'getVariablesPosicionamientoCalculadora'])->name('get.variables.calculadora');
Route::get('/get/variables/preinscripcion', [ExtrasUnimexController::class, 'getVariablesPosicionamientoPreinscripcion'])->name('get.variables.preinscripcion');
Route::get('/get/variables/foliocrm', [ExtrasUnimexController::class, 'getVariablePosicionamientoFolioCrm'])->name('get.variable.foliocrm');

//! propectacion
Route::get('/prospectacion', [PreinscripcionEnLineaController::class, 'index'])->name('prospectacion');

//? proyeccion profesional
Route::get("/proyeccion-profesional", [ProyeccionProfesionalController::class, 'index'])->name('proyeccion.profesional');

//* TestVocacional
Route::get("/TestVocacional", [TestVocacionalController::class, 'index'])->name('test.vocacional.index');
Route::get("/TestVocacional/App", [TestVocacionalController::class, 'iniciarTest']);

//!modulo de preinscripcion en linea
Route::get('/App/Preinscripcion-online', [PreinscripcionEnLineaController::class, 'index'])->name('preinscripcion.linea');
Route::post('/validacion/preinscripcion', [PreinscripcionEnLineaController::class, 'validacionDeCorreo'])->name('validacion.preinscripcion.linea');
Route::get('/form/datos_generales/preinscripcion', [PreinscripcionEnLineaController::class, 'formDatosGenerales'])->name('form.datos.generales.preinscripcion');
Route::post('/obtener/promo/preinscripcion', [PreinscripcionEnLineaController::class, 'obtenerPromocion'])->name('obtener.promo.preinscripcion');
Route::get('/registrar/prospecto/preinscripcion/linea', [PreinscripcionEnLineaController::class, 'registrarPreinscripcionEnLinea'])->name('registrar.prospecto.preinscripcion');
Route::view('/preinscripcionEnLinea/forma_de_pago', 'preinscripcionEnLinea.formaDePago')->name("preinscripcionEnLinea.formaPago");
Route::get('/ficha/generar/pdf', [PreinscripcionEnLineaController::class, 'fichaPDFGenerar'])->name('ficha.pdf');
Route::get('/get/info/prospecto', [PreinscripcionEnLineaController::class, 'getInfoProspecto'])->name('get.info.prospecto');
Route::get('/agendar/actividad/preinscripcion', [PreinscripcionEnLineaController::class, 'insertarRegistroActividadParaMatriculado'])->name('agendar.actividad.preinscripcion');

//? consumo de la api para formulario   
Route::get('/getPlanteles', [ApiConsumoController::class, 'getPlanteles'])->name('get.planteles');
Route::post('/getNiveles', [ApiConsumoController::class, 'getNiveles'])->name('get.niveles');
Route::post('/getPeriodos', [ApiConsumoController::class, 'getPeriodos'])->name('get.periodos');
Route::post('/getCarreras', [ApiConsumoController::class, 'getCarreras'])->name('get.carreras');
Route::post('/getHorarios', [ApiConsumoController::class, 'getHorarios'])->name('get.horarios');
Route::post('/get/horarios/calculadora', [ApiConsumoController::class, 'calculadoraHorarios'])->name('get.horarios.calculadora');
Route::post('/get/detalle/beca', [ApiConsumoController::class, 'calculaDetalleHorarios'])->name('get.detalle.horario');
Route::post('/actualiza/prospecto/calculadora', [ApiConsumoController::class, 'actualizaProspecto'])->name('actualiza.prospecto.calculadora');
Route::post('/valida/prospecto', [ApiConsumoController::class, 'verificaProspecto'])->name('valida.prospecto');
Route::get('/getMunicipios/{estado}', [ApiConsumoController::class, 'getMunicipios'])->name('get.municipios');
Route::post('/preinscripcion/get/carreras', [ApiConsumoController::class, 'preinscripcionGetCarreras'])->name('preinscripcion.get.carreras');
Route::post('/preinscripcion/get/horarios', [ApiConsumoController::class, 'preinscripcionGetHorarios'])->name('preinscripcion.get.horarios');
Route::post('/guardar/bitacora/preinscripcion', [ApiConsumoController::class, 'guardarActividadBitacora'])->name('guardar.bitacora.preinscripcion');
Route::post('/add/prospectacion', [ApiConsumoController::class, 'addProspectacion'])->name('add.prospectacion');

//* resultados de examen
Route::post('/obtener/resultados/examen', [FormController::class, 'getResultadosExamen'])->name('obtener.resultdos.examen');
Route::post('/form/servicio/alumno', [FormController::class, 'servicioAlumnos'])->name('form.servicio.alumno');
Route::post('/form/trabaja/unimex', [FormController::class, 'trabajaUnimex'])->name('form.trabaja.unimex');
Route::post('/form/quejas/sugerencias', [FormController::class, 'quejasYsugerencias'])->name('form.quejas.sugerencias');
Route::post('/form/empresas/occ', [FormController::class, 'empresasOCC'])->name('form.empresas.pcc');
//? peticiones de calculadora de cuotas
Route::any('/insertar/prospecto/calculadora', [CalculadoraCuotasController::class, 'insertarProspecto'])->name('paso.uno');
Route::post('/enviar/correo/detalles/beca', [CalculadoraCuotasController::class, 'enviarCorreoDetallesBeca'])->name('enviar.detalles.beca.calculadora');
//* variables de establecimiento para calculadora de cuotas
Route::get('/set/variables/combos/calculadora/{carrera}/{id}', [ExtrasUnimexController::class, 'setVariableCarreraCombo'])->name('set.variables.combos.carrera');
Route::get('/get/variables/combos/calculadora/', [ExtrasUnimexController::class, 'getVariableCarreraCombo'])->name('get.variables.combos.carrera');

//!testing
Route::get('/testing', [FormController::class, 'testerEnvio'])->name('testing');
Route::get('/testing/calculadora/cuotas', [CalculadoraCuotasController::class, 'index'])->name('calculadora.becas.test');
Route::get('/testing/correo', [CalculadoraCuotasController::class, 'testingCorreo']);
