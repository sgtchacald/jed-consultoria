@foreach($servicosFilho as $sf)
    {{$sf->nome}}

    @if(isset($sf->children))
        @include('admin.servicos.servicosFilhosLista',['servicosFilho' => $sf->children])
    @endif
@endforeach
