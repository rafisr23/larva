@extends('frontend.layouts.app')

@section('content')
    <!--Main Slider Start-->
    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider" data-swiper-options='{
            "slidesPerView": 1, 
            "loop": true,
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
            }
        }'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="image-layer"
                        style="background-image: url(images/backgrounds/bg1.jpg);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider__social">
                        {{-- <a href="#">facebook</a> --}}
                        {{-- <a href="#">twitter</a> --}}
                        <a href="https://www.instagram.com/larvacreative.id/">instagram</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__title-box-1">
                                        <h2>Creative <br> Solution <br> Here</h2>
                                        <div class="main-slider__title-box-2">
                                            <h2>Creative <br> Solution <br> Here</h2>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <a href="{{ route('user-about') }}" class="thm-btn">Tentang Kami</a>
                                    </div>
                                    <div class="">
                                        <a href="https://wa.me/{{ $contact->phone }}" class="thm-btn">Mulai Konsultasi</a>
                                    </div>
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
                        style="background-image: url(images/backgrounds/bg2.jpg);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider__social">
                        {{-- <a href="#">facebook</a> --}}
                        {{-- <a href="#">twitter</a> --}}
                        <a href="https://www.instagram.com/larvacreative.id/">instagram</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__title-box-1">
                                        <h2>Creative <br> Solution <br> Here</h2>
                                        <div class="main-slider__title-box-2">
                                            <h2>Creative <br> Solution <br> Here</h2>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <a href="{{ route('user-about') }}" class="thm-btn">Tentang Kami</a>
                                    </div>
                                    <div class="">
                                        <a href="https://wa.me/{{ $contact->phone }}" class="thm-btn">Mulai Konsultasi</a>
                                    </div>
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
                        style="background-image: url(images/backgrounds/bg3.jpg);">
                    </div>
                    <!-- /.image-layer -->
                    <div class="main-slider__social">
                        {{-- <a href="#">facebook</a> --}}
                        {{-- <a href="#">twitter</a> --}}
                        <a href="https://www.instagram.com/larvacreative.id/">instagram</a>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__title-box-1">
                                        <h2>Creative <br> Solution <br> Here</h2>
                                        <div class="main-slider__title-box-2">
                                            <h2>Creative <br> Solution <br> Here</h2>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <a href="{{ route('user-about') }}" class="thm-btn">Tentang Kami</a>
                                    </div>
                                    <div class="">
                                        <a href="https://wa.me/{{ $contact->phone }}" class="thm-btn">Mulai Konsultasi</a>
                                    </div>
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
                    <div class="swiper-button-prev" id="main-slider__swiper-button-prev">
                        <span class="icon-arrow-left"></span>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-next">
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
                                <h2 class="section-title__title">Kami Menawarkan <br> Solusi yang Sempurna</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="services-one__top-right">
                            <p class="services-one__top-text">Kami berkomitmen memberikan layanan terbaik yang memenuhi kebutuhan Anda. Dengan fokus pada kepuasan pelanggan, kami hadir dengan solusi efisien dan tim berpengalaman.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-one__bottom">
                <div class="row">
                    @foreach ($service as $item)
                        @if ($loop->iteration <= 5)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                <!--Services One Single-->
                                <div class="services-one__single">
                                    <h3 class="services-one__title"><a href="{{ route('user-services', ['type' => $item->slug]) }}">{{ $item->service_name }}</a></h3>
                                    <div class="services-one__icon">
                                        <span class="icon-online-shopping"></span>
                                    </div>
                                    <div class="services-one__count"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                        <!--Services One Single-->
                        <div class="services-one__view-all">
                            <div class="services-one__view-all-title-box">
                                <h3 class="services-one__view-all-title"><a href="{{ route('user-services') }}">View our <br> all services</a></h3>
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
    {{-- <section class="welcome-one">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Welcome One End-->

    <!--Brand One Start-->
    @if ($partner->count() > 0)
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
                        @foreach ($partner as $item)
                            <div class="swiper-slide">
                                <img src="{{ isset($item->icon) ? asset('storage/' . $item->icon) : asset('images/brand/brand-1-1.png') }}" alt="{{ $item->company_name }}" width="100" height="100">
                            </div><!-- /.swiper-slide -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--Brand One End-->

    <!--Design Studio Start-->
    <section class="design-studio">
        <div class="design-studio-bg-box">
            <div class="design-studio-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: {{ isset($middleImage) ? 'url(storage/' . $middleImage[0]->file_path . ')' : 'url(images/backgrounds/page-header-bg.jpg)' }}">

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
                                <h3 class="odometer" data-count="{{ $service->count() }}">00</h3>
                                <p class="counter-one__text">Layanan</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="200ms">
                                <div class="counter-one__icon">
                                    <span class="icon-recruit"></span>
                                </div>
                                <h3 class="odometer" data-count="{{ $project->count() }}">00</h3>
                                <p class="counter-one__text">Project</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="300ms">
                                <div class="counter-one__icon">
                                    <span class="icon-customer"></span>
                                </div>
                                <h3 class="odometer" data-count="89">00</h3>
                                <p class="counter-one__text">Pelanggan</p>
                            </li>
                            <li class="counter-one__single wow fadeInUp" data-wow-delay="400ms">
                                <div class="counter-one__icon">
                                    <span class="icon-graphic-designer"></span>
                                </div>
                                <h3 class="odometer" data-count="13">00</h3>
                                <p class="counter-one__text">Team</p>
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
                        {{-- <div class="we-care__img">
                            <img src="{{ asset('images/resources/we-care-img.jpg') }}" alt="">
                        </div> --}}
                        <div class="we-care__content">
                            <h3 class="we-care__title">We Care About Business Growths</h3>
                            <p class="we-care__text">Dengan jasa kami, perkembangan bisnismu terjamin.</p>
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
                <span class="section-title__tagline">Project Terbaru</span>
                <h2 class="section-title__title">showcase</h2>
            </div>
            @if (isset($project) && count($project) > 0)
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                            <li data-filter=".filter-item" class="active"><span class="filter-text">Semua</span></li>
                            @foreach ($service as $item)
                                <li data-filter=".{{ $item->slug }}-slug"><span class="filter-text">{{ $item->service_name }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row filter-layout masonary-layout">
                    @foreach ($project as $item)
                        @if ($loop->iteration <= 6)
                        <div class="col-xl-4 col-lg-6 col-md-6 filter-item {{ $item->service->slug }}-slug">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ count($item->projectImage) > 0 ? asset('storage/' . $item->projectImage[0]->file_path) : asset('images/resources/project-one-img-1.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">{{ $item->company_name }}</p>
                                        <h3 class="project-one__title"><a href="{{ route('user-project-detail', $item->slug) }}">{{ $item->project_name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-xl-12">
                        <p>Belum ada project yang ditambahkan.</p>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-xl-12 d-flex align-items-center justify-content-center">
                    <a href="{{ route('user-projects') }}" class="thm-btn welcome-one__btn m-auto">Lihat selengkapnya..</a>
                </div>
            </div>
        </div>
    </section>
    <!--Project One End-->

    <!--Why Choose One Start-->
    {{-- <section class="why-choose-one">
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
    </section> --}}
    <!--Why Choose One End-->

    <!--Testimonial One Start-->
    <section class="testimonial-one">
        <div class="testimonial-one__map"
            style="background-image: url(images/shapes/testimonial-one-map.png)"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">testimoni pelanggan</span>
                <h2 class="section-title__title">Apa kata mereka?</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-one__carousel owl-theme owl-carousel">
                        @foreach ($testimoni as $item)
                            <div class="testimonial-one__single">
                                <div class="testimonial-one__content">
                                    <p class="testimonial-one__text">{{ $item->description }}</p>
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client__img">
                                        <img src="{{ asset('images/resources/user.png') }}" alt="">
                                    </div>
                                    {{-- <h4 class="testimonial-one__name">{{ $item->user->name }}</h4> --}}
                                    <h4 class="testimonial-one__name">Customer {{ $loop->iteration }}</h4>
                                    {{-- <p class="testimonial-one__title">Pelanggan</p> --}}
                                </div>
                            </div>
                        @endforeach
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
                                <h2 class="cta-one__title">kami menawarkan <br> pengalaman terbaik</h2>
                            </div>
                        </div>
                        <div class="cta-one__right">
                            <a href="{{ route('user-contact') }}" class="thm-btn cta-one__btn">let’s get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One End-->

    <!--Best Agency Start-->
    <section class="best-agency about-page-best-agency">
        <div class="best-agency-shape">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="best-agency__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Agency Creative Terbaik</span>
                            <h2 class="section-title__title">Agency Kami adalah solusi dari semuanya!</h2>
                        </div>
                        <ul class="list-unstyled best-agency__points">
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>Terpercaya</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-check"></span>
                                </div>
                                <div class="text">
                                    <p>Terjamin</p>
                                </div>
                            </li>
                        </ul>
                        <div class="best-agency__experience">
                            <div class="best-agency__experience-icon">
                                <span class="icon-social-media"></span>
                            </div>
                            <div class="best-agency__experience-text-box">
                                <p class="best-agency__experience-text">Kami sudah berpengalaman lebih dari 5 tahun.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="best-agency__right">
                        <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                            <div class="accrodion active">
                                <div class="accrodion-title">
                                    <h4>Apa itu sebuah creative agency?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Creative agency adalah perusahaan atau tim profesional yang menyediakan layanan kreatif seperti desain grafis, pemasaran kreatif, produksi video, dan sebagainya.</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion">
                                <div class="accrodion-title">
                                    <h4>Bagaimana proses kerja antara klien dan Larva?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Proses kerja biasanya melibatkan pertemuan awal untuk menetapkan tujuan, perencanaan strategis, tahap desain atau produksi, revisi berdasarkan umpan balik, dan akhirnya, implementasi proyek.</p>
                                    </div><!-- /.inner -->
                                </div>
                            </div>
                            <div class="accrodion last-chiled">
                                <div class="accrodion-title">
                                    <h4>Berapa biaya yang terkait dengan menggunakan jasa dari Larva?</h4>
                                </div>
                                <div class="accrodion-content">
                                    <div class="inner">
                                        <p>Biaya bisa bervariasi tergantung pada lingkup proyek, tingkat kesulitan, dan tingkat keahlian yang diperlukan. Sebaiknya diskusikan secara terperinci dengan Larva untuk mendapatkan perkiraan biaya yang akurat.</p>
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

    <!--Google Map Start-->
    <section class="google-map">
            <iframe src="https://maps.google.com/maps?q=Mustika%20Hegar%20Regency,%20Ruko%20Timur%20No.3%20(%20Samping%20Holland%20Bakery%20)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
            class="google-map__one" allowfullscreen></iframe>
    </section>
    <!--Google Map End-->
@endsection