@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: {{ 'asset(images/backgrounds/page-header-bg.jpg)' }}">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('user-index') }}">Beranda</a></li>
                    <li>Blog</li>
                </ul>
                <h2>Blog Posts</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-page-img-1.jpg') }}" alt="">
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
                                <a href="{{ route('blog.show') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-page-img-1.jpg') }}" alt="">
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
                                <a href="{{ route('blog.show') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-page-img-1.jpg') }}" alt="">
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
                                <a href="{{ route('blog.show') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="800ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-page-img-1.jpg') }}" alt="">
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
                                <a href="blog-details.html">utilize enterprise experiences via 24/7 markets.</a>
                            </h3>
                            <div class="blog-one__read-btn">
                                <a href="{{ route('blog.show') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="1000ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-page-img-1.jpg') }}" alt="">
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
                                <a href="blog-details.html">actualize front-end processes with effective</a>
                            </h3>
                            <div class="blog-one__read-btn">
                                <a href="{{ route('blog.show') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="1200ms">
                    <!--Blog One Single-->
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{ asset('images/blog/blog-page-img-1.jpg') }}" alt="">
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
                                <a href="blog-details.html">array of niche markets through robust products</a>
                            </h3>
                            <div class="blog-one__read-btn">
                                <a href="{{ route('blog.show') }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-sidebar__load-more text-center">
                <a href="blog-details.html" class="thm-btn blog-sidebar__load-more-btn">Load more posts</a>
            </div>
        </div>
    </section>
@endsection