@foreach($servicosFilho as $sf)
    <a class="dropdown-item"
        data-value="{{$sf->id}}"
        data-level="{{$sf->nivel}}"
        data-default-selected="@if(old('idPai')==$sf->id) {{$sf->id}} @endif"
        href="#"> {{$sf->nome}} </a>

    @if(isset($sf->children))
        @include('admin.servicos.servicosFilhos',['servicosFilho' => $sf->children])
    @endif
@endforeach
