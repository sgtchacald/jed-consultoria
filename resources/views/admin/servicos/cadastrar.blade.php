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
									value="{{old('nome')}}"
                                    onclick="validaSeExisteNome()">
						</div>

                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                        <label>{{Config::get('label.url')}}:</label>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" class="" id="inputImgItens" aria-describedby="inputImgItens">
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
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>{{Config::get('label.servicos_pai')}}:</label>
                            <select name="idPai" id="idPai" class="form-control @error('idPai') is-invalid @enderror">
                                <option value="">Selecione</option>
                                @foreach ($servicos as $servico)
                                        <option @if(old('idPai')== $servico->id) {{'selected="selected"'}} @endif value="{{$servico->id}}">
                                            {{$servico->nome}}
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
			  <button id="salvar" type="submit" class="btn btn-primary">Salvar</button>
			  <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
	</form>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.preview').hide();
            $('.removeImagemClass').hide();
            validarFormulario();
        });

        function validaSeExisteNome(){
            var nome = $("#nome").val();

            if(nome != "" && nome != undefined){
                var rotaOld = "{{ route('servicos.valida.existe.nome', ['substituir']) }}";
                var rota = rotaOld.replace("substituir", nome);

                alert(rota);

                $.ajax({
                    url: rota,
                    type: 'put',
                    dataType: 'json'
                }).then( response =>{
                })
            }

        }

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
            }
        });

        document.getElementById("inputImgItens").addEventListener("change", readImage, false);
	</script>
@stop
