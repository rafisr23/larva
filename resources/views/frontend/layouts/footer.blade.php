<footer class="site-footer">
    <div class="site-footer__top">
        <div class="site-footer__top-shape"
            style="background-image: url(images/shapes/site-footer-top-shape.png)"></div>
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="site-footer__top-left">
                    <h3 class="site-footer__top-left-title">Your Perfect Business Partner Solution</h3>
                    <a href="https://wa.me/{{ $contact->phone }}" class="site-footer__top-left-phone">{{ $contact->phone }}</a>
                </div>
                <div class="site-footer__top-right">
                    <div class="site-footer__top-right-social">
                        {{-- <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                        <a href="{{ $contact->instagram }}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__middle">
        <div class="container">
            <div class="site-footer__middle-inner">
                <div class="row justify-content-evenly">
                    <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__contact">
                            <h3 class="footer-widget__title">Contact</h3>
                            <p class="footer-widget__contact-text">{{ $contact->address }}</p>
                            <h4 class="footer-widget__contact-email-phone">
                                <a href="mailto:{{ $contact->email }}"
                                    class="footer-widget__contact-email">{{ $contact->email }}</a>
                                <a href="https://wa.me/{{ $contact->phone }}" class="footer-widget__contact-phone">{{ $contact->phone }}</a>
                            </h4>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__links clearfix">
                            <h3 class="footer-widget__title">Links</h3>
                            <ul class="footer-widget__links-list list-unstyled clearfix">
                                <li><a href="{{ route('user-about') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('user-services') }}">Layanan Kami</a></li>
                                <li><a href="{{ route('user-projects') }}">Project Kami</a></li>
                                <li><a href="{{ route('user-contact') }}">Kontak</a></li>
                                {{-- <li><a href="blog.html">News</a></li> --}}
                            </ul>
                            {{-- <ul
                                class="footer-widget__links-list footer-widget__links-list-two list-unstyled clearfix">
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="{{ route('user-services') }}">Services</a></li>
                            </ul> --}}
                        </div>
                    </div>
                    {{-- <div class="col-xl-5 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget__column footer-widget__newsletter">
                            <h3 class="footer-widget__title">Newsletter</h3>
                            <form class="footer-widget__newsletter-form">
                                <div class="footer-widget__newsletter-input-box">
                                    <input type="email" placeholder="Email address" name="email">
                                    <button type="submit" class="footer-widget__newsletter-btn"><i
                                            class="far fa-paper-plane"></i></button>
                                </div>
                            </form>
                            <div class="footer-widget__newsletter-bottom">
                                <div class="footer-widget__newsletter-bottom-icon">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="footer-widget__newsletter-bottom-text">
                                    <p>I agree to all your terms and policies</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyrights, <span class="dynamic-year"></span><a href="/"> larvacreative.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>