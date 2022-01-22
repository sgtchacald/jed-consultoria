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
            <div class="col-12 text-center offset-top-75" data-wow-delay=".2s"><a class="button-way-point d-inline-block text-center d-inline-flex flex-column justify-content-center" href="#" data-custom-scroll-to="about"><span class="fa-chevron-down"></span></a></div>
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

    <!--About-->
    <section class="section section-sm position-relative" id="about">
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
                <a class="button-width-190 button-primary button-circle button-lg button offset-top-30" href="#">{{Parametro::get("BOTAO_SAIBA_MAIS")}}</a>
                </div>
            </div>
            </div>
        </div>
        <!--<div class="decor-text decor-text-1">Sobre</div>-->
    </section>

@endsection
