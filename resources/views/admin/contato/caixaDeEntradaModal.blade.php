<div class="modal fade excluir" tabindex="-1" role="dialog" aria-labelledby="titulo-modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo-modal">
                </h5>

                @if($indStatus == "I")
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                @endif
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <div id="msgModal"></div>
                </div>
            </div>
            @if($indStatus == "A")
                <div class="modal-footer">
                    <button id="marcarComoLida" type="button" class="btn btn-primary" data-dismiss="modal" onclick="submeterFormulario();">Marcar Como Lida</button>
                </div>
            @endif
        </div>
    </div>
</div>
