<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Larva Creative Industry</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/larva-logo.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/larva-logo.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/larva-logo.png') }}" />
    <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Mibooz HTML Template For Business" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Federo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- meta tag for SEO --}}
    <meta name="application-name" content="Larva Creative Industry" />
    <meta name="description" content="Larva Creative Industry adalah perusahaan jasa yang berlokasi di Bandung, Indonesia. Kami spesialis dalam pembuatan merchandise and gift, konveksi sablon, design studio, screen printing, clothing supplier, dan layanan web development. Keunggulan kami meliputi pelayanan murah, cepat, terpercaya, terjamin, dengan kualitas terbaik. Dapatkan harga bersaing dari kami yang ramah dan berkomitmen memberikan solusi terbaik untuk kebutuhan kreatif Anda." />
    <meta name="keywords" content="Larva Creative Industry, Perusahaan Jasa, Bandung, Indonesia, Pembuatan merchandise, gift, konveksi sablon, design studio, screen printing, clothing supplier, web development, murah, cepat, terpercaya, terjamin, kualitas terbaik, harga bersaing, ramah" />
    <meta name="author" content="Larva Creative Industry" />
    <meta name="robots" content="index, follow" />
    <meta name="language" content="Indonesia" />
    <meta name="web_author" content="Larva Creative Industry" />
    <meta name="distribution" content="global" />
    <meta name="apple-mobile-web-app-title" content="Larva Creative Industry" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="HandheldFriendly" content="True" />

    <link rel="stylesheet" href="{{ asset('vendors-mibooz/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/mibooz-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/the-sayinistic-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors-mibooz/jquery-ui/jquery-ui.css') }}" />

    <!-- css assets styles -->
    <link rel="stylesheet" href="{{ asset('css/mibooz.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/mibooz-responsive.css') }}" />
    <!-- css assets end-->

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- crisp -->
    <script type="text/javascript">
        window.$crisp=[];
        window.CRISP_WEBSITE_ID="b204ec33-0744-4a99-8df2-4cd346fc30eb";

        @if (Auth::check())
            window.CRISP_TOKEN_ID = "{{ Auth::user()->uuid ?? '' }}";
            // window.$crisp.push(["set", "user:email", "{{ Auth::user()->email }}"]);
            (function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
            $crisp.push(["set", "user:email", ["{{ Auth::user()->email }}"]]);
            $crisp.push(["set", "user:nickname", ["{{ Auth::user()->name }}"]]);
        @endif
    </script>
    
</head>

<body>
    {{-- <div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('images/loader.png') }}" alt="" />
    </div> --}}
    <!-- /.preloader -->
    <div class="page-wrapper">
        {{-- Navbar --}}
        @include('frontend.layouts.navbar')

        {{-- Main Content --}}
		<div class="">
			@yield('content')
		</div>

        {{-- Footer --}}
		@include('frontend.layouts.footer')

    </div><!-- /.page-wrapper -->


    {{-- mobile wrapper --}}
    @include('frontend.layouts.mobile')

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->


    @if (!Auth::check())
        {{-- Chat --}}
        <div class="shortcut-chat p-3 ">
            <button onclick="window.location.href='/login';" id="btn-chat" class="btn btn-dark fs-3 rounded-circle" style="width: 60px; height:60px">
                {{-- <span class="cc-ci26 cc-4yys" style="background-image: url(&quot;https://image.crisp.chat/avatar/operator/f71c5580-d2c8-445e-b18b-65f8c4dfe65a/240/?1708939348972&quot;) !important;"></span><button --}}
                {{-- <i class="fa fa-comments"></i> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/></svg>
                {{-- <span class="cc-imbb cc-qfnu" data-has-unread="false"><span data-id="chat_opened" class="cc-11f2" data-is-ongoing="false"><span class="cc-15e7"><span class="cc-1d2k cc-18ij"><span class="cc-ci26 cc-4yys" style="background-image: url(&quot;https://image.crisp.chat/avatar/operator/f71c5580-d2c8-445e-b18b-65f8c4dfe65a/240/?1708939348972&quot;) !important;"></span></span></span><span class="cc-1ygf"></span><!--v-if--></span></span> --}}
            </button>
        </div>

    @endif

    {{-- <a href="#" data-target="html" class="scroll-to-target scroll-to-top mb-5"><i class="fa fa-angle-up"></i></a> --}}


    <script src="{{ asset('vendors-mibooz/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/wow/wow.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/isotope/isotope.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('vendors-mibooz/jquery-tilt/tilt.jquery.min.js') }}"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@18.0.0/dist/lazyload.min.js"></script>
    <!-- template js -->
    <script src="{{ asset('js/mibooz.js') }}"></script>

    <script src="{{ asset('js/crisp-config.js') }}"></script>

    <script>
        const swiperOptions = {
        loop: true,
        slidesPerView: "auto",
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
            on: {
            // LazyLoad swiper images after swiper initialization
            afterInit: (swiper) => {
                new LazyLoad({
                container: swiper.el,
                cancel_on_exit: false
                });
            }
            }
        };

        const eagerSwiper = new Swiper(".swiper--eager", swiperOptions);

        var swiperLazyLoadInstance = new LazyLoad({
            elements_selector: ".swiper--lazy",
            unobserve_entered: true,
            callback_enter: function (swiperElement) {
                new Swiper("#" + swiperElement.id, swiperOptions);
            },
            data_src: "src",
        });
        
        var LazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy",
            data_src: "src",
        });
    </script>

    {{-- <script>
        window.storagePath = '{{ asset('storage/') }}';
    </script>
    <script src="{{ asset('js/service-images.js') }}"></script> --}}

    @stack('scripts')
</body>

</html>