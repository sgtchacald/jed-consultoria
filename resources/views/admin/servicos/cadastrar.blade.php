@extends('adminlte::page')
@section('title', Config::get('label.servicos_cadastrar'))

@section('content_header')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Administração</a></li>
				<li class="breadcrumb-item active">{{Config::get('label.servicos_cadastrar')}}</li>
			</ol>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{Config::get('label.servicos_cadastrar')}}</h3>
	</div>

	<form id="formCadastrar" method="POST" action="{{route('servicos.insert')}}" autocomplete="off" enctype="multipart/form-data">
    	<div class="card-body">
    			@csrf
				@include('utils.erro')

				<div class="row ocultar">
					<div class="col-sm-1">
						<div class="form-group required">
							<label>{{Config::get('label.id')}}:</label>
							<input 	type="text"
									name="id"
									id="id"
									class="form-control @error('id') is-invalid @enderror"
									placeholder="{{Config::get('label.id_placeholder')}}"
									maxlength="100"
									value="{{old('id')}}">
						</div>
					</div>

					<div class="col-sm-10"></div>
				</div>

                <input id="alteraImagem" name="alteraImagem" type="hidden" value="true">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>{{Config::get('label.servicos_vinculo')}}:</label>

                            <div class="dropdown hierarchy-select" id="idPai">
                                <button type="button" style="text-align:left; background-color:white; border:1px solid #ced4da; color:#495057;" class="btn btn-primary dropdown-toggle" id="idPai-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="idPai-button">
                                    <div class="hs-searchbox">
                                        <input type="text" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="hs-menu-inner">
                                        <a class="dropdown-item" data-value="" data-level="1" data-default-selected="" href="#">Nenhum</a>
                                        @foreach ($hierarquia as $h)
                                           <a class="dropdown-item"
                                              data-value="{{$h->id}}"
                                              data-level="{{$h->nivel}}"
                                              data-default-selected="@if(old('idPai')==$h->id) {{$h->id}} @endif"
                                              href="#"> {{$h->nome}} </a>

                                            @if(property_exists($h, 'children'))
                                                @include('admin.servicos.servicosFilhos',['servicosFilho' => $h->children, 'tipoOperacao' => 'i'])
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <input class="d-none" name="idPai" readonly="readonly" aria-hidden="true" type="text"/>
                            </div>

                            @error('idPai')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
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
									value="{{old('nome')}}">
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
									maxlength="512"
									value="{{old('descricao')}}">
						</div>

                        @error('descricao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>{{Config::get('label.imagem')}}:</label>

                        <div class="input-group mb-3">
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

                        <label  id="urlImagemError" class="error" for="urlImagem"></label>
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
                    <div class="col-sm-2">
						<div class="form-group required">
							<label>{{Config::get('label.status')}}:</label>
							<select name="indStatus" id="indStatus" class="form-control @error('indStatus') is-invalid @enderror readyOnly" readonly>
								<option value="">Selecione</option>
								@foreach ((\App\Dominios\IndStatus::getDominio()) as $key => $value)
									<option @if(old('indStatus')==$key || $key == 'A') {{'selected="selected"'}} @endif value="{{$key}}">
										{{$value}}
									</option>
								@endforeach
							</select>

							@error('indStatus')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<br><br><br><br><br>
				</div>

        	<div class="card-footer">
			  <button id="salvar" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
			  <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
	</form>
@stop

@section('js')
    <script>
        $(document).ready(function(){

            $('#idPai').hierarchySelect({
                hierarchy: true,
                search: true,
                width: 350,
                initialValueSet: true,
                onChange: function (value) {
                    //console.log('[Three] value: "' + value + '"');
                }
            });

            $('.preview').hide();

            $('.removeImagemClass').hide();

            validarFormulario();
        });

        $("#nome").blur(function(){

            var nome = $("#nome").val();

            if(nome != "" && nome != undefined){
                var rotaOld = "{{ route('servicos.valida.existe.nome', ['substituir','null']) }}";
                var rota = rotaOld.replace("substituir", nome);
                var msgErro = 'Já existe este nome no sistema.';

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
        }

        $( "#inputImgItens" ).change(function() {
            $('#preview').css("width","200px");
            $('#preview').css("height","200px");
            $('#preview').css("border-style","groove");
            $('#preview').css("margin-bottom","10px");

            var extPermitidas = ['jpg','png','jpeg','gif'];
            var extArquivo = document.getElementById("inputImgItens").value.split('.').pop();
            var size = this.files[0].size/1024/1024;

            if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
                $('.preview').hide();
                $('#urlImagemError').html("Esta extensão não é permitida para esta funcionalidade. Extensões Permitidas: [ jpg | jpeg | gif | png ].");
                $('#urlImagemError').show();
                $('#salvar').prop("disabled",true);
                $('.removeImagemClass').show();
            } else if(size > 2){
                $('.preview').hide();
                $('#urlImagemError').html("A imagem não pode ter tamanho maior que 2 Mb.");
                $('#urlImagemError').show();
                $('#salvar').prop("disabled",true);
                $('.removeImagemClass').show();
            } else {
                $('#salvar').prop("disabled",false);
                $('.preview').show();
                $('#urlImagemError').hide();
                $('.removeImagemClass').hide();
            }
        });

        document.getElementById("inputImgItens").addEventListener("change", readImage, false);
	</script>
@stop
