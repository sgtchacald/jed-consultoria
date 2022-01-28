@extends('adminlte::page')
@section('title', Config::get('label.servicos_editar'))

@section('content_header')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Administração</a></li>
				<li class="breadcrumb-item active">{{Config::get('label.servicos_editar')}}</li>
			</ol>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{Config::get('label.servicos_editar')}}</h3>
	</div>

	<form name="formEditar" id="formEditar" method="post" action="{{route('servicos.update')}}">
    	<div class="card-body">
				@csrf
				@method('PUT')
				@include('utils.erro')

				<div class="row">
					<div class="col-sm-1">
						<div class="form-group required">
							<label>{{Config::get('label.id')}}:</label>
							<input 	type="text"
									name="id"
									id="id"
									class="form-control @error('id') is-invalid @enderror "
									placeholder="{{Config::get('label.id_placeholder')}}"
									maxlength="100"
									value="{{old('id', $servico[0]->id)}}" readonly>

                                    <input id="alteraImagem" name="alteraImagem" type="hidden" value="S">
						</div>
					</div>

					<div class="col-sm-11"></div>
				</div>


                <div class="row">
					<div class="col-sm-6">
						<div class="form-group required">
							<label>{{Config::get('label.nome')}}:</label>
							<input 	type="text"
									name="nome"
									id="nome"
									class="form-control @error('nome') is-invalid @enderror"
									placeholder="{{Config::get('label.nome_placeholder')}}"
									maxlength="80"
									value="{{old('nome', $servico[0]->nome)}}">
						</div>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label id="msgErroNome" class="error" for="nome"></label>
					</div>
                </div>

                <div class="row">
					<div class="col-sm-6">
						<div class="form-group required">
							<label>{{Config::get('label.descricao')}}:</label>
							<input 	type="text"
									name="descricao"
									id="descricao"
									class="form-control @error('descricao') is-invalid @enderror"
									placeholder="{{Config::get('label.descricao_placeholder')}}"
									maxlength="120"
									value="{{old('descricao', $servico[0]->descricao)}}">
						</div>
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>{{Config::get('label.url')}}:</label>

                        <div class="input-group mb-3 urlImagem">
                            <div class="custom-file">
                              <input id="inputImgItens"
                                     name="urlImagem"
                                     type="file"
                                     class=""
                                     aria-describedby="inputImgItens"
                                     value="{{old('urlimagem', $servico[0]->urlimagem)}}">

                              <i style="color:red; padding: 5px 0px 0px 15px;"
                              class="fas fa-times-circle removeImagemClass"
                              data-toggle="tooltip"
                              data-placement="right"
                              title="Remover Imagem"
                              onclick="removerImagem($('#inputImgItens'))"></i>

                            </div>
                        </div>

                        <label  id="urlImagemError" class="error urlImagem" for="urlImagem"></label>
					</div>
                </div>

                <div class="row preview">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img id="preview" src="" align="left">
                            <i id="removeImagem"
                               style="color:red; padding: 0px 0px 0px 5px;"
                               class="fas fa-times-circle"
                               data-toggle="tooltip"
                               data-placement="right"
                               title="Remover Imagem"
                               onclick="removerImagem($('#inputImgItens'))"></i>
						</div>
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>{{Config::get('label.servicos_pai')}}:</label>
                            <select name="idPai" id="idPai" class="form-control @error('idPai') is-invalid @enderror">
                                <option value="">Nenhum</option>
                                @foreach ($servicos as $sv)
                                    <option @if(old('idpai', isset($servico[0]) ? $servico[0]->idpai : '') == $sv->id) {{'selected="selected"'}} @endif value="{{$sv->id}}">
                                        {{$sv->nome}}
                                    </option>
                                @endforeach
                            </select>

                            @error('idPai')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
					<div class="col-sm-2">
						<div class="form-group required">
							<label>{{Config::get('label.status')}}:</label>
							<select name="indStatus" id="indStatus" class="form-control @error('indStatus') is-invalid @enderror readyOnly" readonly>
								<option value="">Selecione</option>
								@foreach ((\App\Dominios\IndStatus::getDominio()) as $key => $value)
									<option @if(old('indStatus', $servico[0]->indstatus)==$key) {{'selected="selected"'}} @endif value="{{$key}}">
										{{$value}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<br><br><br><br><br>
				</div>

        	<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Salvar</button>
			  <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
	</form>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            //Validação do form caso status do registro seja INATIVO
			if('{{$servico[0]->indstatus}}' == 'I'){
				$("input").attr("disabled", true);
				$("button").attr("disabled", true);
			}

            $('.preview').hide();
            $('.removeImagemClass').hide();
            validarFormulario();

            getImagem();
        });



        $("#nome").blur(function(){
            var nome = $("#nome").val();
            var id = "{{$servico[0]->id}}";

            if(nome != "" && nome != undefined){
                var rotaOld = "{{ route('servicos.valida.existe.nome', ['sbNome','sbId']) }}";
                var rota = rotaOld.replace("sbNome", nome).replace("sbId", id);
                var msgErro = 'Já existe este nome no sistema.';

                console.log(rota);

                $.ajax({
                    type: 'get', //THIS NEEDS TO BE GET
                    url: rota,
                    dataType: 'json',
                    success: function(response) {

                        if(response == true){
                            $('#msgErroNome').append(msgErro);
                            $('#msgErroNome').show();
                        }else{
                            $('#msgErroNome').hide();
                        }
                    },error:function(){
                        console.log(response);
                    }
                });
            }

        });

        function validarFormulario(){
            var rota = "{{route('modulo.insert')}}";

            $('#formCadastrar').validate({
                rules: {
                    nome: {required: true},
                    descricao: {required: true},
                },
                messages: {
                    nome: { required: 'Nome é obrigatório' },
                    descricao: { required: 'Descrição é obrigatório' },
                },
                submitHandler: function(form){
                    form.submit();
			    }
		    });

        }

        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();

                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };

                file.readAsDataURL(this.files[0]);
            }
        }

        function removerImagem(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
            $('.preview').hide();
            $('#urlImagemError').hide();
            $('.removeImagemClass').hide();
            $('#salvar').prop("disabled",false);
            $('.urlImagem').show();
        }

        $( "#inputImgItens" ).change(function() {
            $('#preview').css("width","200px");
            $('#preview').css("height","200px");
            $('#preview').css("border-style","groove");
            $('#preview').css("margin-bottom","10px");

            var extPermitidas = ['jpg','png','jpeg','gif'];
            var extArquivo = document.getElementById("inputImgItens").value.split('.').pop();

            if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
                $('.preview').hide();
                $('#urlImagemError').html("Esta extensão não é permitida para esta funcionalidade. Extensões Permitidas: [ jpg | jpeg | gif | png ].");
                $('#urlImagemError').show();
                $('#salvar').prop("disabled",true);
                $('.removeImagemClass').show();
            } else {
                $('#salvar').prop("disabled",false);
                $('.preview').show();
                $('#urlImagemError').hide();
                $('.removeImagemClass').hide();
                $('#alteraImagem').val("S")
            }
        });

        document.getElementById("inputImgItens").addEventListener("change", readImage, false);

        function getImagem(){
            var urlImagem = '{{$servico[0]->urlimagem}}';
            var rotaOld = "{{ route('servicos.getImagem', ['sbStrImagem']) }}";
            var rota = rotaOld.replace("sbStrImagem", urlImagem);

            if(urlImagem != ''){
                document.getElementById("preview").src = rota;

                $('#preview').css("width","200px");
                $('#preview').css("height","200px");
                $('#preview').css("border-style","groove");
                $('#preview').css("margin-bottom","10px");
                $('.preview').show();
                $('.urlImagem').hide();
            }
        }
	</script>
@stop
