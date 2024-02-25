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
                    <li>Tentang</li>
                </ul>
                <h2>Tentang Kami</h2>
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
                                    <img src="{{ asset('images/larva-logo.png') }}" alt="">
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
                            <span class="section-title__tagline">Tentang Perusahaan</span>
                            <h2 class="section-title__title">Apa itu larva?</h2>
                        </div>
                        <p class="about-page__right-text-1">Larva Creative Industry adalah sebuah agency creative yang berlokasi di Bandung, Indonesia. Larva menyediakan banyak layanan untuk mendukung proses bisnis creative Anda</p>
                        <h4 class="about-page__right-text-2">The best agency for your business or needs</h4>
                        <a href="{{ route('user-services') }}" class="thm-btn abut-page__btn">Layanan Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Page End-->

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
                            <img src="{{ asset('images/resources/community.png') }}" alt="">
                            {{-- <div class="testimonial-two__content">
                                <h3 class="testimonial-two__title">#Happy <span>Customers</span></h3>
                            </div> --}}
                            <div class="testimonial-two__box-1"></div>
                            <div class="testimonial-two__box-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="testimonial-two__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Testimoni Pelanggan</span>
                            <h2 class="section-title__title">Apa kata mereka?</h2>
                        </div>
                        <div class="testimonial-two__carousel owl-theme owl-carousel">
                            @foreach ($testimoni as $item)
                                <div class="testimonial-two__single">
                                    <p class="testimonial-two__text">{{ $item->description }}</p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('images/resources/user.png') }}" alt="">
                                        </div>
                                        <div class="testimonial-two__client-details">
                                            <h4 class="testimonial-two__client-name">{{ $item->user->name }}</h4>
                                            <p class="testimonial-two__client-title">Customer</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial Two End-->

    {{-- <!--Team One Start-->
    <section class="team-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Siapa dibalik Larva?</span>
                <h2 class="section-title__title">Team kami</h2>
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
    <!--Team One End--> --}}

    <!--Best Agency Start-->
    <section class="best-agency about-page-best-agency">
        <div class="best-agency-shape" style="background-image: url(assets/images/shapes/best-agency-shape.png)">
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
@endsection