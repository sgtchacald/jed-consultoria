@extends('site.layouts.principal')

@section('conteudo')
    <!--Introdução -->
    <section class="section section-intro context-dark">
        <div class="intro-bg"
            style="background: url({{ asset('site/images/servicos.jpg') }}) no-repeat;background-size:cover;background-position: top center;">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <h1 class="font-weight-bold wow fadeInLeft">Nossos Serviços</h1>
                    <p class="intro-description wow fadeInRight">Uma lista especial de serviços para você</p>
                </div>
            </div>
        </div>

        <div class="col-12 text-center offset-top-75" data-wow-delay=".2s">
            <a class="button-way-point d-inline-block text-center d-inline-flex flex-column justify-content-center" href="#"
                data-custom-scroll-to="servicos">
                <span class="fa-chevron-down"></span>
            </a>
        </div>
    </section>

    <!--Serviços-->
    <section id="servicos" class="section section-md bg-xs-overlay" style="background:url('')no-repeat;background-size:cover">
        <div class="container">
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
