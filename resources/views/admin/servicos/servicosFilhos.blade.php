@foreach($servicosFilho as $sf)

    <a class="dropdown-item"
        data-value="{{$sf->id}}"
        data-level="{{$sf->nivel}}"
    @if ($tipoOperacao == 'i')
        data-default-selected="@if(old('idPai')==$sf->id) {{$sf->id}} @endif"
    @else
        data-default-selected="@if(old('idPai')==$sf->id) {{$sf->id}} @endif"
    @endif
        href="#"> {{$sf->nome}} </a>

    @if(property_exists($sf, 'children'))
        @include('admin.servicos.servicosFilhos',['servicosFilho' => $sf->children, 'tipoOperacao' => 'i'])
    @endif
@endforeach
