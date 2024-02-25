<header class="main-header clearfix">
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper">
            <div class="main-menu-wrapper__logo align-self-center">
                <a href="index.html" class="align-self-center"><img src="{{ asset('images/larva-logo.png') }}" alt="" height="50"></a>
            </div>
            <div class="main-menu-wrapper__main-menu">
                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                <ul class="main-menu__list">
                    <li class="@if (request()->routeIs('user-index')) current @endif">
                        <a href="{{ route('user-index') }}">Home</a>
                    </li>
                    <li class="@if (request()->routeIs('user-about')) current @endif">
                        <a href="{{ route('user-about') }}">Tentang Kami</a>
                    </li>
                    <li class=" @if (request()->routeIs('user-services')) current @endif">
                        <a href="{{ route('user-services') }}">Layanan</a>
                        {{-- <ul>
                            <li><a href="{{ route('user-services', ['type' => 'merch']) }}">Mechandise & Gift</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'konveksi']) }}">Konveksi Sablon</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'design']) }}">Design Studio</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'website']) }}">Screen Printing</a></li>
                            <li><a href="{{ route('user-services', ['type' => 'clothing']) }}">Clothing Supplier</a></li>
                        </ul> --}}
                    </li>
                    <li class=" @if (request()->routeIs('user-projects')) current @endif">
                        <a href="{{ route('user-projects') }}">Project</a>
                    </li>
                    {{-- <li class="dropdown">
                        <a href="blog.html">Blog</a>
                    </li> --}}
                    <li class="@if (request()->routeIs('user-contact')) current @endif">
                        <a href="{{ route('user-contact') }}">Kontak</a>
                    </li>
                    <li>
                        @if (Auth::check())
                            @role(['superadmin', 'admin'])
                                <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                            @endrole
                        @endif
                    </li>
                    <li class="d-md-none">
                        @if (Auth::check())
                            <form action="{{ route('logout') }}" method="post" class="ms-0 p-0">
                                @csrf
                                <button type="submit" class="btn text-white ms-0 p-0">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="main-menu-wrapper__right">
                <div class="main-menu-wrapper__call">
                    <div class="main-menu-wrapper__call-number">
                        @if (Auth::check())
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light text-decoration-none px-5">Logout</button>
                        </form>
                        @else
                            {{-- create button with bootstrap --}}
                            <h5><a href="{{ route('login') }}" class="btn btn-outline-light text-decoration-none px-5">Login</a></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->