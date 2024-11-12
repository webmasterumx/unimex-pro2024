@extends('layouts.layoutPreinscripcion')

@section('content')
    <div class="container" style="margin-top: 8rem !important;">
        <div class="row">
            {{-- <div class="col-12">
                <h1 class="text-center fw-normal" style="color: rgba(241,145,29,1.00);">
                    <i class="bi bi-card-list"></i>
                    PREINSCRIPCIÓN EN LÍNEA
                </h1>
            </div> --}}
            <div class="col-12 row">
                <div class="col-12 col-md-12 col-lg-4 text-center">
                    <img class="mt-5" src="{{ asset('assets/img/preinscripcion_linea/preinscripcion.png') }}" alt="">
                    <br>
                    <p class="fs-3" style="color: #00539a !important;">
                        Forma parte de UNIMEX®
                    </p>
                </div>
                <div class="col-12 col-md-12 col-lg-8" style="color: #00539a !important;">
                    <h3>
                        Ventajas de la preinscripción en línea:
                    </h3>
                    <ul style="list-style: none;">
                        <li>
                            <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i>
                            Apartas tu lugar en la Licenciatura o Posgrado y en el Horario deseado.
                        </li>
                        <li>
                            <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i>
                            Apartas las cuotas de Inscripción preferenciales del momento.
                        </li>
                        <li>
                            <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i>
                            Tienes más tiempo para pagar tu Inscripción y entregar tus documentos.
                        </li>
                        <li>
                            <i class="bi bi-check-square fs-3" style="color: rgba(241, 145, 29, 1.00);"></i>
                            Puedes pre-inscribirte desde cualquier computadora.
                        </li>
                    </ul>
                    <p>
                        <b>
                            Al final completas tu trámite, entregando tu documentación en el Campus, dentro del plazo
                            especificado.
                        </b>
                    </p>
                    <hr style="border: 1px rgb(226, 127, 7) solid;">
                    <form id="formPreincripcion" class="row">
                        <div class="col-12 col-md-6">
                            @csrf
                            <p>
                                Ingresa tu correo electrónico.
                            </p>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="Ejemplo: micorreo@dominio.com"
                                    name="correo" id="correo" maxlength="50">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <p>
                                Ingresa tu número móvil.
                            </p>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputPhone">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Teléfono movil"
                                    aria-label="telefono" aria-describedby="inputPhone" name="telefono" id="telefono"
                                    minlength="10" maxlength="10">
                            </div>
                        </div>
                        <input type="hidden" name="utm_source" id="utm_source"
                            @if ($dataUTM != null) value="{{ $dataUTM['utm_source'] }}" @else value="0" @endif>
                        <input type="hidden" name="utm_medium" id="utm_medium"
                            @if ($dataUTM != null) value="{{ $dataUTM['utm_medium'] }}" @else value="0" @endif>
                        <input type="hidden" name="utm_campaign" id="utm_campaign"
                            @if ($dataUTM != null) value="{{ $dataUTM['utm_campaign'] }}" @else value="0" @endif>
                        <input type="hidden" name="utm_term" id="utm_term"
                            @if ($dataUTM != null) value="{{ $dataUTM['utm_term'] }}" @else value="0" @endif>
                        <input type="hidden" name="utm_content" id="utm_content"
                            @if ($dataUTM != null) value="{{ $dataUTM['utm_content'] }}" @else value="0" @endif>
                        <div class="col-12  d-flex">
                            <!-- Button trigger modal -->
                            <input type="checkbox" id="avisoPrivacidad" name="avisoPrivacidad" checked>
                            <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                data-bs-target="#inscripcionAvisoPrivacidad">
                                He leído y estoy de acuerdo con las políticas de pre-inscripción y el aviso de privacidad.
                            </button>
                        </div>
                        <div class="col-12">
                            <button id="validarCorreo" type="submit" class="btn btn-primary mt-3">
                                <i class="bi bi-box-arrow-right"></i>
                                Continuar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('modales.preinscripcionAviso')
@include('modales.confirmacion')

@section('scripts')
    <script>
        // A $( document ).ready() block.
        /* $(document).ready(function() {
            $('#statictConfirmPreinscripcion').modal('show');
        }); */

        $.ajax({
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: setUrlBase() + "get/variables/preinscripcion",
        }).done(function(data) {
            console.log(data);
            if (data.nivel_preinscripcion != null) {
                console.log('hay variable de session para este modulo');
            }
            else{
                console.log("no hay variables precargadas");
                
            }

        }).fail(function() {
            console.log("Algo salió mal");
        });

        function setUrlBase() {
            let urlBase = "{{ env('APP_URL') }}";
            return urlBase;
        }

        $('#avisoPrivacidad').on('click', function() {
            if ($(this).is(':checked')) {
                // Hacer algo si el checkbox ha sido seleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
                $('#validarCorreo').attr('disabled', false);
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                //console.log("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
                $('#validarCorreo').attr('disabled', true);
            }
        });
    </script>
@endsection
