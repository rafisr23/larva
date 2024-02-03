@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(images/backgrounds/page-header-bg.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li>About</li>
                </ul>
                <h2>About us</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--About Page Start-->
    <section class="about-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-page__left">
                        <ul class="list-unstyled about-page__images">
                            <li>
                                <div class="about-page__img-1">
                                    <img src="{{ asset('images/resources/about-page-img-1.jpg') }}" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="about-page__img-2">
                                    <img src="{{ asset('images/resources/about-page-img-1.jpg') }}" alt="">
                                </div>
                            </li>
                        </ul>
                        <div class="about-page__badge"><img data-tilt
                                src="{{ asset('images/resources/about-page-badge.png') }}" alt=""></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-page__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">about company</span>
                            <h2 class="section-title__title">get to know about agency</h2>
                        </div>
                        <p class="about-page__right-text-1">There are many variations of pass of lorem ipsum
                            available but the majority have suffered alteration in some Injected humour randomised
                            words.</p>
                        <h4 class="about-page__right-text-2">providing innovative Website solutions for future.</h4>
                        <a href="about.html" class="thm-btn abut-page__btn">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Page End-->

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
    <section class="design-studio services-page-design-studio">
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

    <!--Testimonial Two Start-->
    <section class="testimonial-two about-page-testimonial-two">
        <div class="testimonial-two-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                src="{{ asset('images/shapes/testimonial-two-shape.png') }}" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="testimonial-two__left wow slideInLeft" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="testimonial-two__img">
                            <img src="{{ asset('images/testimonial/testimonial-two-img.jpg') }}" alt="">
                            <div class="testimonial-two__content">
                                <h3 class="testimonial-two__title">#Happy <span>Customers</span></h3>
                            </div>
                            <div class="testimonial-two__box-1"></div>
                            <div class="testimonial-two__box-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testimonial-two__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">our customer feedbacks</span>
                            <h2 class="section-title__title">What they’re saying</h2>
                        </div>
                        <div class="testimonial-two__carousel owl-theme owl-carousel">
                            <!--Testimonial Two Single-->
                            <div class="testimonial-two__single">
                                <p class="testimonial-two__text">This is due to their excellent service, competitive
                                    pricing and customer support. It’s throughly refresing to get such a personal
                                    touch. Duis aute lorem ipsum is simply free text irure dolor in reprehen.</p>
                                <div class="testimonial-two__client-info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('images/testimonial/testimonial-one-img-2.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__client-details">
                                        <h4 class="testimonial-two__client-name">kevin martin</h4>
                                        <p class="testimonial-two__client-title">Customer</p>
                                    </div>
                                </div>
                            </div>
                            <!--Testimonial Two Single-->
                            <div class="testimonial-two__single">
                                <p class="testimonial-two__text">This is due to their excellent service, competitive
                                    pricing and customer support. It’s throughly refresing to get such a personal
                                    touch. Duis aute lorem ipsum is simply free text irure dolor in reprehen.</p>
                                <div class="testimonial-two__client-info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('images/testimonial/testimonial-one-img-2.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__client-details">
                                        <h4 class="testimonial-two__client-name">Jessica Brown</h4>
                                        <p class="testimonial-two__client-title">Customer</p>
                                    </div>
                                </div>
                            </div>
                            <!--Testimonial Two Single-->
                            <div class="testimonial-two__single">
                                <p class="testimonial-two__text">This is due to their excellent service, competitive
                                    pricing and customer support. It’s throughly refresing to get such a personal
                                    touch. Duis aute lorem ipsum is simply free text irure dolor in reprehen.</p>
                                <div class="testimonial-two__client-info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('images/testimonial/testimonial-one-img-2.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__client-details">
                                        <h4 class="testimonial-two__client-name">sarah rose</h4>
                                        <p class="testimonial-two__client-title">Customer</p>
                                    </div>
                                </div>
                            </div>
                            <!--Testimonial Two Single-->
                            <div class="testimonial-two__single">
                                <p class="testimonial-two__text">This is due to their excellent service, competitive
                                    pricing and customer support. It’s throughly refresing to get such a personal
                                    touch. Duis aute lorem ipsum is simply free text irure dolor in reprehen.</p>
                                <div class="testimonial-two__client-info">
                                    <div class="testimonial-two__client-img">
                                        <img src="{{ asset('images/testimonial/testimonial-one-img-2.jpg') }}" alt="">
                                    </div>
                                    <div class="testimonial-two__client-details">
                                        <h4 class="testimonial-two__client-name">kevin martin</h4>
                                        <p class="testimonial-two__client-title">Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial Two End-->

    <!--Team One Start-->
    <section class="team-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">people behind it</span>
                <h2 class="section-title__title">meet the team</h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <!--Team One Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{ asset('images/team/team-one-img-1.jpg') }}" alt="">
                            <div class="team-one__details">
                                <p class="team-one__title">Developer</p>
                                <h4 class="team-one__name">Sarah albert</h4>
                            </div>
                            <div class="team-one__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <!--Team One Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{ asset('images/team/team-one-img-1.jpg') }}" alt="">
                            <div class="team-one__details">
                                <p class="team-one__title">Developer</p>
                                <h4 class="team-one__name">Sarah albert</h4>
                            </div>
                            <div class="team-one__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="600ms">
                    <!--Team One Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{ asset('images/team/team-one-img-1.jpg') }}" alt="">
                            <div class="team-one__details">
                                <p class="team-one__title">Developer</p>
                                <h4 class="team-one__name">Sarah albert</h4>
                            </div>
                            <div class="team-one__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="800ms">
                    <!--Team One Single-->
                    <div class="team-one__single">
                        <div class="team-one__img">
                            <img src="{{ asset('images/team/team-one-img-1.jpg') }}" alt="">
                            <div class="team-one__details">
                                <p class="team-one__title">Developer</p>
                                <h4 class="team-one__name">Sarah albert</h4>
                            </div>
                            <div class="team-one__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Team One End-->

    <!--Best Agency Start-->
    <section class="best-agency about-page-best-agency">
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
                                <p class="best-agency__experience-text">We have 30+ years of experiences for give
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
@endsection