@extends('adminlte::page')
@section('title', Config::get('label.usuarios_editar'))

@section('content_header')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Administração</a></li>
				<li class="breadcrumb-item active">{{Config::get('label.usuarios_editar')}}</li>
			</ol>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{Config::get('label.usuarios_editar')}}</h3>
	</div>

	<form name="formEditar" id="formEditar" method="post" action="{{route('usuarios.update')}}" autocomplete="off" enctype="multipart/form-data">
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
									value="{{old('id', $usuario[0]->id)}}" readonly>

                                    <input id="alteraImagem" name="alteraImagem" type="hidden" value="false">
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
									maxlength="255"
									value="{{old('nome', $usuario[0]->name)}}">
						</div>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label id="msgErroNome" class="error" for="nome">Já existe este nome no sistema.</label>
					</div>
                </div>

                <div class="row">
					<div class="col-sm-6">
						<div class="form-group required">
							<label>{{Config::get('label.usuarios_email')}}:</label>
							<input 	type="text"
									name="email"
									id="email"
									class="form-control @error('email') is-invalid @enderror"
									placeholder="{{Config::get('label.usuarios_email_placeholder')}}"
									maxlength="255"
									value="{{old('email', $usuario[0]->email)}}">
						</div>
					</div>
                </div>

                <div class="row">
					<div class="col-sm-6">
						<div class="form-group required">
							<label>{{Config::get('label.usuarios_cargo')}}:</label>
							<input 	type="text"
									name="cargo"
									id="cargo"
									class="form-control @error('cargo') is-invalid @enderror"
									placeholder="{{Config::get('label.usuarios_cargo_placeholder')}}"
									maxlength="80"
									value="{{old('descricaoCargo', $usuario[0]->cargo)}}">
						</div>
					</div>
                </div>

                <div class="row">
					<div class="col-sm-6">
						<div class="form-group required">
							<label>{{Config::get('label.usuarios_descricaoCargo')}}:</label>
							<input 	type="text"
									name="descricaoCargo"
									id="descricaoCargo"
									class="form-control @error('descricaoCargo') is-invalid @enderror"
									placeholder="{{Config::get('label.usuarios_descricaoCargo_placeholder')}}"
									maxlength="120"
									value="{{old('descricaoCargo', $usuario[0]->descricaocargo)}}">
						</div>
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <label>{{ Config::get('label.usuarios_redessociais') }}:</label>
                        <input type="url" name="urlLinkedin" id="urlLinkedin"
                                class="form-control @error('urlLinkedin') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_linkedin_placeholder') }}"
                                maxlength="512" value="{{ old('urlLinkedin', $usuario[0]->urllinkedin) }}">
                        <br>
                        <input type="url" name="urlTwitter" id="urlTwitter"
                                class="form-control @error('urlTwitter') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_twitter_placeholder') }}"
                                maxlength="512" value="{{ old('urlTwitter', $usuario[0]->urltwitter) }}">

                    </div>

                    <div class="col-sm-3">
                        <label style="color: #FFFFFF">:</label>
                        <input type="url" name="urlFacebook" id="urlFacebook"
                                class="form-control @error('urlFacebook') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_facebook_placeholder') }}"
                                maxlength="512" value="{{ old('urlFacebook', $usuario[0]->urlfacebook) }}">
                        <br>
                        <input type="url" name="urlInstagram" id="urlInstagram"
                                class="form-control @error('urlInstagram') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_instagram_placeholder') }}"
                                maxlength="512" value="{{ old('urlInstagram', $usuario[0]->urlinstagram) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>{{Config::get('label.imagem')}}:</label>

                        <div class="input-group mb-3 urlImagem">
                            <div class="custom-file">
                            <input  id="inputImgItens" name="urlImagem" type="file" class="" aria-describedby="inputImgItens">
                              <i style="color:red; padding: 5px 0px 0px 15px;"
                              class="fas fa-times-circle removeImagemClass"
                              data-toggle="tooltip"
                              data-placement="right"
                              title="Remover Imagem"
                              onclick="removerImagem($('#inputImgItens'))"></i>

                            </div>
                        </div>

                        <label class="error urlImagem urlImagemError" for="urlImagem"></label>
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
					<div class="col-sm-6">
						<div class="form-group required">
							<label>{{Config::get('label.usuarios_senha')}}:</label>
							<input 	type="password"
									name="senha"
									id="senha"
									class="form-control @error('senha') is-invalid @enderror"
									placeholder="{{Config::get('label.senha')}}"
									maxlength="10"
									value="{{old('senha')}}">
						</div>
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-check">
                            <br>
                            <input name="indColaborador" class="form-check-input" type="checkbox" value="S" id="indColaborador" @if(old('indColaborador', $usuario[0]->indcolaborador)=="S") {{'checked'}} @endif>
                            <label class="form-check-label negrito" for="indColaborador">
                               É um colaborador?
                            </label>
                            <br><br>
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
									<option @if(old('indStatus', $usuario[0]->indstatus)==$key) {{'selected="selected"'}} @endif value="{{$key}}">
										{{$value}}
									</option>
								@endforeach
							</select>
						</div>
					</div>
					<br><br><br><br><br>
				</div>

        	<div class="card-footer">
			  <button id="salvar" type="submit" class="btn btn-primary">Salvar</button>
			  <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
	</form>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            //Validação do form caso status do registro seja INATIVO
			if('{{$usuario[0]->indstatus}}' == 'I'){
				$("input").attr("disabled", true);
				$("button").attr("disabled", true);
			}

            $('.preview').hide();

            $('.removeImagemClass').hide();

            $('#msgErroNome').hide();

            validarFormulario();

            getImagem();
        });

        $("#nome").click(function() {
            $('#msgErroNome').hide();
        });

        $("#nome").blur(function(){
            var nome = $("#nome").val();
            var id = "{{$usuario[0]->id}}";

            if(nome != "" && nome != undefined){
                var rotaOld = "{{ route('usuarios.valida.existe.nome', ['sbNome','sbId']) }}";
                var rota = rotaOld.replace("sbNome", nome).replace("sbId", id);

                console.log(rota);

                $.ajax({
                    type: 'get', //THIS NEEDS TO BE GET
                    url: rota,
                    dataType: 'json',
                    success: function(response) {
                        if(response == true){
                            $('#msgErroNome').show();
                            $("button").attr("disabled", true);
                        }else{
                            $('#msgErroNome').hide();
                            $("button").attr("disabled", false);
                        }
                    },error:function(){
                        console.log(response);
                    }
                });
            }

        });

        function validarFormulario(){
            $('#formEditar').validate({
                rules: {
                    nome: {required: true},
                    email: {required: true, email:true},
                    cargo: {required: true},
                    descricaoCargo: {required: true},
                },
                messages: {
                    nome: { required: 'Nome é obrigatório' },
                    email: { required: 'Nome é obrigatório', email: 'Digite um e-mail válido.' },
                    cargo: { required: 'Cargo é obrigatório' },
                    descricaoCargo: { required: 'Descrição do Cargo é obrigatório' },
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
                    $('#removeImagem').show();
                };

                file.readAsDataURL(this.files[0]);
            }
        }

        function removerImagem(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
            $('.preview').hide();
            $('.removeImagemClass').hide();
            $('#salvar').prop("disabled",false);
            $('.urlImagem').show();
            $('#alteraImagem').val("true");
        }

        $('.removeImagemClass').click(function() {
            $('.urlImagemError').hide();
            $('#alteraImagem').val("true");
        });

        $('#inputImgItens').change(function() {
            $('#preview').css("width","200px");
            $('#preview').css("height","200px");
            $('#preview').css("border-style","groove");
            $('#preview').css("margin-bottom","10px");

            var extPermitidas = ['jpg','png','jpeg','gif'];
            var extArquivo = document.getElementById('inputImgItens').value.split('.').pop();
            var size = this.files[0].size/1024/1024;

            if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
                $('.preview').hide();
                $('.urlImagemError').html('Esta extensão não é permitida para esta funcionalidade. Extensões Permitidas: [ jpg | jpeg | gif | png ].');
                $('.urlImagemError').show();
                $('#salvar').prop("disabled",true);
                $('.removeImagemClass').show();
            } else if(size > 2){
                $('.preview').hide();
                $('.urlImagemError').html('A imagem não pode ter tamanho maior que 2 Mb.');
                $('.urlImagemError').show();
                $('#salvar').prop("disabled",true);
                $('.removeImagemClass').show();
            }else {
                $('#salvar').prop("disabled",false);
                $('.preview').show();
                $('.urlImagemError').hide();
                $('.removeImagemClass').hide();
                $('#alteraImagem').val("true");
            }
        });

        document.getElementById("inputImgItens").addEventListener("change", readImage, false);

        function getImagem(){
            var urlImagem = '{{$usuario[0]->urlimagem}}';
            var rotaOld = "{{ route('usuarios.getImagem', ['sbStrImagem']) }}";
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
