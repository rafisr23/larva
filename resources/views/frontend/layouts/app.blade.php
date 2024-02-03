<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Larva Creative Industry</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Mibooz HTML Template For Business" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Federo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('images/loader.png') }}" alt="" />
    </div>
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

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


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
    <!-- template js -->
    <script src="{{ asset('js/mibooz.js') }}"></script>
</body>

</html>