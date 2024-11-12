@switch($posgrado->id)
    @case(1)
        @include('metas.posgrados.1')
    @break

    @case(2)
        @include('metas.posgrados.2')
    @break

    @case(3)
        @include('metas.posgrados.3')
    @break

    @case(4)
        @include('metas.posgrados.4')
    @break

    @case(5)
        @include('metas.posgrados.5')
    @break

    @case(6)
        @include('metas.posgrados.6')
    @break

    @case(7)
        @include('metas.posgrados.7')
    @break

    @case(8)
        @include('metas.posgrados.8')
    @break

    @case(9)
        @include('metas.posgrados.9')
    @break

    @default
@endswitch
