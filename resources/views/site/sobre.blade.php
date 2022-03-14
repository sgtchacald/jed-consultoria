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

                        <a class="button-width-190 button-primary button-circle button-lg button offset-top-30" href="{{ route('site.servicos') }}" >Veja Todos</a>
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
    </script>
@stop
