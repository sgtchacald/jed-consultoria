<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>{{ Parametro::get('TITULO_GERAL') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('site/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Montserrat:300,400,700%7CPoppins:300,400,500,700,900">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/app.css') }}">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }

    </style>
</head>

<body>
    <div class="ie-panel">
        <a href="#">
            <img src="{{ asset('site/images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>

    <!-- Loading -->
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>{{ Parametro::get('TEXTO_LOADING') }}</p>
        </div>
    </div>

    <div class="page">
        <header class="section page-header">
            <!--RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                    data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static"
                    data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                    data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px"
                    data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
                        data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                    <div class="rd-navbar-aside-outer rd-navbar-collapse bg-gray-dark">
                        <div class="rd-navbar-aside">
                            <ul class="list-inline navbar-contact-list">
                                <li>
                                    <div class="unit unit-spacing-xs align-items-center">
                                        <div class="unit-left"><span class="icon text-middle fa-whatsapp"></span>
                                        </div>
                                        <div class="unit-body"><a
                                                href="https://api.whatsapp.com/send?phone={{ Parametro::get('CONTATO_TELEFONE_WHATSAPP') }}"
                                                target="_blank">{{ Parametro::get('CONTATO_TELEFONE_FORMATADO') }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-xs align-items-center">
                                        <div class="unit-left"><span class="icon text-middle fa-envelope"></span>
                                        </div>
                                        <div class="unit-body"><a
                                                href="mailto:{{ Parametro::get('CONTATO_EMAIL') }}"
                                                target="_blank">{{ Parametro::get('CONTATO_EMAIL') }}</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-xs align-items-center">
                                        <div class="unit-left"><span class="icon text-middle fa-map-marker"></span>
                                        </div>
                                        <div class="unit-body"><a
                                                href="{{ Parametro::get('CONTATO_ENDERECO_LINK') }}"
                                                target="_blank">{{ Parametro::get('CONTATO_ENDERECO') }}</a></div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="social-links">
                                <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram"
                                        href="{{ Parametro::get('R_SOCIAL_URL_INSTAGRAM') }}" target="_blank"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <!--RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!--RD Navbar Toggle-->
                                <button class="rd-navbar-toggle"
                                    data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!--RD Navbar Brand-->
                                <div class="rd-navbar-brand">
                                    <!--Brand-->
                                    <a class="brand" href="{{ route('site.index') }}">
                                        <span class="justify-content-center ">
                                            <img class="brand-logo-dark"
                                                src="{{ asset('site/images/logo-default-site-com-texto.png') }}"
                                                alt="" width="100" height="17" align="left" />
                                            <img class="brand-logo-light"
                                                src="{{ asset('site/images/logo-inverse-site-com-texto.png') }}"
                                                alt="" width="100" height="17" align="left" />
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('site.index') }}">Home</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('site.sobre') }}">Sobre Nós</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('site.servicos') }}">Nossos Serviços</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('site.contato') }}">Contatos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('conteudo')

        <footer class="section footer-classic section-sm">
            <div class="container">
                <div class="row row-30">

                    <div class="col-lg-3 col-sm-4 wow fadeInUp" data-wow-delay=".3s">
                        <p class="footer-classic-title">{{ Parametro::get('TITULO_GERAL') }}</p>

                        <ul class="footer-classic-nav-list">
                            <li align="justify">
                                {{ Parametro::get('PI_SOBRE_TEXTO_NEGRITO') }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-sm-4 wow fadeInUp" data-wow-delay=".3s">
                        <p class="footer-classic-title">{{ Parametro::get('PG_CONTATO_TITULO') }}</p>

                        <ul class="footer-classic-nav-list">
                            <li style="margin-bottom: 25px;">
                                @if (Parametro::get('CONTATO_ENDEREC_RODAPE_PARTE_1') != '' || Parametro::get('CONTATO_ENDEREC_RODAPE_PARTE_2') != '')
                                    <a href="{{ Parametro::get('CONTATO_ENDERECO_LINK') }}" target="_blank">
                                        <span class="icon text-middle fa-map-marker"></span>
                                        @if (Parametro::get('CONTATO_ENDEREC_RODAPE_PARTE_1') != '')
                                            &nbsp;&nbsp;{{ Parametro::get('CONTATO_ENDEREC_RODAPE_PARTE_1') }}
                                        @endif
                                        <br>
                                        @if (Parametro::get('CONTATO_ENDEREC_RODAPE_PARTE_2') != '')
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Parametro::get('CONTATO_ENDEREC_RODAPE_PARTE_2') }}
                                        @endif
                                    </a>
                                @endif
                            </li>

                            <li style="margin-bottom: 25px;">
                                <a href="https://api.whatsapp.com/send?phone={{ Parametro::get('CONTATO_TELEFONE_WHATSAPP') }}"
                                    target="_blank">
                                    <span class="icon text-middle fa-whatsapp"></span>
                                    &nbsp;&nbsp;{{ Parametro::get('CONTATO_TELEFONE_FORMATADO') }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('site.contato') }}">
                                    <i class="fa fa-address-card" aria-hidden="true"></i> &nbsp;&nbsp;Fale Conosco
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-5 col-sm-4 wow fadeInUp" data-wow-delay=".3s">
                        <p class="footer-classic-title">Links Úteis</p>
                        <ul class="footer-classic-nav-list list-marked">
                            @foreach (\App\Http\Controllers\Admin\LinksUteisController::buscaLinksUteisAleatorios(4) as $linksUteis)
                                <li>
                                    <a data-toggle="tooltip" data-placement="right"
                                        title="{{ $linksUteis->descricao }}" href="{{ $linksUteis->url }}"
                                        target="_blank"> {{ $linksUteis->nome }} </a>
                                </li>
                            @endforeach

                            <li>
                                <a data-toggle="modal" data-target="#modalLinksUteis" href="#">
                                Veja Mais
                                </a>

                            </li>
                        </ul>

                        <!-- Modal -->
                        <div class="modal fade" id="modalLinksUteis" tabindex="-1" role="dialog"
                            aria-labelledby="TitulomodalLinksUteis" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#923898 !important;">
                                        <h5 class="modal-title" id="TitulomodalLinksUteis" style="color:#FFFFFF !important;">Links Úteis</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="footer-classic-nav-list list-marked">
                                            @foreach (\App\Http\Controllers\Admin\LinksUteisController::buscaLinksUteisAleatorios(30) as $linksUteis)
                                                <li>
                                                    <a data-toggle="tooltip" data-placement="right"
                                                        title="{{ $linksUteis->descricao }}" href="{{ $linksUteis->url }}"
                                                        target="_blank"> {{ $linksUteis->nome }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container wow fadeInUp" data-wow-delay=".4s">
                <div class="footer-classic-aside">
                    <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. Todos os
                        Direitos Reservados.</p>
                    <ul class="social-links">
                        <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram"
                                href="{{ Parametro::get('R_SOCIAL_URL_INSTAGRAM') }}" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <div class="snackbars" id="form-output-global"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA93FWAx6aQtrjBGlGJmr72j9YpVeJUpuk&sensor=false"
        type="text/javascript"></script>
    <script src="{{ asset('site/js/core.min.js') }}"></script>
    <script src="{{ asset('site/js/script.js') }}"></script>
    <script src="{{ asset('site/js/app.js') }}"></script>
    <script>
        window.rwbp = {
            email: 'contato@jedconsultoria.com.br',
            phone: '+5521969360480  ',
            message: 'Seja bem vindo(a) a J&D Consultoria',
            lang: 'pt-BR'
        }
    </script>
    @yield('js')
</body>

</html>
