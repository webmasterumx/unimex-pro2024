@switch($licenciatura_sua->id)
    @case(1)
        @include('metas.licenciaturasSua.1')
    @break

    @case(2)
        @include('metas.licenciaturasSua.2')
    @break

    @case(3)
        @include('metas.licenciaturasSua.3')
    @break

    @default
@endswitch
