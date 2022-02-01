
<!-- Área de cópia -->
<div id="area_de_copia_modal_{{$idPai}}">
<div class="modal fade" id="modal_{{$idPai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{$nomePai}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{$nomePai}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>

{{--@foreach($servicosFilho as $sf)
    {{$sf->nome}}

    @if(isset($sf->children))
        @include('site.listaHierarquica',['servicosFilho' => $sf->children])
    @endif
@endforeach
--}}

@section('js')
    <script>
        $(document).ready(function(){
            moverModal();
            adicionarAtributosAoBotao();
        });

        function moverModal() {
            origem = document.getElementById("area_de_copia_modal_{{$idPai}}");
            destino = document.getElementById("modais");

            filhos = Array.prototype.slice.call(origem.children);
            filhos.forEach(function(element, index) {
                destino.appendChild(element);
            });
        }

        function adicionarAtributosAoBotao(){
            $("#botao_modal_{{$servico->id}}").attr("data-toggle", "modal");
            $("#botao_modal_{{$servico->id}}").attr("data-target", "#modal_{{$idPai}}");
        }
	</script>
@stop
