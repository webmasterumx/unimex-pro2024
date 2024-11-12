<form id="form_quejaSugerencia" class="row">
    @csrf
    <div class="col-12">
        <h4 class="fw-normal">Quejas, Sugerencias y Felicitaciones</h4>
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="nombre_qys" class="form-label">
            <i class="bi bi-person-fill" style="color: #004b93;"></i> Nombre Completo
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="nombre_qys"
            name="nombre_qys">
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="mail_qys" class="form-label">
            <i class="bi bi-envelope-fill" style="color: #004b93;"></i> Correo Electrónico
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="mail_qys"
            name="mail_qys">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="telefono_casa_qys" class="form-label">
            <i class="bi bi-telephone-fill" style="color: #004b93;"></i> Teléfono de Casa
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
            id="telefono_casa_qys" name="telefono_casa_qys" maxlength="10" minlength="10">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="telefono_movil_qys" class="form-label">
            <i class="bi bi-phone-fill" style="color: #004b93;"></i> Teléfono celular
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
            id="telefono_movil_qys" name="telefono_movil_qys" maxlength="10" minlength="10">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="matricula_qys" class="form-label">
            <i class="bi bi-credit-card-fill" style="color: #004b93;"></i> Matrícula
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="matricula_qys"
            name="matricula_qys" minlength="11" maxlength="11">
        <label for="matricula_qys">Ingresa el formato correcto de tu matrícula. ej:(12345678-90)</label>
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="asunto_qys" class="form-label">
            <i class="bi bi-bookmark-check-fill" style="color: #004b93;"></i> Asunto
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="asunto_qys"
            name="asunto_qys">
        <label for="asunto_qys">Evita usar caracteres especiales.</label>
    </div>
    <div class="mb-3 col-12">
        <label for="mensaje_qys" class="form-label">
            <i class="bi bi-pencil-square" style="color: #004b93;"></i> Mensaje
        </label>
        <textarea class="form-control" id="mensaje_qys" name="mensaje_qys" rows="4"></textarea>
        <label for="mensaje_qys">Evita usar caracteres especiales.</label>
    </div>
    <div class="mb-3 col-12">
        <div class="mb-2 row">
            <div class="col-12 col-md-2 d-flex">
                <input disabled type="text" class="text-center" id="number5" name="number5">
                <div class="d-flex" style="width: 20% !important; align-items: center;">&nbsp;+</div>
                <input disabled type="text" class="text-center" id="number6" name="number6">
            </div>
            <div class="col-12 col-md-4">
                <input type="text" class="form-control" id="operacion_qys" name="operacion_qys"
                    placeholder="Introduce el resultado aquí" maxlength="2">
            </div>
        </div>
    </div>
    <div class="mb-5 col-12 form-check">
        <input class="form-check-input" type="checkbox" id="aceptar_qys" name="aceptar_qys" checked>
        <label class="form-check-label ms-4 mt-2" for="aceptar_qys">
            Estoy de acuerdo en ser contactado por UNIMEX® y acepto el <a href="javascript:void(0);"
                onclick="window.open('{{ route('aviso_de_privacidad') }}','Privacidad','scrollbars=yes,width=1000,height=700')">
                aviso de privacidad.
            </a>
        </label>
    </div>
    <div class="mb-4 col-12 col-md-4">
        <button id="enviarDatosAceptar" type="submit" class="btn btn-primary">ENVIAR DATOS</button>
    </div>
    <div class="mb-4 col-12 col-md-4">
        <button onclick=" resetForms(3);" type="button" class="btn btn-outline-danger">BORRAR DATOS</button>
    </div>
</form>
