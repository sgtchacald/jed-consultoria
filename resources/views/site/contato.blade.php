@extends('site.layouts.principal')

@section('conteudo')
    {{-- Introdução da Pagina --}}
    <section class="section section-intro context-dark">
        <div class="intro-bg"
            style="background: url({{ asset('site/images/intro-pagina-contato.jpg') }}) no-repeat;background-size:cover;background-position: top center;">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <h1 class="font-weight-bold wow fadeInLeft">{{ Parametro::get('PG_CONTATO_TITULO') }}</h1>
                    <p class="intro-description wow fadeInRight">{{ Parametro::get('PG_CONTATO_TITULO_TEXTO') }}.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulário de envio de email -->
    <section class="section section-md">
        <div class="container">
            <!--RD Mailform-->
            <div class="row justify-content-center">
                <div class="col-12 text-center col-md-10 col-lg-8">
                    <div class="section-name wow fadeInRight" data-wow-delay=".2s">
                        {{ Config::get('label.contato_subtitulo') }}</div>
                    <h3 class="wow fadeInLeft" data-wow-delay=".3s">{{ Config::get('label.contato_titulo') }}</h3>
                    <p>Nós temos a melhor assessoria</p>
                </div>

                <div class="col-xl-6 col-md-8 col-12">
                    <form name="formContato" id="formContato" method="post" action="{{ route('site.contato.enviar') }}">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                        @if (Session::has('alert-' . $msg))
                                            <div class="alert alert-{{ $msg }} alert-dismissible desaparecer"
                                                role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">×</button>
                                                {{ Session::get('alert-' . $msg) }}
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="form-group required">
                                        <label class="negrito">{{ Config::get('label.nome') }}:</label>

                                        <input type="text" name="nome" id="nome"
                                            class="form-control @error('nome') is-invalid @enderror"
                                            placeholder="{{ Config::get('label.nome_placeholder') }}" maxlength="100"
                                            value="{{ old('nome') }}">

                                        @error('nome')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <label class="negrito">{{ Config::get('label.email') }}:</label>

                                        <input type="text" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ Config::get('label.email_placeholder') }}" maxlength="100"
                                            value="{{ old('email') }}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <label class="negrito">{{ Config::get('label.telefone') }}:</label>

                                        <input type="text" id="telefone" name="telefone"
                                            class="form-control @error('telefone') is-invalid @enderror phone"
                                            placeholder="{{ Config::get('label.telefone_placeholder') }}"
                                            maxlength="11"
                                            value="{{ old('telefone') }}">

                                        @error('telefone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <label class="negrito">{{ Config::get('label.contato_assunto') }}:</label>
                                        <select name="assunto" id="assunto"
                                            class="form-control @error('assunto') is-invalid @enderror readyOnly" readonly>
                                            <option value="">Selecione</option>
                                            @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosHierarquicamente() as $servico)
                                                @if ($servico->idpai == '')
                                                    <option @if (old('assunto') == $servico->id) {{ 'selected="selected"' }} @endif value="{{ $servico->id }}">
                                                        {{ $servico->nome }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                        <input type="hidden" id="strAssunto" name="strAssunto" value="">

                                        @error('assunto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group required">
                                        <label
                                            class="negrito">{{ Config::get('label.contato_mensagem') }}:</label>

                                        <textarea name="mensagem" id="textarea"
                                            class="form-control @error('mensagem') is-invalid @enderror tamanhoMaxlenght"
                                            placeholder="{{ Config::get('label.contato_mensagem_placeholder') }}"
                                            rows="5" maxlength="1024"
                                            style="text-align: justify;">{{ old('mensagem') }}</textarea>

                                        <span id="chars">1024</span> caracteres restantes.

                                        @error('mensagem')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Google Maps-->
    <section class="section">
        <div id="mapa" style="width: 100%; height: 300px;"></div>
    </section>


@endsection

@section('js')
    <script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
    <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>

    <script type="text/javascript">
        var select = document.querySelector('select');


        select.addEventListener('change', function() {
            var option = this.selectedOptions[0];
            var texto = option.textContent;

            document.getElementById('strAssunto').value = texto.trim();
        });

        var locations = [
            ['JED Consultoria', -22.75710143519233, -43.44852097951658, 1]
        ];

        var map = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 18,
            center: new google.maps.LatLng(-22.75725845215196, -43.448526716900744),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }


        function somenteNumeros(e) {
            var charCode = e.charCode ? e.charCode : e.keyCode;
            // charCode 8 = backspace
            // charCode 9 = tab
            if (charCode != 8 && charCode != 9) {
                // charCode 48 equivale a 0
                // charCode 57 equivale a 9
                if (charCode < 48 || charCode > 57) {
                    return false;
                }
            }
        }

        var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
        options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };

        $('.phone').mask(behavior, options);
    </script>
@stop
