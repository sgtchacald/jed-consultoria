@extends('adminlte::page')
@section('title', Config::get('label.usuarios_cadastrar'))

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Administração</a></li>
                    <li class="breadcrumb-item active">{{ Config::get('label.usuarios_cadastrar') }}</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ Config::get('label.usuarios_cadastrar') }}</h3>
        </div>

        <form id="formCadastrar" method="POST" action="{{ route('usuarios.insert') }}" autocomplete="off"
            enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                @include('utils.erro')

                <div class="row ocultar">
                    <div class="col-sm-1">
                        <div class="form-group required">
                            <label>{{ Config::get('label.id') }}:</label>
                            <input type="text" name="id" id="id" class="form-control @error('id') is-invalid @enderror"
                                placeholder="{{ Config::get('label.id_placeholder') }}" maxlength="100"
                                value="{{ old('id') }}">
                        </div>
                    </div>
                </div>

                <input id="alteraImagem" name="alteraImagem" type="hidden" value="true">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group required">
                            <label>{{ Config::get('label.nome') }}:</label>
                            <input type="text" name="nome" id="nome"
                                class="form-control @error('nome') is-invalid @enderror"
                                placeholder="{{ Config::get('label.nome_placeholder') }}" maxlength="255"
                                value="{{ old('nome') }}">
                        </div>
                        <label id="msgErroNome" class="error" for="nome"></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group required">
                            <label>{{ Config::get('label.usuarios_email') }}:</label>
                            <input type="text" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_email_placeholder') }}" maxlength="255"
                                value="{{ old('email') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group required">
                            <label>{{ Config::get('label.usuarios_cargo') }}:</label>
                            <input type="text" name="cargo" id="cargo"
                                class="form-control @error('cargo') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_cargo_placeholder') }}" maxlength="80"
                                value="{{ old('cargo') }}">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group required">
                            <label>{{ Config::get('label.usuarios_descricaoCargo') }}:</label>
                            <input type="text" name="descricaoCargo" id="descricaoCargo"
                                class="form-control @error('descricaoCargo') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_descricaoCargo_placeholder') }}"
                                maxlength="120" value="{{ old('descricaoCargo') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <label>{{ Config::get('label.usuarios_redessociais') }}:</label>
                        <input type="url" name="urlLinkedin" id="urlLinkedin"
                                class="form-control @error('urlLinkedin') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_linkedin_placeholder') }}"
                                maxlength="512" value="{{ old('urlLinkedin') }}">
                        <br>
                        <input type="url" name="urlTwitter" id="urlTwitter"
                                class="form-control @error('urlTwitter') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_twitter_placeholder') }}"
                                maxlength="512" value="{{ old('urlTwitter') }}">

                    </div>

                    <div class="col-sm-3">
                        <label style="color: #FFFFFF">:</label>
                        <input type="url" name="urlFacebook" id="urlFacebook"
                                class="form-control @error('urlFacebook') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_facebook_placeholder') }}"
                                maxlength="512" value="{{ old('urlFacebook') }}">
                        <br>
                        <input type="url" name="urlInstagram" id="urlInstagram"
                                class="form-control @error('urlInstagram') is-invalid @enderror"
                                placeholder="{{ Config::get('label.usuarios_instagram_placeholder') }}"
                                maxlength="512" value="{{ old('urlInstagram') }}">
                    </div>
                </div>

                <div class="row"  style="margin-top:5px;">
                    <div class="col-sm-6">
                        <br>
                        <label>{{ Config::get('label.imagem') }}:</label>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input id="inputImgItens" name="urlImagem" type="file" class=""
                                    aria-describedby="inputImgItens">
                                <i style="color:red; padding: 5px 0px 0px 15px;"
                                    class="fas fa-times-circle removeImagemClass" data-toggle="tooltip"
                                    data-placement="right" title="Remover Imagem"
                                    onclick="removerImagem($('#inputImgItens'))"></i>
                            </div>
                        </div>

                        <label id="urlImagemError" class="error" for="urlImagem"></label>
                    </div>
                </div>

                <div class="row preview">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img id="preview" src="" align="left">
                            <i id="removeImagem" style="color:red; padding: 0px 0px 0px 5px;" class="fas fa-times-circle"
                                data-toggle="tooltip" data-placement="right" title="Remover Imagem"
                                onclick="removerImagem($('#inputImgItens'))"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group required">
                            <label>{{ Config::get('label.usuarios_senha') }}:</label>
                            <input type="password" name="senha" id="senha"
                                class="form-control @error('senha') is-invalid @enderror" maxlength="12"
                                value="{{ old('senha') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-check">
                            <br>
                            <input name="indColaborador" class="form-check-input" type="checkbox" value="S" id="indColaborador">
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
                            <label>{{ Config::get('label.status') }}:</label>
                            <select name="indStatus" id="indStatus"
                                class="form-control @error('indStatus') is-invalid @enderror readyOnly" readonly>
                                <option value="">Selecione</option>
                                @foreach (\App\Dominios\IndStatus::getDominio() as $key => $value)
                                    <option @if (old('indStatus') == $key || $key == 'A') {{ 'selected="selected"' }} @endif value="{{ $key }}">
                                        {{ $value }}
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
            $(document).ready(function() {

                $('.preview').hide();

                $('.removeImagemClass').hide();

                validarFormulario();
            });

            $("#nome").blur(function() {

                var nome = $("#nome").val();

                if (nome != "" && nome != undefined) {
                    var rotaOld = "{{ route('usuarios.valida.existe.nome', ['substituir', 'null']) }}";
                    var rota = rotaOld.replace("substituir", nome);
                    var msgErro = 'Já existe este nome no sistema.';

                    $.ajax({
                        type: 'get', //THIS NEEDS TO BE GET
                        url: rota,
                        dataType: 'json',
                        success: function(response) {
                            if (response == true) {
                                $('#msgErroNome').append(msgErro);
                                $('#msgErroNome').show();
                            } else {
                                $('#msgErroNome').hide();
                            }
                        },
                        error: function() {
                            console.log(response);
                        }
                    });
                }

            });

            function validarFormulario() {
                var rota = "{{ route('modulo.insert') }}";

                $('#formCadastrar').validate({
                    rules: {
                        nome: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        cargo: {
                            required: true
                        },
                        descricaoCargo: {
                            required: true
                        },
                        senha: {
                            required: true
                        },
                    },
                    messages: {
                        nome: {
                            required: 'Nome é obrigatório'
                        },
                        email: {
                            required: 'Nome é obrigatório',
                            email: 'Digite um e-mail válido.'
                        },
                        cargo: {
                            required: 'Cargo é obrigatório'
                        },
                        descricaoCargo: {
                            required: 'Descrição do Cargo é obrigatório'
                        },
                        senha: {
                            required: 'Senha é obrigatória'
                        }
                    },
                    submitHandler: function(form) {
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
                $('#salvar').prop("disabled", false);
            }

            function exibirSenha() {
                var senha = $('#senha');
                var olho = $("#olho");

                olho.mousedown(function() {
                    senha.attr("type", "text");
                });

                olho.mouseup(function() {
                    senha.attr("type", "password");
                });
                // para evitar o problema de arrastar a imagem e a senha continuar exposta,
                //citada pelo nosso amigo nos comentários
                /*$("#olho").mouseout(function() {
                    $("#senha").attr("type", "password");
                });*/
            }

            $("#inputImgItens").change(function() {
                $('#preview').css("width", "200px");
                $('#preview').css("height", "200px");
                $('#preview').css("border-style", "groove");
                $('#preview').css("margin-bottom", "10px");

                var extPermitidas = ['jpg', 'png', 'jpeg', 'gif'];
                var extArquivo = document.getElementById("inputImgItens").value.split('.').pop();
                var size = this.files[0].size / 1024 / 1024;

                if (typeof extPermitidas.find(function(ext) {
                        return extArquivo == ext;
                    }) == 'undefined') {
                    $('.preview').hide();
                    $('#urlImagemError').html(
                        "Esta extensão não é permitida para esta funcionalidade. Extensões Permitidas: [ jpg | jpeg | gif | png ]."
                    );
                    $('#urlImagemError').show();
                    $('#salvar').prop("disabled", true);
                    $('.removeImagemClass').show();
                } else if (size > 2) {
                    $('.preview').hide();
                    $('#urlImagemError').html("A imagem não pode ter tamanho maior que 2 Mb.");
                    $('#urlImagemError').show();
                    $('#salvar').prop("disabled", true);
                    $('.removeImagemClass').show();
                } else {
                    $('#salvar').prop("disabled", false);
                    $('.preview').show();
                    $('#urlImagemError').hide();
                    $('.removeImagemClass').hide();
                }
            });



            document.getElementById("inputImgItens").addEventListener("change", readImage, false);
        </script>
    @stop
