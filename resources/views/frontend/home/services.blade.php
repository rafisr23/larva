@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: {{ isset($headerImage) ? 'url(storage/' . $headerImage[0]->file_path . ')' : 'url(images/backgrounds/page-header-bg.jpg)' }}">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('user-index') }}">Beranda</a></li>
                    <li>Layanan</li>
                </ul>
                <h2>Layanan</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Services Three Start-->
    <section class="services-three">
        <div class="services-three-shape"
            style="background-image: url(shapes/services-three-shape.png)"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Lihat layanan kami</span>
                <h2 class="section-title__title">apa yang kami tawarkan</h2>
            </div>
            <div class="services-three__top">
                <div class="row">
                    @foreach ($service as $item)
                        @if($loop->iteration <= 3)
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                                <!--Services Three Single-->
                                <div class="services-three__single">
                                    <div class="services-three_icon">
                                        {{-- <span class="icon-online-shopping"></span> --}}
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 13a5 5 0 0 1-5-5h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2a5 5 0 0 1-5 5m0-10a3 3 0 0 1 3 3H9a3 3 0 0 1 3-3m7 3h-2a5 5 0 0 0-5-5a5 5 0 0 0-5 5H5c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2"/>
                                        </svg> --}}
                                        <span class="icon-service">
                                            @if (isset($item->icon))
                                                <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->service_name }}-icon" width="96" height="96">
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12 13a5 5 0 0 1-5-5h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2a5 5 0 0 1-5 5m0-10a3 3 0 0 1 3 3H9a3 3 0 0 1 3-3m7 3h-2a5 5 0 0 0-5-5a5 5 0 0 0-5 5H5c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2"/>
                                                </svg>
                                            @endif
                                        </span>
                                    </div>
                                    <h3 class="services-three__title"><a href="{{ route('user-services', ['type' => $item->slug]) }}">{{ $item->service_name }}</a></h3>
                                    <p class="services-three__text">{{ $item->tagline }}</p>
                                    <div class="services-three__btn-box">
                                        <a href="{{ route('user-services', ['type' => $item->slug]) }}" class="services-three__btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Services Three Single-->
                        <div class="services-three__single">
                            <div class="services-three_icon">
                                <span class="icon-online-shopping"></span>
                            </div>
                            <h3 class="services-three__title"><a href="mobile-application.html">mobile <br>
                                    application</a></h3>
                            <p class="services-three__text">Lorem ipsum is noted are many variations of have in pass
                                majy.</p>
                            <div class="services-three__btn-box">
                                <a href="mobile-application.html" class="services-three__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                        <!--Services Three Single-->
                        <div class="services-three__single">
                            <div class="services-three_icon">
                                <span class="icon-growth"></span>
                            </div>
                            <h3 class="services-three__title"><a href="digital-marketing.html">digital <br>
                                    marketing</a></h3>
                            <p class="services-three__text">Lorem ipsum is noted are many variations of have in pass
                                majy.</p>
                            <div class="services-three__btn-box">
                                <a href="digital-marketing.html" class="services-three__btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                        <!--Services Three Single-->
                        <div class="services-three__single">
                            <div class="services-three_icon">
                                <span class="icon-front-end"></span>
                            </div>
                            <h3 class="services-three__title"><a href="website-development.html">Website <br>
                                    development</a></h3>
                            <p class="services-three__text">Lorem ipsum is noted are many variations of have in pass
                                majy.</p>
                            <div class="services-three__btn-box">
                                <a href="website-development.html" class="services-three__btn">Read More</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!--Services Three End-->

    <!--Two Boxes Start-->
    <section class="two-boxes">
        <div class="container">
            <div class="row">
                @foreach ($service as $item)
                    @if($loop->iteration <= 2)
                        <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <!--Two Boxes Single-->
                            <div class="two-boxes__single">
                                <div class="two-boxes__bg" style="background-image: {{ isset($item->serviceImage[0  ]) ? url('storage/' . $item->serviceImage[0]->file_path) : 'url(images/backgrounds/two-boxes-bg-1.jpg)'}}"></div>
                                <p class="two-boxes__tagline">{{ $item->service_name }}</p>
                                <h4 class="two-boxes__title">{!! $item->description !!}</h4>
                                <div class="two-boxes__arrow">
                                    <a href="{{ route('user-services', ['type' => $item->slug]) }}"><span class="icon-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!--Two Boxes End-->

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
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                            <!--Services One Single-->
                            <div class="services-one__single">
                                <h3 class="services-one__title"><a href="{{ route('user-services', ['type' => $item->slug]) }}">{{ $item->service_name }}</a></h3>
                                <div class="services-one__icon">
                                    {{-- <span class="icon-online-shopping"></span> --}}
                                    <span class="icon-service">
                                        @if (isset($item->icon))
                                            <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->service_name }}-icon" width="64" height="64">
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12 13a5 5 0 0 1-5-5h2a3 3 0 0 0 3 3a3 3 0 0 0 3-3h2a5 5 0 0 1-5 5m0-10a3 3 0 0 1 3 3H9a3 3 0 0 1 3-3m7 3h-2a5 5 0 0 0-5-5a5 5 0 0 0-5 5H5c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2"/>
                                            </svg>
                                        @endif
                                    </span>
                                </div>
                                <div class="services-one__count"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Services One End-->

    <!--Design Studio Start-->
    <section class="design-studio services-page-design-studio">
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

    <!--Services Two Start-->
    {{-- <section class="services-two services-page-services-two">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Lihat layanan kami</span>
                <h2 class="section-title__title">apa yang kami tawarkan</h2>
            </div>
            <ul class="list-unstyled clearfix services-two__list">
                <!--Services Two Single-->
                <li class="services-two__single wow fadeInUp" data-wow-delay="200ms">
                    <div class="services-two__icon">
                        <span class="icon-online-shopping"></span>
                    </div>
                    <h3 class="services-two__title"><a href="mobile-application.html">mobile <br> application</a>
                    </h3>
                    <p class="services-two__text">Lorem ipsum is noted are many variations of have in pass majy.</p>
                </li>
                <!--Services Two Single-->
                <li class="services-two__single wow fadeInUp" data-wow-delay="400ms">
                    <div class="services-two__icon">
                        <span class="icon-growth"></span>
                    </div>
                    <h3 class="services-two__title"><a href="digital-marketing.html">digital <br> marketing</a></h3>
                    <p class="services-two__text">Lorem ipsum is noted are many variations of have in pass majy.</p>
                </li>
                <!--Services Two Single-->
                <li class="services-two__single wow fadeInUp" data-wow-delay="600ms">
                    <div class="services-two__icon">
                        <span class="icon-webpage"></span>
                    </div>
                    <h3 class="services-two__title"><a href="graphic-designing.html">Graphic <br> Designing</a></h3>
                    <p class="services-two__text">Lorem ipsum is noted are many variations of have in pass majy.</p>
                </li>
                <!--Services Two Single-->
                <li class="services-two__single wow fadeInUp" data-wow-delay="800ms">
                    <div class="services-two__icon">
                        <span class="icon-front-end"></span>
                    </div>
                    <h3 class="services-two__title"><a href="website-development.html">Website <br> development</a>
                    </h3>
                    <p class="services-two__text">Lorem ipsum is noted are many variations of have in pass majy.</p>
                </li>
            </ul>
        </div>
    </section> --}}
    <!--Services Two End-->

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
                    @foreach ($partner as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset('images/brand/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Brand One End-->
@endsection