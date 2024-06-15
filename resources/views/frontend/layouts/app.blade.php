<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/larva-logo.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/larva-logo.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/larva-logo.png') }}" />
    <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Federo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Meta Tag for SEO -->
    @if (request()->routeIs('blog.show'))
        {!! seo()->for($blog) !!}
        {{-- meta keyword --}}
        <meta name="keywords" content="{{ $blog->meta_keyword }}" />
        {{-- meta published_time --}}
        <meta property="article:published_time" content="{{ \Carbon\Carbon::parse($blog->published_at) }}" />
        {{-- meta modified_time --}}
        <meta property="article:modified_time" content="{{ \Carbon\Carbon::parse($blog->modified_at) }}" />
        {{-- meta author --}}
    @else
        <title>Larva Creative Industry</title>
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
    @endif


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
    <link rel="stylesheet" href="{{ asset('css/mibooz-2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/mibooz-responsive.css') }}" />
    <!-- css assets end-->

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- crisp -->
    {{-- <script type="text/javascript">
        window.$crisp=[];
        window.CRISP_WEBSITE_ID="b204ec33-0744-4a99-8df2-4cd346fc30eb";

        @if (Auth::check())
            window.CRISP_TOKEN_ID = "{{ Auth::user()->uuid ?? '' }}";
            // window.$crisp.push(["set", "user:email", "{{ Auth::user()->email }}"]);
            (function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
            $crisp.push(["set", "user:email", ["{{ Auth::user()->email }}"]]);
            $crisp.push(["set", "user:nickname", ["{{ Auth::user()->name }}"]]);
        @endif
    </script> --}}

    {{-- if env is production --}}
    @production
        {{-- <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.ga4.measurementId') }}"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ config('services.ga4.measurementId') }}');
        </script> --}}
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-SV1TMCPCJ2"></script>
        {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16581780539"></script> --}}
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-SV1TMCPCJ2');
            gtag('config', 'AW-16581780539');

            function gtag_report_conversion(url) {
                var callback = function () {
                    if (typeof(url) != 'undefined') {
                        window.location = url;
                    }
                };
                gtag('event', 'conversion', {
                    'send_to': 'AW-16581780539/E_rsCNiqxbMZELvI5-I9',
                    'event_callback': callback
                });
                return false;
            }
        </script>
    @endproduction
    
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


    {{-- Chat --}}
    <div class="shortcut-chat p-3 m-auto">
        <a href="https://wa.me/{{ $contact->phone }}" target="_blank" type="button" class="btn fs-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height:60px; background-color: #25D366;" onclick="console.log(this.href)">
            <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>WhatsApp</title>
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="#FFF"/>
            </svg>
        </a>
    </div>

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