@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: {{ isset($headerImage) ? 'url(storage/' . $headerImage[0]->file_path . ')' : 'url(images/backgrounds/page-header-bg.jpg)' }}">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('user-index') }}">Home</a></li>
                    <li>Contact</li>
                </ul>
                <h2>Contact</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Location Start-->
    <section class="location">
        <div class="location-shape" style="background-image: url(assets/images/shapes/location-shape.png)"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 align-items-center">
                    <!--Location Single-->
                    <div class="location__single">
                        <h3 class="location__title">address</h3>
                        <p class="location__text">{{ $contact->address }}, {{ $contact->postal_code }}, {{ $contact->country }}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <!--Location Single-->
                    <div class="location__single location__single-last">
                        <h3 class="location__title">contact</h3>
                        <h5 class="location__phone-email">
                            <a href="tel:{{ $contact->phone }}" class="location__phone">{{ $contact->phone }}</a>
                            <a href="mailto:{{ $contact->email }}" class="location__email">{{ $contact->email }}</a>
                        </h5>
                        {{-- <div class="location__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Location End-->

    <!--contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">contact with us</span>
                <h2 class="section-title__title">have question?</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact-page__form">
                        <form action="assets/inc/sendemail.php" class="comment-one__form contact-form-validated" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Your name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Email address" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <textarea name="message" placeholder="Write message"></textarea>
                                    </div>
                                    <button type="submit" class="thm-btn comment-form__btn">send a message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact Page End-->

    <!--Google Map Start-->
    <section class="google-map">
        <iframe src="https://maps.google.com/maps?q=Mustika%20Hegar%20Regency,%20Ruko%20Timur%20No.3%20(%20Samping%20Holland%20Bakery%20)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
        class="google-map__one" allowfullscreen></iframe>
    </section>
    <!--Google Map End-->
@endsection