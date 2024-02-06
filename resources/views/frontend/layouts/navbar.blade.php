<header class="main-header clearfix">
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper">
            <div class="main-menu-wrapper__logo">
                <a href="index.html"><img src="{{ asset('images/resources/logo-1.png') }}" alt=""></a>
            </div>
            <div class="main-menu-wrapper__main-menu">
                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                <ul class="main-menu__list">
                    <li class="dropdown">
                        <a href="{{ route('user-index') }}">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('user-about') }}">Tentang Kami</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('user-services') }}">Layanan</a>
                        <ul>
                            <li><a href="{{ route('user-services', ['type' => 'merch']) }}">Mechandise & Gift</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'konveksi']) }}">Konveksi Sablon</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'design']) }}">Design Studio</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'website']) }}">Screen Printing</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'clothing']) }}">Clothing Supplier</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('user-projects') }}">Portofolio</a>
                    </li>
                    {{-- <li class="dropdown">
                        <a href="blog.html">Blog</a>
                    </li> --}}
                    <li><a href="{{ route('user-contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="main-menu-wrapper__right">
                <div class="main-menu-wrapper__call">
                    {{-- <div class="main-menu-wrapper__call-icon">
                        <img src="{{ asset('images/icon/phone-icon.png') }}" alt="">
                    </div> --}}
                    <div class="main-menu-wrapper__call-number">
                        {{-- <p>Hubungi Kami</p> --}}
                        <h5><a href="/login">Login</a></h5>
                    </div>
                </div>
                {{-- <div class="main-menu-wrapper__search-box">
                    <a href="#" class="main-menu-wrapper__search search-toggler icon-magnifying-glass"></a>
                </div> --}}
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->