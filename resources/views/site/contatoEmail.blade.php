<h2>PAGINA DE CONTATO DO SITE</h2>

<b>Você recebeu uma mensagem de:</b>  {{ $nome }} <br><br>

<b>E-Mail:   </b> {{ $email }}<br>
<b>Telefone: </b> {{ $telefone }}<br>
@foreach (\App\Http\Controllers\Admin\ServicosController::getServicosHierarquicamente() as $servico)
    @if ($servico->idpai == '')
        @if ($assunto == $servico->id)
<b> Assunto: </b> {{ $servico->nome }}
        @endif
    @endif
@endforeach

<br><br>

<b> Mensagem: </b>  {!! $mensagem !!}
