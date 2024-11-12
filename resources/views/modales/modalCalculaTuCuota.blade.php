@if (isset($dataUTM))
    @if (
        $dataUTM['utm_medium'] == 'organico' ||
            $dataUTM['utm_medium'] == 'ORGANICO' ||
            $dataUTM['utm_medium'] == 'Organico' ||
            $dataUTM['utm_medium'] == null)
        @php
            $utmOrganico = 1;
            $complemento =
                '?utm_source=Website+Metro&utm_medium=Organico&utm_campaign=Home+body&utm_term=Calculadora&utm_content=Modal+Body+Calculadora';

        @endphp
    @else
        @php
            $utmOrganico = 0;
            $complemento =
                '?utm_source=' .
                $dataUTM['utm_source'] .
                '&utm_medium=' .
                $dataUTM['utm_medium'] .
                '&utm_campaign=' .
                $dataUTM['utm_campaign'] .
                '&utm_term=' .
                $dataUTM['utm_term'] .
                '&utm_content=' .
                $dataUTM['utm_content'];
        @endphp
    @endif
@else
    @php
        $dataUTM['utm_source'] = session('utm_source');
        $dataUTM['utm_medium'] = session('utm_medium');
        $dataUTM['utm_campaign'] = session('utm_campaign');
        $dataUTM['utm_term'] = session('utm_term');
        $dataUTM['utm_content'] = session('utm_content');

        if (
            $dataUTM['utm_medium'] == 'organico' ||
            $dataUTM['utm_medium'] == 'ORGANICO' ||
            $dataUTM['utm_medium'] == 'Organico' ||
            $dataUTM['utm_medium'] == null
        ) {
            $utmOrganico = 1;
            $complemento =
                '?utm_source=Website+Metro&utm_medium=Organico&utm_campaign=Home+body&utm_term=Calculadora&utm_content=Modal+Body+Calculadora';
        } else {
            $utmOrganico = 0;
            $complemento =
                '?utm_source=' .
                $dataUTM['utm_source'] .
                '&utm_medium=' .
                $dataUTM['utm_medium'] .
                '&utm_campaign=' .
                $dataUTM['utm_campaign'] .
                '&utm_term=' .
                $dataUTM['utm_term'] .
                '&utm_content=' .
                $dataUTM['utm_content'];
        }

    @endphp
@endif
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-lg modal-xl">
        <div class="modal-content bg-transparent border-0"> <!--  -->
            <div class="modal-header border-0" style="justify-content: flex-end !important">
                {{--  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> --}}
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <button id="closeModalCalculadora" type="button" style="color: #de951b;" class="fs-1"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                        <a href="{{ env('APP_URL') }}calcula-tu-cuota{{$complemento}}"
                            target="_blank">
                            <img class="img-fluid" src="{{ asset('assets/img/popup/pop_up_unimex_texto.png') }}"
                                alt="">
                        </a>
                    </div>
                </div>

            </div>
            {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>
