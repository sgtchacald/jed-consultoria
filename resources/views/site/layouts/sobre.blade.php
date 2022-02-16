@extends('site.layouts.principal')

@section('conteudo')
    <!--Introdução -->
    <section class="section section-intro context-dark">
        <div class="intro-bg"
            style="background: url({{ asset('site/images/intro-bg-1.jpg') }}) no-repeat;background-size:cover;background-position: top center;">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <h1 class="font-weight-bold wow fadeInLeft">{{ Parametro::get('PG_SOBRE_TITULO') }}</h1>
                    <p class="intro-description wow fadeInRight">{{ Parametro::get('PG_SOBRE_DESCRICAO') }}</p>
                </div>
            </div>
        </div>

        <div class="col-12 text-center offset-top-75" data-wow-delay=".2s">
            <a class="button-way-point d-inline-block text-center d-inline-flex flex-column justify-content-center" href="#"
                data-custom-scroll-to="sobre">
                <span class="fa-chevron-down"></span>
            </a>
        </div>
    </section>

    <!-- Sobre -->
    <section id="sobre" class="section section-md">
        <div class="container">
            <div class="row row-40 justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="offset-top-45 offset-lg-right-45">
                        <div class="section-name wow fadeInRight" data-wow-delay=".2s">
                            {{ Parametro::get('PG_SOBRE_TITULO') }}</div>
                        <h3 class="wow fadeInLeft text-capitalize" data-wow-delay=".3s">
                            {{ Parametro::get('PI_SOBRE_SUBTITULO') }}</h3>
                        <p class="wow fadeInUp" data-wow-delay=".4s">{{ Parametro::get('PI_SOBRE_TEXTO') }}</p>
                        <p class="wow fadeInUp" data-wow-delay=".4s">{{ Parametro::get('PI_SOBRE_TEXTO_NEGRITO') }}</p>
                        <br>
                        <h5 class="wow fadeInLeft" data-wow-delay=".3s">Abaixo estão alguns de nossos serviços:</h5>
                    </div>

                    <div class="offset-top-20">

                        <!--Linear progress bar-->
                        @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosPaiAleatorios(3) as $servico)
                            @if ($servico->idpai == '')
                                <article class="progress-linear" style="margin-top: 10px !important;">
                                    <div class="progress-header progress-header-simple">
                                        <p class="" data-wow-delay=".4s">{{ $servico->nome }}</p>
                                    </div>

                                    <div class="progress" style="height: 5px; margin-top: 15px;">
                                        <div class="progress-bar progress-bar-animated button-primary" role="progressbar"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach

                        <a class="button-width-190 button-primary button-circle button-lg button offset-top-30" href="#"
                            data-custom-scroll-to="servicos">Veja Todos</a>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-10 col-12">
                    <div class="block-decorate-img wow fadeInLeft" data-wow-delay=".2s">
                        <img src="{{ asset('site/images/about-1-570x703.jpg') }}" alt="" width="570" height="351" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Serviços-->
    <section id="servicos" class="section section-md bg-xs-overlay"
        style="background:url('')no-repeat;background-size:cover">
        <div class="container">
            <div class="row row-50 justify-content-center">
                <div class="col-12 text-center col-md-10 col-lg-8">
                    <div class="section-name wow fadeInRight" data-wow-delay=".2s">Descubra Nossos Serviços</div>
                    <h3 class="wow fadeInLeft" data-wow-delay=".3s">Uma lista especial de serviços <span
                            class="text-primary"> Para Você</span></h3>
                    <p>Nós temos a melhor assessoria</p>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosHierarquicamente() as $servico)
                    @if ($servico->idpai == '')
                        <div class="col-xl-4 col-md-6 col-12 wow fadeInDown" data-wow-delay=".3s">
                            <div class="pricing-box bg-gray-primary servicos-div">
                                <h4 class="servicos-titulo">{{ $servico->nome }}</h4>
                                <hr class="servicos-hr-superior">
                                <p class="servicos-descricao"> {{ $servico->descricao }}</p>
                                <hr class="servicos-hr-inferior">

                                @if (property_exists($servico, 'children'))
                                    <a id="botao_modal_{{ $servico->id }}"
                                        class="button button-190 button-circle btn-light-rounded servicos-botao"
                                        onmouseenter="this.style.background='#FFFFFF'; this.style.color ='#923898'; this.style.borderColor='#FFFFFF'"
                                        onmouseleave="this.style.background='#923898'; this.style.color ='#FFFFFF'; this.style.borderColor='#FFFFFF'"
                                        data-toggle="modal" data-target="#modal_{{ $servico->id }}"
                                        onclick="getServicosFilhosByIdPai('{{ $servico->id }}','{{ $servico->nome }}');"
                                        href="#">
                                        + Servicos
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>

    <!-- Colaboradores -->
    <section class="section section-md">
        <div class="container">
            <div class="row row-50 justify-content-center">
                <div class="col-md col-12 text-center">
                    <div class="section-name wow fadeInRight" data-wow-delay=".2s">
                        {{ Parametro::get('PG_SOBRE_COLABORADOR_TITULO') }}</div>

                    <h3 class="wow fadeInLeft text-capitalize" data-wow-delay=".3s">
                        {{ Parametro::get('PG_SOBRE_COLABORADOR_SUBTITULO') }}
                    </h3>
                </div>
            </div>

            <div class="row row-50 justify-content-center">
                @foreach ((object) \App\Http\Controllers\Admin\UsuariosController::getUsuarios() as $usuario)
                    @if (($usuario->urlimagem != null || $usuario->urlimagem != '') && $usuario->indcolaborador == 'S')
                        <div class="col-xl-4 col-sm-6 col-10 wow fadeInLeft" data-wow-delay=".3s">
                            <div class="team-classic-wrap">
                                <div class="team-classic-img">
                                    <img src="{{ route('getimagem', $usuario->urlimagem) }}"
                                        alt="{{ $usuario->urlimagem }}" width="370" height="198" />
                                </div>
                                <div class="block-320 text-center">
                                    <h4 class="font-weight-bold">
                                        {{ \App\Http\Controllers\Utils\UtilsController::gePrimeiroNomeUltimoSobrenome($usuario->name) }}
                                    </h4>

                                    <span class="d-block">{{ $usuario->cargo }}</span>

                                    <p>{{ $usuario->descricaocargo }}</p>

                                    <hr class="offset-top-40" />

                                    <ul class="justify-content-center social-links offset-top-30">
                                        @if ($usuario->urllinkedin != '')
                                            <li><a class="fa fa-linkedin" href="{{ $usuario->urllinkedin }}" target="_blank"></a></li>
                                        @endif

                                        @if ($usuario->urltwitter != '')
                                            <li><a class="fa fa fa-twitter" href="{{ $usuario->urltwitter }}" target="_blank"></a></li>
                                        @endif

                                        @if ($usuario->urlfacebook != '')
                                            <li><a class="fa fa-facebook" href="{{ $usuario->urlfacebook }}" target="_blank"></a></li>
                                        @endif

                                        @if ($usuario->urlinstagram != '')
                                            <li><a class="fa fa-instagram" href="{{ $usuario->urlinstagram }}" target="_blank"></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!--Parceiros -->
    <section class="section section-md">
        <div class="container justify-content-center">
            <div class="row row-50 justify-content-center">
                <div class="col-md col-12 text-center">
                    <div class="section-name wow fadeInRight" data-wow-delay=".2s">
                        Uma parceria é fundamental para qualquer negócio.
                    </div>

                    <h3 class="wow fadeInLeft text-capitalize" data-wow-delay=".3s">
                        Nossos Parceiros
                    </h3>
                </div>
            </div>

            <div class="row">
                <!-- Owl Carousel-->
                <div class="owl-carousel text-center owl-brand"
                    data-items="1"
                    data-sm-items="2"
                    data-md-items="3"
                    data-lg-items="3"
                    data-xl-items="5"
                    data-xxl-items="5"
                    data-dots="true"
                    data-nav="false"
                    data-stage-padding="15"
                    data-loop="false"
                    data-margin="30"
                    data-mouse-drag="true"
                    data-autoplay="true">


                    @foreach ((object) \App\Http\Controllers\Admin\ParceirosController::getParceiros() as $parceiro)
                        @if (($parceiro->urlimagem != null || $parceiro->urlimagem != '') && $parceiro->indexibirparceiro == 'S')
                            <div class="item" style="border-style:solid 1px; color: #923898 !important"><img src="{{ route('getimagem', $parceiro->urlimagem) }}" alt="" width="200" height="24" /></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div id="modais" class="ocultar"></div>
@endsection




@section('js')
    <script>
        function getServicosFilhosByIdPai(idPai, nomePai) {

            //Exclui a modal anterior
            $(".excluir").remove();

            if ((idPai != "" && nomePai != "") && (idPai != undefined && nomePai != undefined)) {

                /* Gera o conteúdo da modal estática em html oriundos da rota abaixo */
                var rotaModal = "{{ route('site.servicos.modalservico') }}";

                $.ajax({
                    url: rotaModal,
                    type: 'get',
                    dataType: 'html',
                    success: function(data) {
                        $("#modais").append(data);
                    }
                });

                /* Gera o conteúdo da modal agora dinâmica dos serviços filhos */
                var rotaServicosOld = "{{ route('site.getservicosfilhosbyidpai', ['substituir']) }}";
                var rotaServicos = rotaServicosOld.replace("substituir", idPai);

                $.ajax({
                    url: rotaServicos,
                    type: "get",
                    dataType: "json",
                    success: function(data) {
                        idModal = "modal_" + idPai;
                        $(".modal").attr("id", idModal);

                        //Injeta o conteúdo
                        $(".titulo-modal").append(nomePai);

                        //console.log(data);
                        $(".conteudo-modal").append("<ul id='nivel_1' class='fa-ul'></ul>");
                        if (data.hasOwnProperty("children")) {
                            $.each(data.children, function() {
                                var id = "id_" + this.id;
                                var urlServicoExterno = this.urlservicoexterno;

                                if(urlServicoExterno == "" || urlServicoExterno == null || urlServicoExterno == undefined){
                                    $("#nivel_1").append("<li id='" + id +
                                    "'><i class='fa-li fa fa-check'></i><b>" + this.nome +
                                    "</b></li>");
                                }else{
                                    $("#nivel_1").append(
                                        "<a data-toggle='tooltip' data-placement='right' title='{{ Config::get('label.servicos_link_servico_hint') }}' class='listaServicosFilhos' href='" + urlServicoExterno + "' target='_blank'>" +
                                            "<li id='" + id + "'><b><i class='fa fa fa-check'></i>&nbsp;" + this.nome + "</b></li>"                            +
                                        "</a>"
                                    );
                                }


                                if (this.hasOwnProperty("children")) {
                                    buscaFilhos(this, this.id, this.nivel);
                                }
                            });
                        }

                        $('#' + idModal).modal("show");
                        $("#modais").removeClass("ocultar");


                    },
                    error: function() {
                        console.log(data);
                    }
                });
            }
        }

        function buscaFilhos(data, idPai, nivelPai) {
            idLiPai = "#id_" + idPai;
            idNivelLiPai = "#nivel_" + nivelPai;
            idUl = "id_ul_" + nivelPai + "_" + idPai;

            $(idLiPai).append("<ul id='" + idUl + "' class='fa-ul'></ul>");

            if (data.hasOwnProperty("children")) {
                $.each(data.children, function() {
                    var id = "id_" + this.id;
                    var urlServicoExterno = this.urlservicoexterno;

                    if(urlServicoExterno == "" || urlServicoExterno == null || urlServicoExterno == undefined){
                        $("#" + idUl).append("<li id='" + id +
                        "'><i class='fa-li fa fa-check'></i><b>" + this.nome +
                        "</b></li>");
                    }else{
                        $("#" + idUl).append(
                            "<a data-toggle='tooltip' data-placement='right' title='{{ Config::get('label.servicos_link_servico_hint') }}' class='listaServicosFilhos' href='" + urlServicoExterno + "' target='_blank' >" +
                                "<li id='" + id + "'><b><i class='fa fa fa-check'></i>&nbsp;" + this.nome + "</b></li>"                            +
                            "</a>"
                        );
                    }

                    if (this.hasOwnProperty("children")) {
                        buscaFilhos(this, this.id, this.nivel);
                    }
                });
            }
        }
    </script>
@stop
