@extends('adminlte::page')
@section('title', Config::get('label.parametroGlobal_editar'))

@section('content_header')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#">Administração</a></li>
				<li class="breadcrumb-item active">{{Config::get('label.parametroGlobal_editar')}}</li>
			</ol>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{Config::get('label.parametroGlobal_editar')}}</h3>
	</div>

	<form name="formEditar" id="formEditar" method="post" action="{{route('parametro.update')}}">
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
									value="{{old('id', $parametroGlobal[0]->id)}}" readonly>
						</div>
					</div>

					<div class="col-sm-11"></div>
				</div>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group required">
                            <label>{{Config::get('label.unidade')}}:</label>
                            <select name="unidade" id="unidade" class="form-control @error('unidade') is-invalid @enderror">
                                <option value="">Selecione</option>
                                @foreach ((\App\Dominios\TipoUnidade::getDominio()) as $key => $value)
                                    <option @if(old('unidade', isset($parametroGlobal[0]) ? $parametroGlobal[0]->unidade : '')==$key) {{'selected="selected"'}} @endif value="{{$key}}">
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>

                            @error('unidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-2">
						<div class="form-group required">
							<label>{{Config::get('label.codigo')}}:</label>
							<input 	type="text"
									name="codigo"
									id="codigo"
									class="form-control @error('codigo') is-invalid @enderror readyOnly" readonly
									placeholder="{{Config::get('label.codigo_placeholder')}}"
									maxlength="30"
									value="{{old('codigo', $parametroGlobal[0]->codigo)}}">

                            @error('codigo')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
					</div>

                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>{{Config::get('label.nome')}}:</label>
                            <input 	type="text"
                                    name="nome"
                                    id="nome"
                                    class="form-control @error('nome') is-invalid @enderror"
                                    placeholder="{{Config::get('label.nome_placeholder')}}"
                                    maxlength="60"
                                    value="{{old('nome', $parametroGlobal[0]->nome)}}">

                            @error('nome')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group required">
                            <label>{{Config::get('label.descricao')}}:</label>
                            <input 	type="text"
                                    name="descricao"
                                    id="descricao"
                                    class="form-control @error('descricao') is-invalid @enderror"
                                    placeholder="{{Config::get('label.descricao_placeholder')}}"
                                    maxlength="255"
                                    value="{{old('descricao', $parametroGlobal[0]->descricao)}}">

                            @error('descricao')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row valorTexto">
                    <div class="col-sm-8">
                        <div class="form-group required">
                            <label>{{Config::get('label.valor')}}:</label>
                            <textarea
                                name="valorTexto"
                                id="textarea"
                                class="form-control @error('valor') is-invalid @enderror tamanhoMaxlenght"
                                placeholder="{{Config::get('label.parametroGlobal_valor_placeholder')}}"
                                rows="5"
                                maxlength="1024">{{old('valor', $parametroGlobal[0]->valor)}}</textarea>
                            <span id="chars">1024</span> caracteres restantes.

                            @error('valor')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row valorNumero">
                    <div class="col-sm-2">
                        <div class="form-group required">
                            <label>{{Config::get('label.valor')}}:</label>

                            <input 	type="number"
                                name="valorNumero"
                                id="valorNumero"
                                class="form-control @error('valorNumero') is-invalid @enderror"
                                placeholder="{{Config::get('label.valor_placeholder')}}"
                                maxlength="1024"
                                value="{{old('valor', $parametroGlobal[0]->valor)}}">

                            @error('valor')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>É um parâmetro de "SITE" ou de "SISTEMA"? {{$parametroGlobal[0]->modulopai_id}}</label>
                            <select name="modulopai_id" id="modulopai_id" class="form-control @error('modulopai_id') is-invalid @enderror">
                                <option value="">Selecione</option>
                                @foreach ($modulos as $modulo)
                                    @if($modulo->codigo == "SITE" || $modulo->codigo == "SISTEMA")
                                        <option @if(old('modulopai_id', isset($parametroGlobal[0]) ? $parametroGlobal[0]->modulopai_id : '') == $modulo->id) {{'selected="selected"'}} @endif value="{{$modulo->id}}">
                                            {{$modulo->nome}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            @error('modulopai_id')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>{{Config::get('label.modulo')}}:</label>
                            <select name="modulo_id" id="modulo_id" class="form-control @error('modulo_id') is-invalid @enderror">
                                <option value="">Selecione</option>
                                @foreach ($modulos as $modulo)
                                    @if($modulo->codigo != "SITE" && $modulo->codigo != "SISTEMA")
                                        <option @if(old('modulo_id')== $modulo->id) {{'selected="selected"'}} @endif value="{{$modulo->id}}">
                                            {{$modulo->nome}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>

                            @error('modulo_id')
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
									<option @if(old('indStatus', $parametroGlobal[0]->indstatus)==$key) {{'selected="selected"'}} @endif value="{{$key}}">
										{{$value}}
									</option>
								@endforeach
							</select>

							@error('usuPostoGrad')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
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
            validaExibicaoCampoValor();
        });

        function converterEmMaiusculas(e) {
            var ss = e.target.selectionStart;
            var se = e.target.selectionEnd;
            e.target.value = e.target.value.toUpperCase();
            e.target.selectionStart = ss;
            e.target.selectionEnd = se;
        }

        function validaExibicaoCampoValor(){
            $(".valorNumero").hide();
            $(".valorTexto").hide();

            var valorUnidadeSelecionada = $('#unidade').val();

            if(valorUnidadeSelecionada == "T"){
                $(".valorNumero").hide();
                $(".valorNumero").val("");
                $(".valorTexto").show();
            }else if(valorUnidadeSelecionada == "N"){
                $(".valorTexto").hide();
                $(".valorTexto").val("");
                $(".valorNumero").show();
            }else{
                $(".valorNumero").hide();
                $(".valorNumero").val("");
                $(".valorTexto").hide();
                $(".valorTexto").val("");
            }

            $('#unidade').on('change',function(){
                var valorUnidadeSelecionada = $('#unidade').val();

                if(valorUnidadeSelecionada == "T"){
                    $(".valorNumero").hide();
                    $(".valorTexto").show();
                }else if(valorUnidadeSelecionada == "N"){
                    $(".valorNumero").show();
                    $(".valorTexto").hide();
                }else{
                    $(".valorNumero").hide();
                    $(".valorTexto").hide();
                }
            });
        }
	</script>
@stop
