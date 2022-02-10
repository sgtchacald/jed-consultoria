@extends('site.layouts.principal')

@section('conteudo')
    <!--Main section-->
    <section class="section main-section parallax-scene-js" style="background:url('{{ asset('site/images/bg-1-1700x803.png') }}') no-repeat center center; background-size:cover;">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="main-decorated-box text-center text-xl-left">
                <h1 class="text-white text-xl-center wow slideInRight" data-wow-delay=".3s"><span class="align-top offset-top-30 d-inline-block font-weight-light sufix-text"></span><span class="big font-weight-bold d-inline-flex offset-right-170">Assessoria</span></h1>
                <h1 class="text-white text-left wow slideInCenter" data-wow-delay=".2s"><span class="align-top offset-top-30 d-inline-block prefix-text"><span class="biggest d-block d-xl-flex font-weight-bold">Contábil</span></h1>
                <div class="decorated-subtitle text-italic text-white wow slideInLeft">{{Parametro::get("PI_SLIDE_SHOW_SUBTITULO")}}</div>
                </div>
            </div>
            <div class="col-12 text-center offset-top-75" data-wow-delay=".2s"><a class="button-way-point d-inline-block text-center d-inline-flex flex-column justify-content-center" href="#" data-custom-scroll-to="sobre"><span class="fa-chevron-down"></span></a></div>
            </div>
        </div>

        <div class="decorate-layer">
            <div class="layer-1">
            <div class="layer" data-depth=".20"><img src="{{ asset('site/images/parallax-item-1-563x532.png') }}" alt="" width="563" height="266"/></div>
            </div>
            <div class="layer-2">
            <div class="layer" data-depth=".30"><img src="{{ asset('site/images/parallax-item-2-276x343.png') }}" alt="" width="276" height="171"/></div>
            </div>
            <div class="layer-3">
            <div class="layer" data-depth=".40"><img src="{{ asset('site/images/parallax-item-3-153x144.png') }}" alt="" width="153" height="72"/></div>
            </div>
            <div class="layer-4">
            <div class="layer" data-depth=".20"><img src="{{ asset('site/images/parallax-item-4-69x74.png') }}" alt="" width="69" height="37"/></div>
            </div>
            <div class="layer-5">
            <div class="layer" data-depth=".40"><img src="{{ asset('site/images/parallax-item-5-72x75.png') }}" alt="" width="72" height="37"/></div>
            </div>
            <div class="layer-6">
            <div class="layer" data-depth=".30"><img src="{{ asset('site/images/parallax-item-6-45x54.png') }}" alt="" width="45" height="27"/></div>
            </div>
        </div>
    </section>

    <!--Sobre a empresa -->
    <section class="section section-sm position-relative" id="sobre">
        <div class="container">
            <div class="row row-30">
            <div class="col-lg-6">
                <div class="block-decorate-img wow fadeInLeft" data-wow-delay=".2s"><img src="{{ asset('site/images/home-1-570x703.jpg') }}" alt="" width="570" height="351"/>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="block-sm offset-top-45">
                <div class="section-name wow fadeInRight" data-wow-delay=".2s">{{Parametro::get("PI_SOBRE_TITULO")}}</div>
                <h3 class="wow fadeInLeft text-capitalize devider-bottom" data-wow-delay=".3s">{{Parametro::get("PI_SOBRE_SUBTITULO")}}</span></h3>
                <p class="offset-xl-40 wow fadeInUp" data-wow-delay=".4s">{{Parametro::get("PI_SOBRE_TEXTO")}}</p>
                <p class="default-letter-spacing font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s">{{Parametro::get("PI_SOBRE_TEXTO_NEGRITO")}}</p>
                <a class="button-width-190 button-primary button-circle button-lg button offset-top-30" href="{{ route('site.sobre') }}">{{Parametro::get("BOTAO_SAIBA_MAIS")}}</a>
                </div>
            </div>
            </div>
        </div>
        <!--<div class="decor-text decor-text-1">Sobre</div>-->
    </section>

    <!--Features-->
    <section class="section custom-section position-relative section-md">
        <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-12">
                <div class="section-name wow fadeInRight">{{Parametro::get("MVV_TITULO")}}</div>
                <h3 class="text-capitalize devider-left wow fadeInLeft" data-wow-delay=".2s">{{Parametro::get("MVV_SUBTITULO")}}</span></h3>
                <p></p>

                <div class="row row-15">
                    <div class="col-xl-12 wow fadeInUp" data-wow-delay=".2s">
                        <div class="box-default">
                            <div class="box-default-title">{{Parametro::get("MVV_MISSAO_TITULO")}}</div>
                            <p class="box-default-description">{{Parametro::get("MVV_MISSAO_TEXTO")}}</p><span class="box-default-icon novi-icon icon-lg mercury-icon-target-2"></span>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-xl-12 wow fadeInUp" data-wow-delay=".3s">
                        <div class="box-default">
                            <div class="box-default-title">{{Parametro::get("MVV_VISAO_TITULO")}}</div>
                            <p class="box-default-description">{{Parametro::get("MVV_VISAO_TEXTO")}}</p><span class="box-default-icon novi-icon icon-lg mercury-icon-lightbulb-gears"></span>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-xl-12 wow fadeInUp" data-wow-delay=".4s">
                        <div class="box-default">
                            <div class="box-default-title">{{Parametro::get("MVV_VALORES_TITULO")}}</div>
                            <p class="box-default-description">{{Parametro::get("MVV_VALORES_TEXTO")}}</p><span class="box-default-icon novi-icon icon-lg mercury-icon-social"></span>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="image-left-side wow slideInRight" data-wow-delay=".5s">
            <img style="" src="{{ asset('site/images/home-2-636x480.jpg') }}" alt="" width="626" height="240"/>
        </div>

        <!--<div class="decor-text decor-text-2 wow fadeInUp" data-wow-delay=".3s">features</div>-->
    </section>

     <!--Métricas-->
    <section class="section bg-image-2">
        <div class="container section-md">
            <div class="row row-30 text-center">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="counter-classic">
                        <div class="counter-classic-number">
                            <span class="icon-lg novi-icon offset-right-10 mercury-icon-time"></span>
                            <span class="counter text-white" data-speed="2000">{{Parametro::get("PI_QTD_ANOS_EMPRESA")}}</span>
                        </div>
                        <div class="counter-classic-title">{{Parametro::get("PI_QTD_ANOS_EMPRESA_TITULO")}}</div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="counter-classic">
                        <div class="counter-classic-number">
                            <span class="icon-lg novi-icon offset-right-10 mercury-icon-folder"></span>
                            <span class="counter text-white" data-speed="2000">{{Parametro::get("PI_QTD_SV_PRESTADOS_A_ANTERIOR")}}</span>
                        </div>
                        <div class="counter-classic-title">{{Parametro::get("PI_QTD_SV_PREST_A_ANT_TITULO")}}</div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="counter-classic">
                        <div class="counter-classic-number">
                            <span class="icon-lg novi-icon offset-right-10 mercury-icon-users"></span>
                            <span class="counter text-white" data-speed="2000">{{Parametro::get("PI_QTD_PARCEIROS")}}</span><span class="symbol text-white">+</span>
                        </div>
                        <div class="counter-classic-title">{{Parametro::get("PI_QTD_PARCEIROS_TITULO")}}</div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="counter-classic">
                        <div class="counter-classic-number">
                            <span class="icon-lg novi-icon offset-right-10 mercury-icon-group"></span>
                            <span class="counter text-white" data-speed="2000">{{Parametro::get("PI_QTD_COLABORADORES")}}</span>
                        </div>
                        <div class="counter-classic-title">{{Parametro::get("QTD_PI_COLABORADORES_TITULO")}}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
