<!-- Modal -->
<div class="modal fade" id="statictConfirmPreinscripcion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="statictConfirmPreinscripcionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="bi bi-x-circle text-danger" style="font-size: 4rem;"></i>
                <p class="fs-2 mt-4">Aviso!</p>
                <p>
                    La dirección de correo electrónico <br>
                    <b> {{ session('email') }} </b> ya fue registrada <br>
                    <b>¿Deseas que nos contactemos contigo?</b>
                </p>
                <!--
                    data-bs-dismiss="modal"
                    data-bs-dismiss="modal"
                -->
                <button id="aceptarActividad" onclick="aceptoAgendar()" type="button" class="btn btn-success w-25 mt-4">Sí</button>
                <button id="rechazarActividad" onclick="rechazoAgendar()" type="button" class="btn btn-danger w-25 mt-4">No</button>
            </div>
        </div>
    </div>
</div>
