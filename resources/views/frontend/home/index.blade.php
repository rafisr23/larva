@extends('frontend.layouts.app')

@section('content')
    <!--Main Slider Start-->
    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
            "effect": "fade",
            "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
            },
            "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
                "delay": 5000
            }}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url(images/backgrounds/LARVA\ CREATIVE\ WEBSITE-04-min.png);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider__social">
                        <a href="#">facebook</a>
                        <a href="#">twitter</a>
                        <a href="#">instagram</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__title-box-1">
                                        <h2>Creative <br> Talent <br> Here</h2>
                                        <div class="main-slider__title-box-2">
                                            <h2>Creative <br> Talent <br> Here</h2>
                                        </div>
                                    </div>
                                    <a href="about.html" class="thm-btn">About Us</a>
                                    <div class="main-slider-badge">
                                        <img data-tilt src="{{ asset('images/resources/main-slider-badge.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url(images/backgrounds/LARVA\ CREATIVE\ WEBSITE-02-min.png);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider__social">
                        <a href="#">facebook</a>
                        <a href="#">twitter</a>
                        <a href="#">instagram</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__title-box-1">
                                        <h2>Creative <br> Talent <br> Here</h2>
                                        <div class="main-slider__title-box-2">
                                            <h2>Creative <br> Talent <br> Here</h2>
                                        </div>
                                    </div>
                                    <a href="about.html" class="thm-btn">About Us</a>
                                    <div class="main-slider-badge">
                                        <img data-tilt src="{{ asset('images/resources/main-slider-badge.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url(images/backgrounds/LARVA\ CREATIVE\ WEBSITE-01-min.png);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider__social">
                        <a href="#">facebook</a>
                        <a href="#">twitter</a>
                        <a href="#">instagram</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__title-box-1">
                                        <h2>Creative <br> Talent <br> Here</h2>
                                        <div class="main-slider__title-box-2">
                                            <h2>Creative <br> Talent <br> Here</h2>
                                        </div>
                                    </div>
                                    <a href="about.html" class="thm-btn">About Us</a>
                                    <div class="main-slider-badge">
                                        <img data-tilt src="{{ asset('images/resources/main-slider-badge.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="slider-bottom-box clearfix">
                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <span class="icon-arrow-left"></span>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <span class="icon-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Main Slider End-->

    <!--Services One Start-->
    <section class="services-one">
        <div class="services-one-shape" style="background-image: url(images/shapes/services-one-shape.png)">
        </div>
        <div class="container">
            <div class="services-one__top">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="services-one__top-left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Layanan Kami</span>
                                <h2 class="section-title__title">We Shape the <br> Perfect solution</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="services-one__top-right">
                            <p class="services-one__top-text">We are committed to providing our customers with not
                                service while offering our emod tempor incididunt ut labore employees the best
                                training.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-one__bottom">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <h3 class="services-one__title"><a href="mobile-application.html">Merchandise <br>
                                    Gift</a></h3>
                            <div class="services-one__icon">
                                <span class="icon-online-shopping"></span>
                            </div>
                            <div class="services-one__count"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <h3 class="services-one__title"><a href="digital-marketing.html">Konveksi <br> Sablon</a></h3>
                            <div class="services-one__icon">
                                <span class="icon-growth"></span>
                            </div>
                            <div class="services-one__count"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <h3 class="services-one__title"><a href="graphic-designing.html">Design <br>
                                    Studio</a></h3>
                            <div class="services-one__icon">
                                <span class="icon-webpage"></span>
                            </div>
                            <div class="services-one__count"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <h3 class="services-one__title"><a href="website-development.html">Screen <br>
                                    Printing</a></h3>
                            <div class="services-one__icon">
                                <span class="icon-front-end"></span>
                            </div>
                            <div class="services-one__count"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <h3 class="services-one__title"><a href="social-marketing.html">Clothing <br>
                                    Supplier</a></h3>
                            <div class="services-one__icon">
                                <span class="icon-bullhorn"></span>
                            </div>
                            <div class="services-one__count"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                        <!--Services One Single-->
                        <div class="services-one__view-all">
                            <div class="services-one__view-all-title-box">
                                <h3 class="services-one__view-all-title"><a href="services.html">View our <br> all
                                        services</a></h3>
                            </div>
                            <div class="services-one__view-all-arrow">
                                <a href="services.html"><span class="icon-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Services One End-->

    <!--Welcome One Start-->
    <section class="welcome-one">
        <div class="welcome-one-shape wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                src="{{ asset('images/shapes/welcom-one-shape.png') }}" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="welcome-one__left">
                        <div class="welcome-one__img-box">
                            <div class="welcome-one__img">
                                <img src="{{ asset('images/resources/welcome-one-img-1.jpg') }}" alt="">
                            </div>
                            <div class="welcome-one__experience">
                                <div class="welcome-one__experience-icon">
                                    <span class="icon-conversation"></span>
                                </div>
                                <div class="welcome-one__experience-content">
                                    <h3 class="welcome-one__experience-title"><span>15</span> Tahun<br> Pengalaman Kami</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="welcome-one__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Our introductions</span>
                            <h2 class="section-title__title">A leading web & software company</h2>
                        </div>
                        <p class="welcome-one__right-text">There are many variations of passages of lorem ipsum
                            available, but the majority have suffered in some form, by injected humour.</p>
                        <div class="welcome-one__bottom">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="welcome-one__bottom-left">
                                        <h4 class="welcome-one__bottom-title">providing innovative <br> Website
                                            solutions <br> for future.</h4>
                                        <ul class="list-unstyled welcome-one__points">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Nsectetur cing elit</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Suspe ndisse suscipit sagittis leo</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <p> Entum estib dignissim posuere</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-tick"></span>
                                                </div>
                                                <div class="text">
                                                    <p>If you are going to use a pass</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="welcome-one__person">
                                            <div class="welcome-one__person-img">
                                                <img src="{{ asset('images/resources/welcome-one-person-img.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="welcome-one__person-sign">
                                                <h3>J. Albert</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="welcome-one__bottom-right">
                                        <div class="welcome-one__bottom-right-content">
                                            <div class="welcome-one__bottom-right-icon">
                                                <span class="icon-help"></span>
                                            </div>
                                            <h4 class="welcome-one__bottom-right-title">How Can mibooz Help Your
                                                business to grow</h4>
                                            <a href="about.html" class="thm-btn welcome-one__btn">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Welcome One End-->

    <!--Brand One Start-->
    <section class="brand-one">
        <div class="container">
            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 5
                }
                }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                    </div><!-- /.swiper-slide -->
                </div>
            </div>
        </div>
    </section>
    <!--Brand One End-->

    <!--Design Studio Start-->
    <section class="design-studio">
        <div class="design-studio-bg-box">
            <div class="design-studio-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(images/backgrounds/design-studio-bg.jpg)">

            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <div class="design-studio__inner">
                    <h2 class="design-studio__title">Design <span>Studio</span> that gets <br> excited about</h2>
                    <div class="design-studio__video-link">
                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                            <div class="design-studio__video-icon">
                                <span class="icon-play-button"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Design Studio End-->

    <!--Counter One Start-->
    <section class="counter-one">
        <div class="counter-one__inner">
            <div class="counter-one-pattern"
                style="background-image: url(images/shapes/counter-one-pattern.png)"></div>
            <div class="counter-one__box-one"></div>
            <div class="counter-one__box-two"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="list-unstyled counter-one__list">
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="100ms">
                                <div class="counter-one__icon">
                                    <span class="icon-recommend"></span>
                                </div>
                                <h3 class="odometer" data-count="578">00</h3>
                                <p class="counter-one__text">Projects Completed</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms">
                                <div class="counter-one__icon">
                                    <span class="icon-recruit"></span>
                                </div>
                                <h3 class="odometer" data-count="56">00</h3>
                                <p class="counter-one__text">Active Clients</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms">
                                <div class="counter-one__icon">
                                    <span class="icon-customer"></span>
                                </div>
                                <h3 class="odometer" data-count="763">00</h3>
                                <p class="counter-one__text">Satisfied Clients</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="400ms">
                                <div class="counter-one__icon">
                                    <span class="icon-graphic-designer"></span>
                                </div>
                                <h3 class="odometer" data-count="36">00</h3>
                                <p class="counter-one__text">Expert Teams</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Counter One End-->

    <!--We Care Start-->
    <section class="we-care">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="we-care__inner">
                        <div class="we-care__img">
                            <img src="{{ asset('images/resources/we-care-img.jpg') }}" alt="">
                        </div>
                        <div class="we-care__content">
                            <h3 class="we-care__title">We Care About Business Growths</h3>
                            <p class="we-care__text">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--We Care End-->

    <!--Project One Start-->
    <section class="project-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">recent projects</span>
                <h2 class="section-title__title">work showcase</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                        <li data-filter=".filter-item" class="active"><span class="filter-text">Semua</span></li>
                        <li data-filter=".bra"><span class="filter-text">Konveksi</span></li>
                        <li data-filter=".photo"><span class="filter-text">Design Studio</span></li>
                        <li data-filter=".web"><span class="filter-text">Merchandise & Gift</span></li>
                        <li data-filter=".app"><span class="filter-text last-pd-none">Clothing Suppliers</span></li>
                    </ul>
                </div>
            </div>
            <div class="row filter-layout masonary-layout">
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra photo web">
                    <!--Portfolio One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src="{{ asset('images/resources/project-one-img-1.jpg') }}" alt="">
                            <div class="project-one__hover">
                                <p class="project-one__tagline">Graphic</p>
                                <h3 class="project-one__title"><a href="project-details.html">Fimlor Experience</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra app web">
                    <!--Portfolio One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src="{{ asset('images/resources/project-one-img-2.jpg') }}" alt="">
                            <div class="project-one__hover">
                                <p class="project-one__tagline">Graphic</p>
                                <h3 class="project-one__title"><a href="project-details.html">Fimlor Experience</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra web">
                    <!--Portfolio One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src="{{ asset('images/resources/project-one-img-3.jpg') }}" alt="">
                            <div class="project-one__hover">
                                <p class="project-one__tagline">Graphic</p>
                                <h3 class="project-one__title"><a href="project-details.html">Fimlor Experience</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra photo web">
                    <!--Portfolio One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src="{{ asset('images/resources/project-one-img-4.jpg') }}" alt="">
                            <div class="project-one__hover">
                                <p class="project-one__tagline">Graphic</p>
                                <h3 class="project-one__title"><a href="project-details.html">Fimlor Experience</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item bra web">
                    <!--Portfolio One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src="{{ asset('images/resources/project-one-img-5.jpg') }}" alt="">
                            <div class="project-one__hover">
                                <p class="project-one__tagline">Graphic</p>
                                <h3 class="project-one__title"><a href="project-details.html">Fimlor Experience</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item app photo">
                    <!--Portfolio One Single-->
                    <div class="project-one__single">
                        <div class="project-one__img">
                            <img src="{{ asset('images/resources/project-one-img-6.jpg') }}" alt="">
                            <div class="project-one__hover">
                                <p class="project-one__tagline">Graphic</p>
                                <h3 class="project-one__title"><a href="project-details.html">Fimlor Experience</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Project One End-->

    <!--Why Choose One Start-->
    <section class="why-choose-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="why-choose-one__left">
                        <div class="why-choose-one__img">
                            <img src="{{ asset('images/resources/why-choose-one-img.jpg') }}" alt="">
                        </div>
                        <div class="why-choose-one-box-1"></div>
                        <div class="why-choose-one-box-2"></div>
                        <div class="why-choose-one-box-3"></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="why-choose-one__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">why choose us</span>
                            <h2 class="section-title__title">We do more then ever platform</h2>
                        </div>
                        <p class="why-choose-one__right-text">There are many variations of passages of lorem ipsum
                            available, but the majority have suffered in some form, by injected free text not
                            humour.</p>
                        <div class="why-choose-one__content">
                            <div class="why-choose-one__content-img">
                                <img src="{{ asset('images/resources/why-choose-one-content-img.jpg') }}" alt="">
                            </div>
                            <div class="why-choose-one__content-list">
                                <ul class="list-unstyled why-choose-one__points">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Nsectetur cing elit</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Suspe ndisse suscip sagittis leo</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>Entum estib dignissim posuere</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-check"></span>
                                        </div>
                                        <div class="text">
                                            <p>If you are going to use a pass</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="why-choose-one__progress">
                            <div class="why-choose-one__progress-single">
                                <h4 class="why-choose-one__progress-title">Digital marketing</h4>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="66%">
                                        <div class="count-text">66%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose One End-->

    <!--Testimonial One Start-->
    <section class="testimonial-one">
        <div class="testimonial-one__map"
            style="background-image: url(images/shapes/testimonial-one-map.png)"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">our customer feedbacks</span>
                <h2 class="section-title__title">What they’re saying</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-one__carousel owl-theme owl-carousel">
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__content">
                                <p class="testimonial-one__text">I was very impresed by the mibooz service and their
                                    work of quality lorem ipsum is simply free text used by copy typing refreshing.
                                    Neque porro est qui ipsum.</p>
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client__img">
                                    <img src="{{ asset('images/testimonial/testimonial-one-img-1.jpg') }}" alt="">
                                </div>
                                <h4 class="testimonial-one__name">Jessica Brown</h4>
                                <p class="testimonial-one__title">Customer</p>
                            </div>
                        </div>
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__content">
                                <p class="testimonial-one__text">I was very impresed by the mibooz service and their
                                    work of quality lorem ipsum is simply free text used by copy typing refreshing.
                                    Neque porro est qui ipsum.</p>
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client__img">
                                    <img src="{{ asset('images/testimonial/testimonial-one-img-1.jpg') }}" alt="">
                                </div>
                                <h4 class="testimonial-one__name">kevin martin</h4>
                                <p class="testimonial-one__title">Customer</p>
                            </div>
                        </div>
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__content">
                                <p class="testimonial-one__text">I was very impresed by the mibooz service and their
                                    work of quality lorem ipsum is simply free text used by copy typing refreshing.
                                    Neque porro est qui ipsum.</p>
                            </div>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client__img">
                                    <img src="{{ asset('images/testimonial/testimonial-one-img-1.jpg') }}" alt="">
                                </div>
                                <h4 class="testimonial-one__name">sarah rose</h4>
                                <p class="testimonial-one__title">Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial One End-->

    <!--CTA One Start-->
    <section class="cta-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__inner">
                        <div class="cta-one__box-1"></div>
                        <div class="cta-one__box-2"></div>
                        <div class="cta-one__left">
                            <div class="cta-one__icon">
                                <span class="icon-consulting"></span>
                            </div>
                            <div class="cta-one__title-box">
                                <h2 class="cta-one__title">we’re delivering the best <br> customer experience</h2>
                            </div>
                        </div>
                        <div class="cta-one__right">
                            <a href="contact.html" class="thm-btn cta-one__btn">let’s get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One End-->

    <!--Best Agency Start-->
    <section class="best-agency">
        <div class="best-agency-shape" style="background-image: url(assets/images/shapes/best-agency-shape.png)">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="best-agency__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">best creative agency</span>
                            <h2 class="section-title__title">Our Agency all soltutions</h2>
                        </div>
                        <ul class="list-unstyled best-agency__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>Reliable and Proven</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>Best Team Members</p>
                                </div>
                            </li>
                        </ul>
                        <div class="best-agency__experience">
                            <div class="best-agency__experience-icon">
                                <span class="icon-social-media"></span>
                            </div>
                            <div class="best-agency__experience-text-box">
                                <p class="best-agency__experience-text">We have <span>30+</span> years of
                                    experiences for give
                                    you <br> better quality results.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="best-agency__right">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>We Help to Create Visual Strategies</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>There are many variations of passages the majority have suffered
                                            alteration in some fo injected humour, or randomised words believable.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>Motion Graphics & Animations</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>There are many variations of passages the majority have suffered
                                            alteration in some fo injected humour, or randomised words believable.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion last-chiled">
                                <div class="accrodion-title">
                                    <h4>We Help to Achieve Mutual Goals</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>There are many variations of passages the majority have suffered
                                            alteration in some fo injected humour, or randomised words believable.
                                        </p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Best Agency End-->

    <!--Blog One Start-->
    <section class="blog-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">directly from the blog</span>
                <h2 class="section-title__title">What’s happening?</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-one-img-1.jpg') }}" alt="">
                            <a href="blog-details.html">
                                <span class="blog-one__plus"></span>
                            </a>
                            <div class="blog-one__date">
                                <p>26 aug</p>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-one__title">
                                <a href="blog-details.html">How much does a website cost to build</a>
                            </h3>
                            <div class="blog-one__read-btn">
                                <a href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-one-img-1.jpg') }}" alt="">
                            <a href="blog-details.html">
                                <span class="blog-one__plus"></span>
                            </a>
                            <div class="blog-one__date">
                                <p>26 aug</p>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-one__title">
                                <a href="blog-details.html">Uniquely enable accurate supply chains</a>
                            </h3>
                            <div class="blog-one__read-btn">
                                <a href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-one-img-1.jpg') }}" alt="">
                            <a href="blog-details.html">
                                <span class="blog-one__plus"></span>
                            </a>
                            <div class="blog-one__date">
                                <p>26 aug</p>
                            </div>
                        </div>
                        <div class="blog-content">
                            <ul class="list-unstyled blog-one__meta">
                                <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-one__title">
                                <a href="blog-details.html">task researched data enterprise process</a>
                            </h3>
                            <div class="blog-one__read-btn">
                                <a href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog One End-->

    <!--Google Map Start-->
    <section class="google-map">
            <iframe src="https://maps.google.com/maps?q=Mustika%20Hegar%20Regency,%20Ruko%20Timur%20No.3%20(%20Samping%20Holland%20Bakery%20)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
            class="google-map__one" allowfullscreen></iframe>
    </section>
    <!--Google Map End-->
@endsection