<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>{{Parametro::get("TITULO_GERAL")}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('site/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,700%7CPoppins:300,400,500,700,900">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/app.css') }}">
    <style>
        .ie-panel{
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);
            clear: both;
            text-align:center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
  </head>
  <body>
    <div class="ie-panel">
        <a href="#">
            <img src="{{ asset('site/images/ie8-panel/warning_bar_0000_us.jpg') }}"
                 height="42"
                 width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>

    <!-- Loading -->
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>{{Parametro::get("TEXTO_LOADING")}}</p>
      </div>
    </div>

    {{--
    <!-- banner acima da pagina principal
    <a class="section section-banner d-none d-xl-block"
       href="#"
       target="_blank"
       style="background-image: url({{ asset('site/images/background-02-1920x60.jpg') }});background-image: -webkit-image-set( url({{ asset('site/images/background-02-1920x60.jpg') }}) 1x, url({{ asset('site/images/background-02-3840x120.jpg') }}) 2x )">
       <img src="{{ asset('site/images/foreground-02-1600x60.png') }}"
        srcset="{{ asset('site/images/foreground-02-1600x60.png') }} 1x, {{ asset('site/images/foreground-02-3200x120.png') }} 2x" alt="" width="1600" height="310">
    </a> --> --}}

    <div class="page">
        <header class="section page-header">
            <!--RD Navbar-->
            <div class="rd-navbar-wrap">
              <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                <div class="rd-navbar-aside-outer rd-navbar-collapse bg-gray-dark">
                  <div class="rd-navbar-aside">
                    <ul class="list-inline navbar-contact-list">
                      <li>
                        <div class="unit unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="icon text-middle fa-phone"></span></div>
                          <div class="unit-body"><a href="https://api.whatsapp.com/send?phone={{Parametro::get("CONTATO_TELEFONE_WHATSAPP")}}&amp;text={{Parametro::get("CONTATO_TEXTO_WHATSAPP")}}">{{Parametro::get("CONTATO_TELEFONE_FORMATADO")}}</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="icon text-middle fa-envelope"></span></div>
                          <div class="unit-body"><a href="mailto:{{Parametro::get("CONTATO_EMAIL")}}">{{Parametro::get("CONTATO_EMAIL")}}</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-spacing-xs align-items-center">
                          <div class="unit-left"><span class="icon text-middle fa-map-marker"></span></div>
                          <div class="unit-body"><a href="{{Parametro::get("CONTATO_ENDERECO_LINK")}}">{{Parametro::get("CONTATO_ENDERECO")}}</a></div>
                        </div>
                      </li>
                    </ul>
                    <ul class="social-links">
                      <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="{{Parametro::get("R_SOCIAL_URL_INSTAGRAM")}}"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-main-outer">
                  <div class="rd-navbar-main">
                    <!--RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                      <!--RD Navbar Toggle-->
                      <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                      <!--RD Navbar Brand-->
                      <div class="rd-navbar-brand">
                        <!--Brand-->
                        <a class="brand" href="#">
                            <span class="justify-content-center ">
                                <img class="brand-logo-dark" src="{{ asset('site/images/logo-default-200x34.png') }}" alt="" width="100" height="17"  align="left"/>
                                <img class="brand-logo-light" src="{{ asset('site/images/logo-inverse-200x34.png') }}" alt="" width="100" height="17" align="left"/>
                                {{--&nbsp;&nbsp;
                                <span class="logotipo text-white font-weight-bold d-inline-flex offset-right-170">J&D</span>--}}
                            </span>
                        </a>
                      </div>
                    </div>
                    <div class="rd-navbar-main-element">
                      <div class="rd-navbar-nav-wrap">
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Home</a></li>

                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </header>

      <!--Main section-->
      <section class="section main-section parallax-scene-js" style="background:url('{{ asset('site/images/bg-1-1700x803.png') }}') no-repeat center center; background-size:cover;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
              <div class="main-decorated-box text-center text-xl-left">
                <h1 class="text-white text-xl-center wow slideInRight" data-wow-delay=".3s"><span class="align-top offset-top-30 d-inline-block font-weight-light prefix-text"></span><span class="big font-weight-bold d-inline-flex offset-right-170">J&D</span></h1>
                <h1 class="text-white text-left wow slideInRight" data-wow-delay=".2s"><span class="align-top offset-top-30 d-inline-block prefix-text"><span class="biggest d-block d-xl-flex font-weight-bold">Consultoria</span></h1>
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
    </div>

    <script src="{{ asset('site/js/core.min.js') }}"></script>
    <script src="{{ asset('site/js/script.js') }}"></script>
    <!--coded by Drel-->
    <script text="text/javascript">

    </script>
  </body>
</html>
