@extends('site.layouts.principal')

@section('conteudo')
    <!--Introdução -->
    <section class="section section-intro context-dark">
        <div class="intro-bg" style="background: url({{ asset('site/images/intro-bg-1.jpg') }}) no-repeat;background-size:cover;background-position: top center;"></div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 text-center">
            <h1 class="font-weight-bold wow fadeInLeft">{{Parametro::get("PG_SOBRE_TITULO")}}</h1>
            <p class="intro-description wow fadeInRight">{{Parametro::get("PG_SOBRE_DESCRICAO")}}</p>
            </div>
        </div>
        </div>

        <div class="col-12 text-center offset-top-75" data-wow-delay=".2s">
            <a class="button-way-point d-inline-block text-center d-inline-flex flex-column justify-content-center" href="#" data-custom-scroll-to="sobre">
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
                        <div class="section-name wow fadeInRight" data-wow-delay=".2s">{{Parametro::get("PG_SOBRE_TITULO")}}</div>
                            <h3 class="wow fadeInLeft text-capitalize" data-wow-delay=".3s">{{Parametro::get("PI_SOBRE_SUBTITULO")}}</h3>
                            <p class="wow fadeInUp" data-wow-delay=".4s">{{Parametro::get("PI_SOBRE_TEXTO")}}</p>
                            <p class="wow fadeInUp" data-wow-delay=".4s">{{Parametro::get("PI_SOBRE_TEXTO_NEGRITO")}}</p>
                            <br>
                            <h5 class="wow fadeInLeft" data-wow-delay=".3s">Abaixo estão alguns de nossos serviços:</h5>
                    </div>

                    <div class="offset-top-20">

                        <!--Linear progress bar-->
                        @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosAleatorios(3) as $servico)
                            @if($servico->idpai == "")
                            <article class="progress-linear" style="margin-top: 10px !important;">
                                <div class="progress-header progress-header-simple">
                                    <p class="" data-wow-delay=".4s">{{$servico->nome}}</p>
                                </div>

                                <div class="progress" style="height: 5px; margin-top: 15px;">
                                    <div class="progress-bar progress-bar-animated button-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                </div>
                            </article>
                            @endif
                        @endforeach

                        <a class="button-width-190 button-primary button-circle button-lg button offset-top-30" href="#" data-custom-scroll-to="servicos">Veja Todos</a>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-10 col-12">
                    <div class="block-decorate-img wow fadeInLeft" data-wow-delay=".2s">
                        <img src="{{ asset('site/images/about-1-570x703.jpg') }}" alt="" width="570" height="351"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Pricing-->
    <section id="servicos" class="section section-md bg-xs-overlay" style="background:url('')no-repeat;background-size:cover">
        <div class="container">
        <div class="row row-50 justify-content-center">
            <div class="col-12 text-center col-md-10 col-lg-8">
                <div class="section-name wow fadeInRight" data-wow-delay=".2s">Descubra Nossos Serviços</div>
                <h3 class="wow fadeInLeft" data-wow-delay=".3s">Uma lista especial de serviços <span class="text-primary"> Para Você</span></h3>
                <p>Nós temos a melhor assessoria</p>
            </div>
        </div>

        <div class="row justify-content-center" >
            @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosHierarquia() as $servico)
                @if($servico->idpai == "")
                    <div class="col-xl-4 col-md-6 col-12 wow fadeInDown" data-wow-delay=".3s">
                        <div class="pricing-box bg-gray-primary servicos-div">
                            <h4 class="servicos-titulo">{{$servico->nome}}</h4>
                            <hr class="servicos-hr-superior">
                            <p class="servicos-descricao"> {{$servico->descricao}}</p>
                            <hr class="servicos-hr-inferior">

                            @if(property_exists($servico, 'children'))
                                <a id = "botao_modal_{{$servico->id}}"
                                   class = "button button-190 button-circle btn-light-rounded servicos-botao"
                                   onmouseenter = "this.style.background='#FFFFFF'; this.style.color ='#923898'; this.style.borderColor='#FFFFFF'"
                                   onmouseleave = "this.style.background='#923898'; this.style.color ='#FFFFFF'; this.style.borderColor='#FFFFFF'"
                                   href="#">
                                    + Servicos
                                </a>

                                @include('site.listaHierarquica',
                                    [
                                        'servicosFilho' => $servico->children,
                                        'idPai' => $servico->id,
                                        'nomePai' => $servico->nome
                                    ])
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        </div>
    </section>

    <div id="modais" class="ocultar"></div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){

        });
	</script>
@stop

