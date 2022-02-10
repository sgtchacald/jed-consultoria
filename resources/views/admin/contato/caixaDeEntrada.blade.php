@extends('adminlte::page')

@section('title', Config::get('label.contato_selecionar'))


@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Administração</a></li>
                    <li class="breadcrumb-item active">{{ Config::get('label.contato_selecionar') }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')

    @include('utils.erro')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ Config::get('label.contato_caixa_entrada') }}</h3>
        </div>

        <div class="card-footer">
            @if ($indStatus == 'A')
                <a href="{{ route('contato.caixaDeEntrada', 'I') }}" class="btn btn-danger"><i
                        class="far fa-file"></i>&nbsp;&nbsp; {{ Config::get('label.contato_abrir_msgs_lidas') }}</a>
            @else
                <a href="{{ route('contato.caixaDeEntrada', 'A') }}" class="btn btn-primary"><i
                        class="far fa-file"></i>&nbsp;&nbsp; {{ Config::get('label.contato_abrir_msgs_n_lidas') }}</a>
            @endif
        </div>

        <div class="card-body">
            <table id="selecionarReservista" class="dataTableInit table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="colunaAcao" align="center">&nbsp;</th>
                        <th class="">{{ Config::get('label.contato_caixa_entrada_de') }}</th>
                        <th class="">{{ Config::get('label.email') }}</th>
                        <th class="">{{ Config::get('label.contato_assunto') }}</th>
                        <th class="">{{ Config::get('label.contato_caixa_entrada_data_envio') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contatos as $contato)
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <a href='#' title='Visualizar Mensagem' style='margin-right: 10%'
                                            onclick='exibeModal("{{ $contato->id }}", "{{ $contato->mensagem }}", "{{ $indStatus }}" );'>
                                            <i class="fas @if ($indStatus == 'A') {{ 'fa-envelope' }}" @else {{ 'fa-envelope-open' }}" style="color: red;" @endif></i>
                                    </a>

                                    <form id="formMarcarComoLida" method="POST"  action="{{ route('contato.marcarcomolida', $contato->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button id="enviarFormulario" class="ocultar" type="submit">enviar</button>
                                    </form>
                                    </tr>
                                </table>
                            </td>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>
                                @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosHierarquicamente() as $servico)
                                    @if ($servico->idpai == '')
                                        @if ($contato->assunto == $servico->id)
                                            {{ $servico->nome }}
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ Carbon::parse($contato->dtcadastro)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer"></div>
    </div>

    <div id="modais"></div>
@stop

@section('js')
    <script>

        function exibeModal(id, mensagem, indStatus) {

            //Exclui a modal anterior
            $(".excluir").remove();

            if ((id != "" && mensagem != "" && indStatus != "") && (id != undefined && indStatus != undefined && indStatus != undefined)) {

                /* Gera o conteúdo da modal estática em html oriundos da rota abaixo */
                var idModal = "modal_mensagem";
                var rotaServicosOld = "{{ route('site.contato.caixadeentrada.modal', ['substituir']) }}";
                var rotaModal = rotaServicosOld.replace("substituir", indStatus);

                $.ajax({
                    url: rotaModal,
                    type: 'get',
                    dataType: 'html',
                    success: function(data) {
                        $("#modais").append(data);
                    }
                });


                setTimeout(function(){
                    $("#titulo-modal").append('{{ Config::get("label.contato_mensagem") }}');
                    $("#msgModal").append(mensagem);
                    $(".modal").modal("show");
                }, 200);
            }
        }

        function submeterFormulario(){
            $("#formMarcarComoLida").submit();
        }
    </script>
@stop
