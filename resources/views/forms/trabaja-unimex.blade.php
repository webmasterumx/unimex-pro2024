<form id="form_trabaja" class="row" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <h4 class="fw-normal">Bolsa de trabajo para Administrativos y Docentes</h4>
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="nombre_trabajo" class="form-label">
            <i class="bi bi-person-fill" style="color: #004b93;"></i> Nombre Completo
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="nombre_trabajo"
            name="nombre_trabajo">
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="email_trabaja" class="form-label">
            <i class="bi-envelope-fill" style="color: #004b93;"></i> Correo Electrónico
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="email_trabaja"
            name="email_trabaja">
    </div>
    <div class="mb-3 col-12 col-md-3">
        <label for="telefono_casa_trabaja" class="form-label">
            <i class="bi bi-telephone-fill" style="color: #004b93;"></i> Teléfono de Casa
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
            id="telefono_casa_trabaja" name="telefono_casa_trabaja" minlength="8" maxlength="10">
    </div>
    <div class="mb-3 col-12 col-md-3">
        <label for="telefono_movil_trabaja" class="form-label">
            <i class="bi bi-phone-fill" style="color: #004b93;"></i> Teléfono celular
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm"
            id="telefono_movil_trabaja" name="telefono_movil_trabaja" minlength="8" maxlength="10">
    </div>
    <div class="mb-3 co-12 col-md-3">
        <label for="select_plantel">
            <i class="bi bi-bank" style="color: #004b93;"></i> Plantel de interes:
        </label>
        <select class="form-select" style="height: 32px !important;" id="plantel_trabaja" name="plantel_trabaja">
            <option value="" selected>Selecciona Plantel</option>
            <option value="RECTORIA">RECTORÍA</option>
            <option value="IZCALLI">IZCALLI</option>
            <option value="SATÉLITE">SATÉLITE</option>
            <option value="POLANCO">POLANCO</option>
            <option value="VERACRUZ">VERACRUZ</option>
        </select>
    </div>
    <div class="mb-3 col-12 col-md-3">
        <label for="select_plantel">
            <i class="bi bi-book-fill" style="color: #004b93;"></i>Último Nivel de Estudios
        </label>
        <select class="form-select" style="height: 32px !important;" id="nivel_est_trabaja" name="nivel_est_trabaja">
            <option value="" selected>Selecciona Nivel</option>
            <option value="Secundaria">SECUNDARIA</option>
            <option value="Preparatoria">PREPARATORIA</option>
            <option value="Licenciatura Titulado">LICENCIATURA TITULADO</option>
            <option value="Licenciatura Pasante">LICENCIATURA PASANTE</option>
            <option value="Posgrado">POSGRADO</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Conoce nuestras vacantes: <a target="_blank"
                href="https://www.occ.com.mx/empleos-en-mexico-y-el-mundo/para-trabajar-en-Universidad-Mexicana">Aqui</a></label>
    </div>
    <div class="mb-3 col-12">
        <div class="mb-3">
            <label for="cv_trabaja" class="form-label">Adjunta tu CV:</label>
            <input class="form-control" type="file" id="cv_trabaja" name="cv_trabaja" accept=".pdf,.doc,.docx,application">
            *Se aceptan archivos Word y PDF
        </div>
    </div>
    <div class="mb-3">
        <label for="puesto_interes" class="form-label">
            <i class="bi bi-person-workspace" style="color: #004b93;"></i> ¿Qué puesto te interesa?
        </label>
        <input style="height: 32px !important;" type="text" class="form-control form-control-sm" id="puesto_interes"
            name="puesto_interes">
        <label for="puesto_interes">Evita usar caracteres especiales.</label>
    </div>
    <div class="mb-3 col-12">
        <div class="mb-3">
            <label for="experiencia_trabaja" class="form-label">
                <i class="bi bi-pencil-square" style="color: #004b93;"></i> Describe tu experiencia
                laboral(Experiencia)
            </label>
            <textarea class="form-control" id="experiencia_trabaja" name="experiencia_trabaja" rows="4"></textarea>
            <label for="experiencia_trabaja">Evita usar caracteres especiales.</label>
        </div>
    </div>
    <div class="mb-3 col-12">
        <div class="mb-2 row">
            <div class="col-12 col-md-2 d-flex">
                <input disabled type="text" class="text-center" id="number3" name="number3">
                <div class="d-flex" style="width: 20% !important; align-items: center;">&nbsp;+</div>
                <input disabled type="text" class="text-center" id="number4" name="number4">
            </div>
            <div class="col-12 col-md-4">
                <input type="text" class="form-control" id="operacion_trabaja" name="operacion_trabaja"
                    placeholder="Introduce el resultado aquí" maxlength="2">
            </div>
        </div>
    </div>
    <div class="mb-3 col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="aceptar_trabajar" name="aceptar_trabajar" checked>
            <label class="form-check-label ms-4 mt-2" for="aceptar_trabajar">
                Estoy de acuerdo en ser contactado por UNIMEX® y acepto el <a href="javascript:void(0);"
                    onclick="window.open('{{ route('aviso_de_privacidad') }}','Privacidad','scrollbars=yes,width=1000,height=700')">
                    aviso de privacidad.
                </a>
            </label>
        </div>
    </div>
    <div class="mb-4 col-12 col-md-4 mt-3">
        <button id="enviarDatosTrabaja" type="submit" class="btn btn-primary">ENVIAR DATOS</button>
    </div>
    <div class="mb-4 col-12 col-md-4 mt-3">
        <button onclick="resetForms(2);" type="button" class="btn btn-outline-danger">BORRAR DATOS</button>
    </div>
</form>
