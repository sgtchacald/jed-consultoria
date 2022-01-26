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
                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s">{{Parametro::get("PI_SOBRE_TEXTO_NEGRITO")}}</p>
                    <div class="offset-top-20">
                        <!--Linear progress bar-->
                        <article class="progress-linear">
                            <div class="progress-header progress-header-simple">
                                <p>Management</p><span class="progress-value">85</span>
                            </div>
                            <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                            </div>
                        </article>
                        <!--Linear progress bar-->
                        <article class="progress-linear">
                            <div class="progress-header progress-header-simple">
                                <p>Marketing</p><span class="progress-value">45</span>
                            </div>
                            <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                            </div>
                        </article>
                        <!--Linear progress bar-->
                        <article class="progress-linear">
                            <div class="progress-header progress-header-simple">
                                <p>Analysis</p><span class="progress-value">90</span>
                            </div>
                            <div class="progress-bar-linear-wrap">
                                <div class="progress-bar-linear"></div>
                            </div>
                        </article>
                    </div>
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

@endsection
