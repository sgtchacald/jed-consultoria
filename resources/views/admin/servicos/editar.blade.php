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
                        <div class="form-group required">
							<label>{{Config::get('label.urlImagem')}}:</label>

                            <div class="custom-file">
                                <input  id="input_img_itens"
                                        name="img_itens"
                                        type="file"
                                        class="custom-file-input">

                                <label class="custom-file-label" for="input_img_itens">Selecione um arquivo</label>
                            </div>
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

        });
	</script>
@stop
