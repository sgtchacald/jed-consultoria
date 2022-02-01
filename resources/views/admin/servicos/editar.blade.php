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

	<form name="formEditar" id="formEditar" method="post" action="{{route('servicos.update')}}" autocomplete="off" enctype="multipart/form-data">
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

                                    <input id="alteraImagem" name="alteraImagem" type="hidden" value="false">
						</div>
					</div>

					<div class="col-sm-11"></div>
				</div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
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
                                              href="#"> {{$h->nome}} </a>

                                            @if(property_exists($h, 'children'))
                                                @include('admin.servicos.servicosFilhos',['servicosFilho' => $h->children, 'tipoOperacao' => 'i'])
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <input class="d-none" name="idPai" readonly="readonly" aria-hidden="true" type="text" value="{{old('idPai', $servico[0]->idpai)}}"/>
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
									value="{{old('nome', $servico[0]->nome)}}">
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
							<label>{{Config::get('label.descricao')}}:</label>
							<input 	type="text"
									name="descricao"
									id="descricao"
									class="form-control @error('descricao') is-invalid @enderror"
									placeholder="{{Config::get('label.descricao_placeholder')}}"
									maxlength="512"
									value="{{old('descricao', $servico[0]->descricao)}}">
						</div>
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
			if('{{$servico[0]->indstatus}}' == 'I'){
				$("input").attr("disabled", true);
				$("button").attr("disabled", true);
			}

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

            $('#msgErroNome').hide();

            validarFormulario();

            getImagem();
        });

        $("#nome").click(function() {
            $('#msgErroNome').hide();
        });

        $("#nome").blur(function(){
            var nome = $("#nome").val();
            var id = "{{$servico[0]->id}}";

            if(nome != "" && nome != undefined){
                var rotaOld = "{{ route('servicos.valida.existe.nome', ['sbNome','sbId']) }}";
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
