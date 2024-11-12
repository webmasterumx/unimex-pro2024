@switch($plantel->id)
    @case(1)
        @section('titulo')
            Plantel Izcalli | UNIMEX
        @endsection
        @include('metas.planteles.izcalli')
    @break

    @case(2)
        @section('titulo')
            Plantel Satélite | UNIMEX
        @endsection
        @include('metas.planteles.satelite')
    @break

    @case(3)
        @section('titulo')
            Plantel Polanco | UNIMEX
        @endsection
        @include('metas.planteles.polanco')
    @break

    @case(4)
        @section('titulo')
            Plantel Veracruz | UNIMEX
        @endsection
        @include('metas.planteles.polanco')
    @break

    @default
@endswitch
