<!-- modal empresas occ -->
<div class="modal fade" id="empresasOCC" tabindex="-1" aria-labelledby="empresasOCCLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button onclick="resetForms(4)" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1 class="modal-title text-center fs-5" id="empresasOCCLabel">Empresas Registradas en OCC</h1>
                <form id="form_empresasOCC" class="row">
                    @csrf
                    <div class="col-12">
                        <p id="parrafoEmpresasOCC">
                            Ingresa los datos de tu empresa para publicar tus vacantes.
                        </p>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="nombre_empresaOCC" class="form-label">
                                <i class="bi bi-bank2" style="color: #004b93;"></i> Nombre de la Empresa
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="nombre_empresaOCC" name="nombre_empresaOCC">
                        </div>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="contacto_empresaOCC" class="form-label">
                                <i class="bi bi-person-fill" style="color: #004b93;"></i> Nombre del Contacto
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="contacto_empresaOCC" name="contacto_empresaOCC">
                        </div>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="email_empresaOCC" class="form-label">
                                <i class="bi bi-person-fill" style="color: #004b93;"></i> Correo Electrónico
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="email_empresaOCC" name="email_empresaOCC">
                        </div>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="telefono_empresaOCC" class="form-label">
                                <i class="bi bi-telephone-fill" style="color: #004b93;"></i> Teléfono de Casa
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="telefono_empresaOCC" name="telefono_empresaOCC" maxlength="10" minlength="10">
                        </div>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="celular_empresaOCC" class="form-label">
                                <i class="bi bi-phone-fill" style="color: #004b93;"></i> Teléfono Celular
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="celular_empresaOCC" name="celular_empresaOCC" maxlength="10" minlength="10">
                        </div>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="razon_empresaOCC" class="form-label">
                                <i class="bi bi-file-earmark-fill" style="color: #004b93;"></i> Razón Social
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="razon_empresaOCC" name="razon_empresaOCC">
                            <label for="razon_empresaOCC">Evita usar caracteres especiales.</label>
                        </div>
                    </div>
                    <div class="mb-2 col-12">
                        <div class="mb-3">
                            <label for="rfc_empresaOCC" class="form-label">
                                <i class="bi bi-file-earmark-fill" style="color: #004b93;"></i> RFC
                            </label>
                            <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
                                id="rfc_empresaOCC" name="rfc_empresaOCC" maxlength="13">
                            <label for="rfc_empresaOCC">Evita usar caracteres especiales.</label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <label for="comentarios_empresaOCC" class="form-label">
                            <i class="bi bi-pencil-square" style="color: #004b93;"></i> Comentarios
                        </label>
                        <textarea class="form-control" id="comentarios_empresaOCC" name="comentarios_empresaOCC" rows="4"></textarea>
                        <label for="comentarios_empresaOCC">Evita usar caracteres especiales.</label>
                    </div>
                    <div class="mb-2 row col-12">
                        <div class="col-12 col-md-2 d-flex">
                            <input disabled type="text" class="text-center" id="number7" name="number7">
                            <div class="d-flex" style="width: 20% !important; align-items: center;">&nbsp;+</div>
                            <input disabled type="text" class="text-center" id="number8" name="number8">
                        </div>
                        <div class="col-12 col-md-5">
                            <input type="text" class="form-control" id="operacion_empresaOCC"
                                name="operacion_empresaOCC" placeholder="Introduce el resultado aquí"
                                maxlength="2">
                        </div>
                    </div>
                    <input id="type_empresaOCC" name="type_empresaOCC" type="hidden">
                    <div class="mb-3 col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="aceptar_empresasocc"
                                name="aceptar_empresasocc" checked>
                            <label class="form-check-label ms-4 mt-3" for="aceptar_empresasocc">
                                Estoy de acuerdo en ser contactado por UNIMEX® y acepto el <a
                                    href="javascript:void(0);"
                                    onclick="window.open('{{ route('aviso_de_privacidad') }}','Privacidad','scrollbars=yes,width=1000,height=700')">
                                    aviso de privacidad.
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4 col-4">
                        <button id="enviarDatosEmpresasOCC" type="submit" class="btn btn-primary">ENVIAR
                            DATOS</button>
                        <!--  data-bs-dismiss="modal" -->
                    </div>
                    <div class="mb-4 col-4">
                        <button onclick="resetForms(4)" type="button" class="btn btn-outline-danger">BORRAR
                            DATOS</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
