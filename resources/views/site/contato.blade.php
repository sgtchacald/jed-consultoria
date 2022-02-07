@extends('site.layouts.principal')

@section('conteudo')
    {{-- Introdução da Pagina --}}
    <section class="section section-intro context-dark">
        <div class="intro-bg"
            style="background: url({{ asset('site/images/intro-pagina-contato.jpg') }}) no-repeat;background-size:cover;background-position: top center;">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <h1 class="font-weight-bold wow fadeInLeft">{{ Parametro::get('PG_CONTATO_TITULO') }}</h1>
                    <p class="intro-description wow fadeInRight">{{ Parametro::get('PG_CONTATO_TITULO_TEXTO') }}.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulário de envio de email -->
    <section class="section section-md">
        <div class="container">
            <!--RD Mailform-->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8 col-12">
                    <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact"
                        method="post" action="">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-name">{{ Config::get('label.nome') }}<span
                                    class="req-symbol">*</span></label>
                            <input class="form-input" id="contact-name" type="text" name="name"
                                data-constraints="@Required">
                        </div>
                        <div class="form-wrap">
                            <label class="form-label" for="contact-phone">{{ Config::get('label.telefone') }}<span
                                    class="req-symbol">*</span></label>
                            <input class="form-input" id="contact-phone" type="text" name="phone"
                                data-constraints="@Required @PhoneNumber">
                        </div>
                        <div class="form-wrap">
                            <label class="form-label" for="contact-email">{{ Config::get('label.email') }}<span
                                    class="req-symbol">*</span></label>
                            <input class="form-input" id="contact-email" type="email" name="email"
                                data-constraints="@Required @Email">
                        </div>
                        <div class="form-wrap">
                            <label class="form-label label-textarea"
                                for="contact-message">{{ Config::get('label.mensagem') }}<span
                                    class="req-symbol">*</span></label>
                            <textarea class="form-input" id="contact-message" name="message"
                                data-constraints="@Required"></textarea>
                        </div>
                        <!--Google captcha-->
                        <div class="form-wrap text-left form-validation-left">
                            <div class="recaptcha" id="captcha1"
                                data-sitekey="6LfZlSETAAAAAC5VW4R4tQP8Am_to4bM3dddxkEt"></div>
                        </div>
                        <div class="form-button group-sm text-center text-lg-left">
                            <button class="button button-primary" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Google Maps-->
    <section class="section">
        <!--Please, add the data attribute data-key="YOUR_API_KEY" in order to insert your own API key for the Google map.-->
        <!--Please note that YOUR_API_KEY should replaced with your key.-->
        <!--Example: <div class="google-map-container" data-key="YOUR_API_KEY">-->
        <div class="google-map-container contacts-map" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45."
            data-zoom="5" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png"
            data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
            <div class="google-map"></div>
            <ul class="google-map-markers">
                <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45."
                    data-description="9870 St Vincent Place, Glasgow"></li>
            </ul>
        </div>
    </section>


@endsection
