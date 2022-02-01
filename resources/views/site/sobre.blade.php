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
                    </div>

                    <div class="offset-top-20">
                        <div class="section-name wow fadeInRight" data-wow-delay=".2s">
                            Alguns serviços prestados
                        </div>

                        <!--Linear progress bar-->
                        @foreach (\App\Http\Controllers\Admin\ServicosController::getServicosAleatorios(4) as $servico)
                            @if($servico->idpai == "")
                            <article class="progress-linear" style="margin-top: 10px;">
                                <div class="">
                                    <p class="font-weight-bold text-gray-dark wow fadeInUp" data-wow-delay=".4s">{{$servico->nome}}</p>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated button-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
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
    <section id="servicos" class="section section-md bg-xs-overlay" style="background:url('images/bg-image-3-1700x883.jpg')no-repeat;background-size:cover">
        <div class="container">
        <div class="row row-50 justify-content-center">
            <div class="col-12 text-center col-md-10 col-lg-8">
                <div class="section-name wow fadeInRight" data-wow-delay=".2s">Descubra Nossos Serviços</div>
                <h3 class="wow fadeInLeft" data-wow-delay=".3s">Uma lista especial de serviços <span class="text-primary"> Para Você</span></h3>
                <p>Nós temos a melhor assessoria</p>
            </div>
        </div>

        <div class="row justify-content-center" >
            @foreach (\App\Http\Controllers\Admin\ServicosController::getServicos() as $servico)
                @if($servico->idpai == "")

                        <div class="col-xl-4 col-md-6 col-12 wow fadeInDown" data-wow-delay=".3s">
                            <div class="pricing-box bg-gray-primary" style="margin-bottom:25px; height:489px !important;">
                                <h4 style="position: absolute; top:10%; right:6%; left:6%;">{{$servico->nome}}</h4>
                                <hr style="position: absolute; top:21%; right:6%; left:6%;">
                                <p style="position: absolute; top:26%; right:5%; left:5%;"> {{$servico->descricao}}</p>
                                <a class="button button-190 button-circle btn-light-rounded" href="#" style="position: absolute; bottom:10%; left:25%;">Veja Mais</a>
                            </div>
                        </div>

                @endif
            @endforeach
        </div>

        </div>
    </section>


@endsection

@section('js')
    <script>
        $(document).ready(function(){
            var maxHeight = 0;

            $('.inner').each(function() {
                maxHeight = Math.max(maxHeight, $(this).height());
            });

            $('.lhs_content .inner, .rhs_content .inner').css({height:maxHeight + 'px'});

        });
	</script>
@stop

