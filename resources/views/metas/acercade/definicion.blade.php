@switch($acercadeFirst->id)
    @case(1)
        @section('titulo') Historia de Universidad Mexicana | UNIMEX @endsection
        @include('metas.acercade.historia')
    @break

    @case(2)
        @section('titulo') Mensaje del Rector | UNIMEX @endsection
        @include('metas.acercade.mensaje')
    @break

    @case(3)
        @section('titulo') Servicios en los Planteles | UNIMEX @endsection
        @include('metas.acercade.servicios')
    @break

    @case(4)
        @section('titulo') Valores Institucionales | UNIMEX @endsection
        @include('metas.acercade.valores')
    @break

@endswitch
