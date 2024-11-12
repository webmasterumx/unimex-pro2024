<!-- Incio descarga de folleto -->
<section class="py-2 bg-articule">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 py-3">
                <img src="{{ asset('assets/img/folletos/img_brochure.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-md-6 py-3">
                <h1 class="fs-3" style="color: #004b93">
                    Descarga el folleto
                </h1>
                <p>
                    Conoce más de esta licenciatura, déjanos tus datos y descarga el folleto en formato pdf.
                </p>
                <form id="form_folleto">
                    @csrf
                    <select class="form-select mb-3" id="peridoSelectFolleto" name="peridoSelectFolleto">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <select class="form-select mb-3" id="plantelSelectFolleto" name="plantelSelectFolleto">
                        <option value="" selected>Selecciona el plantel</option>
                    </select>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nombreFolleto" name="nombreFolleto"
                            placeholder="Nombre *">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="correoFolleto" name="correoFolleto"
                            placeholder="Email *">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="celularFolleto" name="celularFolleto"
                            minlength="10" maxlength="10" placeholder="Celular *">
                    </div>
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value=""
                            id="aceptarAvisoPrivacidadFolleto" style="width: 20px !important; height: 20px !important;"
                            checked>
                        <label class="form-check-label" for="aceptarAvisoPrivacidadFolleto">
                            He leído y acepto el <a href="javascript:void(0);"
                                onclick="window.open('{{ route('aviso_de_privacidad') }}','Privacidad','scrollbars=yes,width=1000,height=700')">
                                aviso de privacidad.
                            </a>
                        </label>
                    </div>
                    @if ($origen)
                        @php
                            $origen = $origen;
                        @endphp
                    @else
                        @php
                            $origen = null;
                        @endphp
                    @endif
                    @if ($abreviatura)
                        @php
                            $abreviatura = $abreviatura;
                        @endphp
                    @else
                        @php
                            $abreviatura = null;
                        @endphp
                    @endif
                    <input type="hidden" name="origen" id="origen" value="{{ $origen }}">
                    <input type="hidden" name="abreviatura" id="abreviatura" value="{{ $abreviatura }}">
                    <input type="hidden" name="utm_source" id="utm_source" value="{{ $dataUTM['utm_source'] }}">
                    <input type="hidden" name="utm_medium" id="utm_medium" value="{{ $dataUTM['utm_medium'] }}">
                    <input type="hidden" name="utm_campaign" id="utm_campaign" value="{{ $dataUTM['utm_campaign'] }}">
                    <input type="hidden" name="utm_term" id="utm_term" value="{{ $dataUTM['utm_term'] }}">
                    <input type="hidden" name="utm_content" id="utm_content" value="{{ $dataUTM['utm_content'] }}">
                    <button id="descargaFolleto" type="submit" class="btn btn-primary">¡DESCARGAR!</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Fin descarga de folleto -->
